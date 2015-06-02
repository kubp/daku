<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class SlPresenter extends BasePresenter
{


    public function renderDefault($referer,$script)
    {
        if($this->getUser()->getId()){
            $user=$this->getUser()->getId();
        }else{
            $user="";
        }
        if(!isset($referer)){
            $referer="";
        }
        if(!isset($script)){
            $script="";
        }


        $this->context->access->insertAccess($_SERVER['HTTP_USER_AGENT'],getenv("REMOTE_ADDR"),$user,$referer,$script);


    }
}