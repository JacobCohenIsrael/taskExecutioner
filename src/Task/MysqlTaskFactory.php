<?php


namespace JCI\Task;

use JCI\Database\PdoAdapter;
use JCI\Task\Contracts\ITask;

class MysqlTaskFactory
{

	/**
	 * @var PdoAdapter
	 */
	private $adapter;

	public function __construct(PdoAdapter $adapter)
	{
		$this->adapter = $adapter;
	}

	/**
	 * @param int $taskTypeId
	 * @param int|null $lastHandledId
	 * @return ITask
	 * @throws \Exception
	 */
	public function getTaskInstance(int $taskTypeId, int $lastHandledId = null)
	{
		switch($taskTypeId) {
			case TaskType::AGGREGATE_SPINS:
				$instance = new AggregateSpinsTask($this->adapter, $lastHandledId);
				break;
			default:
				throw new \Exception("Unknown Task");
		}

		return $instance;
	}
}