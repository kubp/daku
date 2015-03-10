<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class ItemPresenter extends BasePresenter
{


    public function renderDefault($item,  $itemname)
    {
        $data=$this->context->item->getDetail($item);
        $this->template->items = $data;


    }

    public function renderObjednat($id)
    {
        //$this->template->text = 'any value';
    }

}
