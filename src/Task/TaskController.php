<?php


namespace JCI\Task;


use Exception;
use JCI\Console\ConsoleRequest;
use JCI\Console\ConsoleResponse;
use JCI\Scheduler\TaskScheduler;

class TaskController extends ConsoleRequest
{
	/**
	 * @param TaskScheduler $taskScheduler
	 * @return ConsoleResponse
	 */
	public function executeDailyScheduledTasks(TaskScheduler $taskScheduler)
	{
		$response = new ConsoleResponse();
		$response->addTextInNewLine('Fetching Daily Scheduled Tasks');
		try {
			$tasks = $taskScheduler->getDailyScheduledTasks();
			foreach ($tasks as $task)
			{
				$task->execute();
				$response->addTextInNewLine("Running task");
				//TODO: get last used ID and update the task table last handled ID to not run on the same rows again.
			}
		} catch (Exception $ex) {
			$response->addTextInNewLine($ex->getMessage());
			//TODO: handle exceptions and change state of the task to error
		}
		$response->addTextInNewLine("Tasks execution complete")->newLine();
		return $response;
	}
}