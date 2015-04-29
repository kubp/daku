<?php
namespace App\Model;
use Nette;


class Cart extends MainModel{

    public $cartid;
    public function getAllItems($cartid){
        return $this->query("SELECT list_id, item.item_id, item_name, item.price,count(list.item_id) AS pocet FROM list
                              JOIN item ON list.item_id = item.item_id
                              WHERE list.cart_id =$cartid GROUP by item_id");
    }



}



