<?php

namespace App\Verat\Admin\Actions;

use Illuminate\Support\Str;
use Verat\Admin\Actions\Action;

class Feature extends Action
{

    /**
     * feather icon
     *
     * @var string
     */
    protected $icon = 'star';

    /**
     * confirmation text that will be displayed when performing
     * the action.
     *
     * @var string
     */
    protected $confirm_text = 'Mark selected article(s) as featured?';

    /**
     * confirmation button text
     *
     * @var string
     */
    protected $confirm_button_text = 'Mark as Featured';

    /**
     * execute the action
     *
     * @param \Illuminate\Support\Collection $items
     * @param array $fields
     * @return \Illuminate\Http\JsonResponse
     */
    public function execute($items, $fields)
    {
        foreach ($items as $item) {
            $item->featured = true;
            $item->save();
        }

        $item_singularity = Str::plural('Article', count($items));

        return Action::successful("$item_singularity marked as featured");
    }

    /**
     * find items based of the request keys
     *
     * @param array $keys
     * @param string $model
     * @return \Illuminate\Support\Collection
     */
    public static function findItems(array $keys, $model)
    {
        $items = $model::unFeatured()->find($keys);

        return $items;
    }
}
