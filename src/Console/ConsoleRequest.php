<?php


namespace JCI\Console;


use JCI\Request\AbstractRequest;

class ConsoleRequest extends AbstractRequest
{
	/**
	 * TODO: Make this testable
	 * @param $key
	 * @return mixed|null
	 */
	public function getArgument($key)
	{
		$longOptions = getopt(null, [$key.':']);
		if (!empty($longOptions))
		{
			return $longOptions[$key];
		}
		return null;
	}
}

