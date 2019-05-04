<?php


namespace JCI\Task;


use DateTime;
use Exception;
use JCI\Task\Contracts\IScheduledTask;

class MysqlScheduledTaskModel implements IScheduledTask
{

	public $id;

	public $execution_date;

	public $expiration_date;

	public $state_id;

	public $task_type_id;

	public $last_handled_id;

	/**
	 * @return DateTime
	 * @throws Exception
	 */
	public function getExecutionDate()
	{
		return new DateTime($this->getExpirationDate());
	}

	/**
	 * @return DateTime
	 * @throws Exception
	 */
	public function getExpirationDate()
	{
		return new DateTime($this->getExpirationDate());
	}

	/**
	 * @return int
	 */
	public function getState()
	{
		return $this->state_id;
	}

	/**
	 * @return int
	 */
	public function getTaskTypeId()
	{
		return $this->task_type_id;
	}

	/**
	 * @return int
	 */
	public function getLastHandledId()
	{
		return $this->last_handled_id;
	}
}