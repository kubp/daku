<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class ApiPresenter extends BasePresenter
{


    public function renderDefault()
    {
        $a = array( "api_version" => "v1", "app" => "daku", "api_urls" =>
            array("items_all"=> "items/{page}", "item_detail"=>"/item/{id}", "item_buy"=>"/{user_key}/buy/{id}"


            ));

        $this->sendResponse( new Nette\Application\Responses\JsonResponse( $a ) );
    }

    public function renderItemS()
    {
        $a = array( "current_url" => "http://api.edaku.eu/item/{page}");

        $this->sendResponse( new Nette\Application\Responses\JsonResponse( $a ) );
    }

    public function renderItem()
    {
        $a = array( "current_url" => "http://api.edaku.eu/item/{id}");

        $this->sendResponse( new Nette\Application\Responses\JsonResponse( $a ) );
    }

}
