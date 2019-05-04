<?php


namespace JCI\Application;


use JCI\Application\Contracts\IController;
use JCI\Request\ConsoleRequest;

abstract class AbstractConsoleController implements IController
{
	/**
	 * @var ConsoleRequest
	 */
	private $request;

	/**
	 * AbstractConsoleController constructor.
	 */
	public function __construct(ConsoleRequest $consoleRequest)
	{
		$this->request = $consoleRequest;
	}

	protected function getRequest()
	{
		return $this->request;
	}
}