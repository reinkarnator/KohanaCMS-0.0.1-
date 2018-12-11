<?php defined('SYSPATH') or die('No direct script access.');

class Task_Database_Generate extends Minion_Task
{
	protected $_options = array(
		'foo' = 'bar',
		'bar' => NULL,
	);

	/**
	 * This is a demo task
	 *
	 * @return null
	 */
	protected function _execute(array $params)
	{
		var_dump($params);
		echo 'foobar';
	}
}