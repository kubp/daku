<?php
namespace App\Model;
use Nette, Nette\Security;


class Register extends MainModel{
    public function register($name, $mail, $password){
        $this->insert("customer",array("name"=>$name, "mail"=>$mail,
            "password"=>Nette\Security\Passwords::hash($password)));


    $cart=$this->findOneBy("customer",array("mail"=>$mail));

        $this->insert("cart",array("customer_id"=>$cart, "paid"=>"false",
            "date"=>time()));
    }

    public function checkRegister($mail){
        return $this->findAll("customer")->where("mail=?",$mail)->limit(1)->fetch();



    }



}