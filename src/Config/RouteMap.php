<?php


namespace JCI\Config;


use JCI\Exceptions\InvalidRouteException;
use JCI\Router\Route;
use JCI\Scheduler\TaskScheduler;
use JCI\Task\TaskController;

class RouteMap
{
	public const ROUTE_MAP_KEY_CONTROLLER 	= 'controller';
	public const ROUTE_MAP_KEY_ACTION 		= 'action';
	public const ROUTE_MAP_KEY_DI 			= 'di';


	/**
	 * @var array
	 * TODO: Move to separate file.
	 */
	private $routeMap = [
		'' => [],
		'run_daily_scheduled_tasks' => [
			self::ROUTE_MAP_KEY_CONTROLLER => TaskController::class,
			self::ROUTE_MAP_KEY_ACTION		=> 'executeDailyScheduledTasks',
			self::ROUTE_MAP_KEY_DI			=> [TaskScheduler::class]
		]
	];

	/**
	 * @param string $routeKey
	 * @return Route
	 * @throws InvalidRouteException
	 */
	public function getRoute(string $routeKey) : Route
	{
		if (!array_key_exists($routeKey, $this->routeMap))
		{
			throw new InvalidRouteException("Invalid Route {$routeKey}");
		}
		$rawRoute = $this->routeMap[$routeKey];
		return new Route($rawRoute[self::ROUTE_MAP_KEY_CONTROLLER], $rawRoute[self::ROUTE_MAP_KEY_ACTION], $rawRoute[self::ROUTE_MAP_KEY_DI]);
	}
}