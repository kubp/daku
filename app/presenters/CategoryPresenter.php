<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class CategoryPresenter extends BasePresenter
{


    public function renderDefault($category)
    {
        //$data=$this->context->database->data();
        $this->template->items = $category;
    }

}
