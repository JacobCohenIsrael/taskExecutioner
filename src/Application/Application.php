<?php


namespace JCI\Application;


use JCI\Application\Contracts\IApplication;

class Application implements IApplication
{

	public function run()
	{
		$this->dispatchBootstrapEvent();
	}

	private function dispatchBootstrapEvent()
	{
		//TODO: dispatch bootstrap event
	}
}