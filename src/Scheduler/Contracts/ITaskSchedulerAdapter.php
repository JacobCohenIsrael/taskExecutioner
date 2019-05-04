<?php


namespace JCI\Scheduler\Contracts;


use JCI\Task\Contracts\ITask;

interface ITaskSchedulerAdapter
{
	/**
	 * @return ITask[]
	 */
	public function getDailyScheduledTasks() : array;
}