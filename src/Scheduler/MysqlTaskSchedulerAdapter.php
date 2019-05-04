<?php


namespace JCI\Scheduler;


use Exception;
use JCI\Config\Config;
use JCI\Database\PdoAdapter;
use JCI\Scheduler\Contracts\ITaskSchedulerAdapter;
use JCI\Task\Contracts\ITask;
use JCI\Task\MysqlScheduledTaskModel;
use JCI\Task\MysqlTaskFactory;

class MysqlTaskSchedulerAdapter implements ITaskSchedulerAdapter
{
	const SCHEDULED_TASK_TABLE_NAME						= 'scheduled_task';
	const SCHEDULED_TASK_TABLE_COLUMN_EXECUTION_DATE 	= 'execution_date';

	/**
	 * @var PdoAdapter
	 */
	private $pdoAdapter;

	public function __construct(PdoAdapter $pdo = null)
	{

		$dbCredentials = Config::get('dbs.main');
		if (null === $pdo) {
			$pdo = new PdoAdapter($dbCredentials['dsn'], $dbCredentials['username'], $dbCredentials['password']);
		}
		$this->pdoAdapter = $pdo;
	}

	/**
	 * @return ITask[]
	 * @throws Exception
	 */
	public function getDailyScheduledTasks(): array
	{
		$mysqlTasks = [];
		$sql = sprintf("SELECT * FROM `%s` WHERE `%s` <= NOW()", static::SCHEDULED_TASK_TABLE_NAME, static::SCHEDULED_TASK_TABLE_COLUMN_EXECUTION_DATE);
		$result = $this->pdoAdapter->selectAll($sql, [], MysqlScheduledTaskModel::class);
		$mysqlTaskFactory = new MysqlTaskFactory($this->pdoAdapter);

		/** @var MysqlScheduledTaskModel $scheduledTask */
		foreach ($result as $scheduledTask) {
			$mysqlTasks[] = $mysqlTaskFactory->getTaskInstance($scheduledTask->getTaskTypeId(), $scheduledTask->getLastHandledId());
		}
		return $mysqlTasks;
	}
}