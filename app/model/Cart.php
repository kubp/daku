<?php
namespace App\Model;
use Nette;


class Cart extends MainModel{

    public $cartid;
    public function getAllItems($cartid){
        return $this->query("SELECT list_id, item.item_id, item_name, item.price,quantity AS pocet FROM list
                              JOIN item ON list.item_id = item.item_id
                              WHERE list.cart_id =$cartid");
    }


    public function getTotalPrice($cartid){

        return $this->query("SELECT SUM( item.price * quantity ) as total
                              FROM list
                              JOIN item ON list.item_id = item.item_id
                              WHERE list.cart_id =$cartid")->fetch();
    }

    public function pay($user_id,$user_cart,$name,$address,$postal,$shipping,$zprava){
        $this->insert("transaction",
            array("customer_id" => $user_id, "cart_id" => $user_cart,"name"=>$name,
                "address"=>$address,"postal"=>$postal,"shipping"=>$shipping+1,"message"=>$zprava));
    }

    public function itemsInCart($cart){
        return $this->queryBound("SELECT count(list_id) AS pocet FROM list
                              JOIN item ON list.item_id = item.item_id
                              WHERE list.cart_id =?",$cart)->fetch();
    }

}



