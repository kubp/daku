<?php
namespace App\Model;
use Nette, Nette\Security;


class Api extends MainModel{
    public function createApiKey($id){
        $random=mt_rand(10000,1000000);
        $random_hash=hash('sha256', $random.time());

        $this->insert("api_key",array("api_key"=>$random_hash, "customerid"=>$id));

    }




}