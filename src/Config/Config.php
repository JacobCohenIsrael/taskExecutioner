<?php


namespace JCI\Config;

use Exception;

class Config
{
	/**
	 * TODO: Move to environmental config based files (local, dev, staging, production)
	 * @var array
	 */
	private static $config = [
		'dbs.main' => [
			'dsn'   => 'mysql:dbname=local_db;host=localhost;port=3306',
			'username' => 'vagrant',
			'password' => 'vagrant',
		],
		'tasks.mysql_aggregation_limit' => 10000
	];

	/**
	 * @param $key
	 * @return mixed
	 * @throws Exception
	 */
	public static function get($key)
	{
		if (!array_key_exists($key, self::$config))
		{
			throw new Exception("Config missing value for key {$key}");
		}
		return static::$config[$key];
	}

	/**
	 * @param $key
	 * @param $value
	 */
	public static function set($key, $value)
	{
		self::$config[$key] = $value;
	}
}