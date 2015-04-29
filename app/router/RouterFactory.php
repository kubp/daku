<?php

namespace App;

use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter,
	Nette\Utils\Strings;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return \Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		Route::addStyle('itemname');
		Route::setStyleProperty('itemname', Route::FILTER_OUT, function($url) {
			return Strings::webalize($url);
		});

		$router = new RouteList();
		$router[] = new Route('//api.%domain%/%basePath%/v1/<action>[/<id>]', 'Api:default');
		$router[] = new Route('//api.%domain%/%basePath%/<action>[/<id>]', 'Api:version');

		$router[] = new Route('item[/<item>-<itemname>]', 'Item:default');
		$router[] = new Route('category[/<category>]', 'Category:default');
		$router[] = new Route('login', 'Login:default');
		$router[] = new Route('register', 'Register:default');
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Main:default');
		$router[] = new Route('admin/<action>', 'Admin:default');

		//$router[] = new Route('api/<presenter>/<action>[/<id>]', 'Api:default');



		return $router;
	}

}
