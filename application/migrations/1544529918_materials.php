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

	    $langslist = Kohana::$config->load('lang')->get('langsList');
	    $lang_cols['id'] = 'primary_key';

 	    foreach ($langslist as $langs) {
	    	$lang_cols['title_'.$langs] = array('string', 'null' => FALSE);
	    	$lang_cols['text_'.$langs] = array('text', 'null' => TRUE);
	    	$lang_cols['pg_description_'.$langs] = array('text', 'null' => TRUE);
	    	$lang_cols['pg_keywords_'.$langs] = array('text', 'null' => TRUE);
	    }
	    
	    $lang_cols['menu_id'] = array('integer', 'null' => FALSE);
	    $lang_cols['gallery'] = array('text', 'null' => TRUE);
	    $lang_cols['status'] = array('integer', 'null' => FALSE, 'default' => '1');


		$this->create_table( "materials", $lang_cols, array(
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
