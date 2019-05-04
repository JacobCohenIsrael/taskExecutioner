<?php


namespace JCI\Task;


use JCI\Config\Config;
use JCI\Database\PdoAdapter;
use JCI\Task\Contracts\ITask;

class AggregateSpinsTask implements ITask
{

	/**
	 * @var int
	 */
	private $lastHandledId;

	/**
	 * @var PdoAdapter
	 */
	private $adapter;

	public function __construct(PdoAdapter $adapter, int $lastHandledId)
	{
		$this->lastHandledId = $lastHandledId;
		$this->adapter = $adapter;
	}

	public function execute()
	{
		$limit = Config::get('tasks.mysql_aggregation_limit');
		$sql = "SELECT `id`, `player_id`, DATE(`spin_date`) as `Date`, count(`id`) as `spins_count`, SUM(`bet_amount`) as `total_bet_amount`, SUM(`win_amount`) `total_win_amount` 
				FROM `local_db`.`player_spin`
				WHERE `id` > :id
				GROUP BY `player_id`, DATE(`spin_date`)
				LIMIT :id2, :limit";
		//TODO: create class to represent the result
		$result = $this->adapter->selectAll($sql, [
			':id' => $this->lastHandledId,
			':id2' => $this->lastHandledId,
			':limit' => $limit
		]);

		foreach ($result as $rawData)
		{
			//TODO: upsert daily player snapshop table
		}
	}
}