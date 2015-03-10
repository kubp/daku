<?php

namespace App;

use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


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
		$router = new RouteList();
		$router[] = new Route('item[/<item>]', 'Item:default');
		$router[] = new Route('category[/<category>]', 'Category:default');
		$router[] = new Route('login', 'Login:default');
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Main:default');
		//$router[] = new Route('api/<presenter>/<action>[/<id>]', 'Api:default');



		return $router;
	}

}
