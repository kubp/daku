<?php

namespace App\Model;
use Nette;
use Nette\Security;



class Authenticator extends Nette\Object implements Nette\Security\IAuthenticator
{
    private $database;
    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    function authenticate(array $credentials)
    {
    list($username, $password) = $credentials;

        $row = $this->database->table('customer')
            ->where('mail', $username)->fetch();


    if (!$row) {
    throw new Nette\Security\AuthenticationException('User not found.');
    }

    if (!Nette\Security\Passwords::verify($password, $row->password)) {
    throw new Nette\Security\AuthenticationException('Invalid password.');

    }


        $admin = $this->database->table("customer")->where(array("customer_id"=>$row->customer_id))->where("admin","1")->fetch();
        if($admin){
            return new Nette\Security\Identity($row->customer_id,"user",array($admin->customer_id));
        }else{
            return new Nette\Security\Identity($row->customer_id,"user");
        }

    }
}