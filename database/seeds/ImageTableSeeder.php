<?php

use App\FileManager;
use Illuminate\Database\Seeder;
use Symfony\Component\Finder\SplFileInfo;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // we checkout the demo img resources and
        // populate the database with the images
        // we won't be using the traditional factory method
        $folder = "demo/imgs/";
        $resources_path = resource_path($folder);

        $filesystem = new Filesystem;
        $images = $filesystem->allFiles($resources_path);

        $count = count($images);

        if ($count === 0) {
            print("No image exists in $resources_path");
        }

        foreach ($images as $image) {
            $attribute = $this->storeImage($image, $folder);

            factory(FileManager::class)->create($attribute);
        }
    }

    /**
     * Copy the image to the storage folder.
     * Returns an array of attributes for the image
     *
     * @param \Symfony\Component\Finder\SplFileInfo $image
     * @param string $folder
     * @return array
     */
    protected function storeImage(SplFileInfo $image, string $folder)
    {
        $disk = 'public';

        $name = $image->getFilenameWithoutExtension();

        $path = uniqid($folder).'.'.$image->getExtension();

        Storage::disk($disk)->put($path, $image->getContents());

        $size = $image->getSize();

        $mimetype = Storage::disk($disk)->mimeType($path);

        $type = explode('/', $mimetype, 2)[0];

        return compact('name', 'path', 'disk', 'size', 'mimetype', 'type');
    }
}
