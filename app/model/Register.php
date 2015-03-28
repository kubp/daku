<?php
namespace App\Model;
use Nette, Nette\Security;


class Register extends MainModel{
    public function register($name, $mail, $password){
        $this->insert("customer",array("name"=>$name, "mail"=>$mail,
            "password"=>Nette\Security\Passwords::hash($password)));

    }




}