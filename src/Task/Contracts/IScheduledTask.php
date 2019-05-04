<?php


namespace JCI\Task\Contracts;


use DateTime;
use JCI\Task\TaskState;

interface IScheduledTask
{
	/**
	 * @return DateTime
	 */
	public function getExecutionDate();

	/**
	 * @return DateTime
	 */
	public function getExpirationDate();


	/**
	 * @return TaskState
	 */
	public function getState();
}