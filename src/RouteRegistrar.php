<?php

namespace Suite\Bec;

use Illuminate\Contracts\Routing\Registrar as Router;

class RouteRegistrar {
	/**
	 * The router implementation.
	 *
	 * @var Router
	 */
	protected $router;

	/**
	 * Create a new route registrar instance.
	 *
	 * @param  Router  $router
	 * @return void
	 */
	public function __construct(Router $router) {
		$this->router = $router;
	}

	/**
	 * Register routes for transient tokens, clients, and personal access tokens.
	 *
	 * @return void
	 */
	public function all() {
		$this->router->group(['prefix' => 'bec', 'middleware' => ['api', 'ent_check', 'lns_check:bec']], function ($router) {

			$router->resource('posts', 'PostController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
			$router->resource('prices', 'PriceController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
			$router->resource('tags', 'TagController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);

		});
	}
}
