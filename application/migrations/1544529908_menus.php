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
		$langslist = Kohana::$config->load('lang')->get('langsList');
	    $lang_cols['id'] = 'primary_key';
	    $lang_cols['order_id'] = array('integer', 'null' => TRUE);
	    $lang_cols['alt_title'] = array('string', 'null' => FALSE);

 	    foreach ($langslist as $langs) {
	    	$lang_cols['name_'.$langs] = array('string', 'null' => FALSE);
	    }

	    $lang_cols['type'] = array('string', 'null' => FALSE, 'default' => 'top');
	    $lang_cols['parent_id'] = array('integer', 'null' => FALSE, 'default' => '0');	    
	    $lang_cols['status'] = array('integer', 'null' => FALSE, 'default' => '1');
	    $lang_cols['link'] = array('string', 'null' => TRUE);
	    $lang_cols['component'] = array('integer', 'null' => TRUE);

		$this->create_table( "menu", $lang_cols, array(
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
