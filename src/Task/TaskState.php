<?php


namespace JCI\Task;

final class TaskState
{
	const PENDING = 0;
	const IN_PROGRESS = 1;
	const COMPLETED = 2;
	const ERROR = -1;
}