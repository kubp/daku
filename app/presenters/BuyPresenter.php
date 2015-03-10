<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class BuyPresenter extends BasePresenter
{


    public function renderDefault($buyid)
    {

        $this->template->id=$buyid;
    }

}
