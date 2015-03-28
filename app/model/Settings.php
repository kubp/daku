<?php
namespace App\Model;
use Nette;


class Settings extends MainModel{


    public function getAll($userID){

        $userinfo = $this->findOneId("customer",array("customer_id"=>$userID));

        return $userinfo;
    }





}



