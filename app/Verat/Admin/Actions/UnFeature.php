<?php

namespace App\Verat\Admin\Actions;

use Illuminate\Support\Str;
use Verat\Admin\Actions\Action;

class UnFeature extends Action
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
    protected $confirm_text = 'Unmark selected article(s) as featured?';

    /**
     * confirmation button text
     *
     * @var string
     */
    protected $confirm_button_text = 'Unmark as Featured';

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
            $item->featured = false;
            $item->save();
        }

        $item_singularity = Str::plural('Article', count($items));

        return Action::successful("$item_singularity unmarked as featured");
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
        $items = $model::featured()->find($keys);

        return $items;
    }
}
