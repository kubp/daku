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
        if($category==""){
            $this->redirect('Main:default');
        }
        if (count($this->context->category->getAll($category))==0) {
            $this->error('Kategorie bohužel neexistuje');
        }
        $this->template->cat=$this->context->category->getAll($category);

    }


}
