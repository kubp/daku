<?php
namespace App\Model;
use Nette, Nette\Security;

class CartSession{

    /** @var Nette\Http\Session */
    private $session;

    /** @var Nette\Http\SessionSection */
    private $sessionSection;

    public function __construct(Nette\Http\Session $session)
    {
        $this->session = $session;

        // a získáme přístup do sekce 'mySection':
        $this->sessionSection = $session->getSection("cart");
    }



    public function setCart($user_id){
        $this->sessionSection->cartid=$user_id;


    }


    public function getCart(){

        if($this->sessionSection->cartid){
            return $this->sessionSection->cartid;
        }else{
            return false;
        }
    }




}