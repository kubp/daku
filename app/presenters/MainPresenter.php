<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class MainPresenter extends BasePresenter
{


    public function renderDefault()
    {
        $data=$this->context->item->getAllItems();
        $this->template->items = $data;
    }



}
