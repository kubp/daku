<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class CategoryPresenter extends BasePresenter
{


    public function renderDefault($id,$category)
    {
        if($id==""){

            $this->redirect('Main:default');
        }
        if (count($this->context->category->getAll($id))==0) {
            $this->flashMessage('Kategorie neexistuje', 'error');
            $this->redirect("Main:");

            //$this->error('Kategorie bohužel neexistuje');
        }
        $this->template->cat=$this->context->category->getAll($id);

    }


}
