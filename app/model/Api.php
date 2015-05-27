<?php
namespace App\Model;
use Nette, Nette\Security;


class Api extends MainModel{
    public function createApiKey($id){
        $random=mt_rand(10000,1000000);
        $random_hash=hash('sha256', $random.time());

        $this->insert("api_key",array("api_key"=>$random_hash, "customerid"=>$id));
        return $random_hash;
    }

    public function getUserInfo($key){

       return $this->findAll("api_key")->where(array("api_key"=>$key))->limit(1)->fetch();
    }




}