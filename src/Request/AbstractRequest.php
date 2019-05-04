<?php


namespace JCI\Request;


abstract class AbstractRequest
{
	/**
	 * @var static
	 */
	protected static $instance;

	/**
	 * @return static
	 */
	public static function getInstance()
	{
		if (null === static::$instance)
		{
			static::$instance = new static();
		}

		return static::$instance;
	}
}