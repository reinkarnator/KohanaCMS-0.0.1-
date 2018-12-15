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
class Contacts extends Migration {

	public function up()
	{
	    $langslist = Kohana::$config->load('lang')->get('langsList');
	    $lang_cols['id'] = 'primary_key';

 	    foreach ($langslist as $langs) {
	    	$lang_cols['address_'.$langs] = array('string', 'null' => TRUE);
	    }

	    $lang_cols['phone'] = array('string', 'null' => TRUE);
	    $lang_cols['email'] = array('string', 'null' => TRUE);
	    $lang_cols['mob'] = array('string', 'null' => TRUE);
	    $lang_cols['map'] = array('text', 'null' => TRUE);


		$this->create_table( "contacts", $lang_cols, array(
				'id' => TRUE,
				'options' => 'ENGINE=innoDB CHARSET=utf8'
			)
		);
	}

	public function down()
	{
		$this->drop_table('contacts');
	}
}
