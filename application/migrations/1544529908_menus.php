<?php defined('SYSPATH') OR die('No direct script access.');
/**
* create_table($table_name, $fields, array('id' => TRUE, 'options' => ''))
* drop_table($table_name)
* rename_table($old_name, $new_name)
* add_column($table_name, $column_name, $params)
* rename_column($table_name, $column_name, $new_column_name)
* change_column($table_name, $column_name, $params)
* remove_column($table_name, $column_name)
* add_index($table_name, $index_name, $columns, $index_type = 'normal')
* remove_index($table_name, $index_name)
*/
class Menus extends Migration {

	public function up()
	{
		$this->create_table( "menu", array(
				'id' => 'primary_key',
				'order_id' => array('integer', 'null' => FALSE),
				'alt_title' => array('string', 'null' => FALSE),
				'name_en' => array('string', 'null' => FALSE),
				'name_ru' => array('string', 'null' => FALSE),
				'type' => array('string', 'null' => FALSE, 'default' => 'top'),
				'parent_id' => array('integer', 'null' => FALSE, 'default' => 0),
				'status' => array('integer', 'null' => FALSE, 'default' => 1),
				'link' => array('string', 'null' => TRUE),
				'component' => array('integer', 'null' => TRUE),
			), array(
				'id' => TRUE,
				'options' => 'ENGINE=innoDB CHARSET=utf8'
			)
		);
	}

	public function down()
	{

		$this->drop_table('menu');
	}
}
