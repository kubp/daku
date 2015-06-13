<?php
namespace App\Model;
use Nette, Nette\Security;


class CartSession extends MainModel{

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
    public function setCart(){
        $this->sessionSection->dsa="asasdd";
        echo $this->sessionSection->dsa;
    }

    public function getCart(){

        return $this->sessionSection->dsa;
    }



}