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
        $data=$this->context->item->data();
        $this->template->items = $data;
    }

    public function renderLogin()
    {
        $data=$this->context->item->data();
        $this->template->items = $data;
    }

}
