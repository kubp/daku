<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class SettingsPresenter extends BasePresenter
{


    public function renderDefault()
    {
        if($this->getUser()->id) {
            $this->template->user = $this->context->settings->getAll($this->getUser()->id);
        }else{
            $this->redirect("Main:default");
        }

    }
    public function renderLogout()
    {
        $this->user->logout(true);
        $this->redirect("Main:default");
    }



}
