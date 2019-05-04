<?php


namespace JCI\Router;


class Route
{
	/**
	 * @var string
	 */
	public $controllerName;

	/**
	 * @var string
	 */
	public $action;

	/**
	 * @var array
	 */
	public $di;

	/**
	 * Route constructor.
	 * @param string $controllerName
	 * @param string $action
	 * @param array $di
	 */
	public function __construct(string $controllerName, string $action, array $di)
	{
		$this->controllerName = $controllerName;
		$this->action         = $action;
		$this->di             = $di;
	}

	/**
	 * @return string
	 */
	public function getControllerName(): string
	{
		return $this->controllerName;
	}

	/**
	 * @return string
	 */
	public function getAction(): string
	{
		return $this->action;
	}

	/**
	 * @return array
	 */
	public function getDi(): array
	{
		return $this->di;
	}
}