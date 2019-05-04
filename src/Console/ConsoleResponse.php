<?php


namespace JCI\Console;


class ConsoleResponse
{
	/**
	 * @var array
	 */
	private $container;

	public function __construct()
	{
		$this->container = [];
	}

	public function addTextInNewLine(string $text)
	{
		$this->container[] = "\n\r";
		$this->container[] = $text;
		return $this;
	}

	public function newLine()
	{
		$this->container[] = "\n\r";
		return $this;
	}

	public function render()
	{
		$output = '';
		foreach ($this->container as $line)
		{
			$output.= $line;
		}
		return $output;
	}
}