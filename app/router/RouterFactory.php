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

		Route::addStyle('category');
		Route::setStyleProperty('category', Route::FILTER_OUT, function($url) {
			return Strings::webalize($url);
		});

		$router = new RouteList();


		$router[] = new Route('//api.%domain%/%basePath%/<action>[/<id>]', 'Api:default');
		//$router[] = new Route('//api.%domain%/%basePath%/v1/user[/<user>]/<action>[/<id>]', 'Api:user');
		$router[] = new Route('//api.%domain%/%basePath%/v2/<action>[/<id>]', 'Api:default');

		$router[] = new Route('item[/<item>-<itemname>]', 'Item:default',Route::SECURED);
		$router[] = new Route('category[/<id>-<category_name>]', 'Category:default', Route::SECURED);
		$router[] = new Route('login', 'Login:default', Route::SECURED. Route::SECURED);
		$router[] = new Route('register', 'Register:default', Route::SECURED);
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Main:default', Route::SECURED);

		//$router[] = new Route('api/<presenter>/<action>[/<id>]', 'Api:default');



		return $router;
	}

}
