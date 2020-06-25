<?php

namespace Tests\Unit\Thumbnailer;

use App\Thumbnailer\Thumbnailer as ThumbnailerModel;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use InvalidArgumentException;
use Tests\TestCase;

class Thumbnailer extends TestCase
{
    public function keysDataProvider()
    {
        return [
            [
                [], []
            ],
            [
                [ 'small' => [32, 32] ], [ 'small' => [32, 32] ]
            ]
        ];
    }

    /**
     * @dataProvider keysDataProvider
     */
    public function testKeys($value, $expected)
    {
        $thumbnailer = $this->createPartialMock($this->thumbnailerClass(), ['config']);
        $thumbnailer->method('config')
                    ->willReturn([
                        'keys' => $value
                    ]);

        $this->assertEquals($expected, $thumbnailer->keys());
    }

    public function testKeyValueOf_ShouldReturn_Null()
    {
        $thumbnailer = $this->createPartialMock($this->thumbnailerClass(), ['keys']);
        $thumbnailer->method('keys')
            ->willReturn([]);

        $this->assertNull($thumbnailer->keyValueOf('unknwn_key'));
    }

    public function testKeyValueOf_ShouldReturn_Value()
    {
        $small = [32, 32];

        $thumbnailer = $this->createPartialMock($this->thumbnailerClass(), ['keys']);
        $thumbnailer->method('keys')
            ->willReturn(['small' => $small]);

        $this->assertSame($small, $thumbnailer->keyValueOf('small'));
    }

    public function testCreate()
    {
        $source = $this->makeFakeImage()[0];

        $thumbnailer = $this->createPartialMock($this->thumbnailerClass(), [
            'manager', 'keyValueOf', 'format', 'quality'
        ]);

        $thumbnailer->method('manager')
                    ->willReturn(new ImageManager());
        $thumbnailer->method('keyValueOf')
                    ->willReturn([50, 50]);
        $thumbnailer->method('format')
                    ->willReturn('jpg');
        $thumbnailer->method('quality')
                    ->willReturn(90);

        $image = $thumbnailer->create($source, 'small');

        $this->assertIsString($image);

        $thumbnailer->method('keyValueOf')
                    ->willReturn(null);
    }

    public function testCreate_ShouldThrowException()
    {
        $this->expectException(InvalidArgumentException::class);

        $source = $this->makeFakeImage()[0];

        $thumbnailer = $this->createPartialMock($this->thumbnailerClass(), [
            'manager', 'keyValueOf', 'format', 'quality'
        ]);

        $thumbnailer->method('manager')
                    ->willReturn(new ImageManager());
        $thumbnailer->method('keyValueOf')
                    ->willReturn(null);
        $thumbnailer->method('format')
                    ->willReturn('jpg');
        $thumbnailer->method('quality')
                    ->willReturn(90);

        $thumbnailer->create($source, 'small');
    }

    public function testMake_Should_GenerateThumbnails()
    {
        $image = $this->makeFakeImage();
        $path = $image[1];
        $disk = $image[2];

        $config = [
            'keys' => [
                'square' => [100, 100]
            ]
        ];

        $thumbnailer = new ThumbnailerModel($config);
        $thumbnail = $thumbnailer->make('square', $path, 'test');

        Storage::disk('test')->assertExists($thumbnail);
    }

    /**
     * Create a fake image for testing
     *
     * @return array
     */
    protected function makeFakeImage()
    {
        $disk = 'test';

        Storage::fake($disk);

        $image = UploadedFile::fake()->image('test.jpg');
        $path = $image->store('', $disk);

        Storage::disk($disk)->assertExists($path);

        return [
            Storage::disk($disk)->get($path), // content
            $path,
            $disk,
        ];
    }

    /**
     * Get the thumbnailer class name
     *
     * @return string
     */
    protected function thumbnailerClass()
    {
        return Thumbnailer::class;
    }
}
