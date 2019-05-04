<?php

namespace JCI\Tests\Application;

use JCI\Console\ConsoleApplication;
use JCI\Exceptions\InvalidRouteException;
use JCI\Exceptions\MissionRequiredParameterException;
use PHPUnit\Framework\TestCase;

class ConsoleApplicationTest extends TestCase
{
	/**
	 * @var ConsoleApplication
	 */
	private $application;

	protected function setUp()
	{
		$this->application = new ConsoleApplication();
	}

	protected function tearDown()
	{
		$this->application = null;
	}

	/**
	 * @throws InvalidRouteException
	 * @throws MissionRequiredParameterException
	 */
	public function testRun()
	{
		$this->assertTrue($this->application instanceof ConsoleApplication);
		$this->expectException(MissionRequiredParameterException::class);
		$this->application->run();
	}
}
