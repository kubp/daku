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

    public function getUserCart($customer_id){

        return $this->findAll("cart")->where(array("customer_id"=>$customer_id))->limit(1)->fetch();
    }

    public function getUserCartInfo($cart_id){
        return $this->query("SELECT list_id, item_name,price,in_stock FROM list
                            JOIN item ON list.item_id = item.item_id
                            WHERE list.cart_id =$cart_id")->fetchAll();
    }


}