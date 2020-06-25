<?php

namespace App\Verat\Admin\Collections;

use App\FileManager as AppFileManager;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Verat\Admin\Actions\PermanentlyDelete;
use Verat\Admin\Collection\BaseCollection;
use Verat\Admin\Fields\Image\Image;

class FileManager extends BaseCollection
{

    public static $model = AppFileManager::class;

    protected $icon = 'image';

    protected $layout = 'card';

    protected $selection_layout = 'card';

    protected $editable = false;

    protected function display_name()
    {
        return 'File Manager';
    }

    protected function name()
    {
        return 'file_manager';
    }

    /**
     * Set the title field property
     *
     * @return string
     */
    protected function titleFieldValue()
    {
        return $this->item->title;
    }

    /**
     * Set the subtitle field property
     *
     * @return string
     */
    protected function subtitleFieldValue()
    {
        return $this->item->name;
    }

    protected function imageFieldUrl()
    {
        return $this->item->thumbnails['small'];
    }

    protected static function tabs()
    {
        return [];
    }

    public static function actions()
    {
        return [
            new PermanentlyDelete,
        ];
    }

    /**
     * default sort column
     *
     * @return string
     */
    public static function defaultSort()
    {
        return '-id';
    }

    public static function fields()
    {
        return [
            Image::make('Image', 'path')
                ->disk('public')
                ->creationRules('nullable', 'image')
                ->updateRules('nullable', 'image')
                ->showOnIndex()
                ->storeLogic(function (
                    Request $request,
                    $model,
                    UploadedFile $uploaded_file ,
                    $storage_path,
                    $storage_disk,
                    $attribute) {

                    $path = $uploaded_file->store($storage_path, $storage_disk);

                    $name = $uploaded_file->getFilenameWithoutExtension();

                    $size = $uploaded_file->getSize();

                    $mimetype = Storage::disk($storage_disk)->mimeType($path);

                    $type = explode('/', $mimetype, 2)[0];

                    return compact('name', 'path', 'disk', 'size', 'mimetype', 'type');
                })->halfWidth()
        ];
    }
}
