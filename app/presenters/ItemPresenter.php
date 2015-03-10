<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class ItemPresenter extends BasePresenter
{


    public function renderDefault($item)
    {
        $this->template->item = $item;
    }

      public function renderObjednat($id)
    {
        //$this->template->text = 'any value';
    }

}
