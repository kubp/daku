<?php
namespace App\Model;
use Nette;


class Settings extends MainModel{


    public function getAll($userID){

        $userinfo = $this->findOneId("customer",array("customer_id"=>$userID));

        return $userinfo;
    }

    public function getAllApi($userID){

        $userinfo = $this->findOneId("customer",array("login_key"=>$userID));

        return $userinfo;
    }





}



