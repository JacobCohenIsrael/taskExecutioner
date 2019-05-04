<?php


namespace JCI\Console;


use Exception;
use JCI\Application\Application;
use JCI\Config\RouteMap;
use JCI\Exceptions\InvalidRouteException;
use JCI\Exceptions\MissionRequiredParameterException;

class ConsoleApplication extends Application
{
	/**
	 * @throws MissionRequiredParameterException
	 * @throws InvalidRouteException
	 * @throws Exception
	 */
	public function run()
	{
		parent::run();

		$request = ConsoleRequest::getInstance();
		$this->dispatchRequestEvent($request);

		$route = $request->getArgument('route');
		if (empty($route)) {
			throw new MissionRequiredParameterException("No route parameter was found with the value of {$route}");
		}

		$routeMap = new RouteMap();
		$route = $routeMap->getRoute($route);
		$controllerName = $route->getControllerName();
		$action = $route->getAction();
		$dependencies = $route->getDi();
		$arguments = [];
		foreach ($dependencies as $dependency)
		{
			$arguments[] = new $dependency();
		}
		$controller = new $controllerName($request);

		$this->dispatchControllerEvent($controller, $action, $arguments);

		$response = call_user_func_array([$controller, $action], $arguments);

		if (! $response instanceof ConsoleResponse) {
			throw new Exception("Invalid Response");
		}

		echo $response->render();


	}

	private function dispatchRequestEvent(ConsoleRequest $request)
	{
		//TODO: dispatch request event
	}

	private function dispatchControllerEvent($controller, string $action, array $arguments)
	{
		//TODO: dispatch controller event
	}
}