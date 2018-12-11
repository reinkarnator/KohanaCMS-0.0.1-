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
class Materials extends Migration {

	public function up()
	{
		$this->create_table( "materials", array(
				'id' => 'primary_key',
				'title_en' => array('string', 'null' => FALSE),
				'title_ru' => array('string', 'null' => FALSE),
				'text_en' => array('text', 'null' => FALSE),
				'text_ru' => array('text', 'null' => FALSE),	
				'menu_id' => array('integer', 'null' => FALSE),		
				'pg_description_en' => array('string', 'null' => TRUE),
				'pg_description_ru' => array('string', 'null' => TRUE),	
				'pg_keywords_en' => array('string', 'null' => TRUE),
				'pg_keywords_ru' => array('string', 'null' => TRUE),									
				'status' => array('integer', 'null' => FALSE, 'default' => 1),
				'gallery' => array('text', 'null' => TRUE),
			), array(
				'id' => TRUE,
				'options' => 'ENGINE=innoDB CHARSET=utf8'
			)
		);
	}

	public function down()
	{

		$this->drop_table('materials');
	}
}
