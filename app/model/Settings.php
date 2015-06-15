<?php
namespace App\Model;
use Nette;


class Settings extends MainModel{


    public function getAll($userID){

        $userinfo = $this->findBy("customer",array("customer_id"=>$userID))->limit(1)->fetch();

        return $userinfo;
    }

    public function getAllApi($userID){

        $userinfo = $this->findOneId("customer",array("login_key"=>$userID));

        return $userinfo;
    }






}



