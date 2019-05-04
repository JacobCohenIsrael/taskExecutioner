<?php


namespace JCI\Scheduler;


use JCI\Scheduler\Contracts\ITaskSchedulerAdapter;
use JCI\Task\Contracts\ITask;

class TaskScheduler
{
	/**
	 * @var ITaskSchedulerAdapter
	 */
	private $taskSchedulerAdapter;

	public function __construct(ITaskSchedulerAdapter $adapter = null)
	{
		if (null === $adapter) {
			// Default Adapter
			$adapter = new MysqlTaskSchedulerAdapter();
		}
		$this->taskSchedulerAdapter = $adapter;
	}

	/**
	 * @return array|ITask[]
	 * @throws \Exception
	 */
	public function getDailyScheduledTasks()
	{
		return $this->taskSchedulerAdapter->getDailyScheduledTasks();
	}
}