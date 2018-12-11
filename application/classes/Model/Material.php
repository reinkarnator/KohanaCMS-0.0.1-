<?php defined('SYSPATH') or die('No direct script access.');

class Model_Material extends Model
{
    protected $_tableArticles = 'materials';
    protected $_tableMenus = 'menu';
    protected $_tableMap = 'map';
   // protected $_table_name = 'menu';
   // protected $_db_group = 'mysqli';

    public function get_material($id,$lang)
    {
        $query = DB::select('id',array('title_'.$lang, 'title'),array('text_'.$lang, 'text'),'menu_id','gallery')->from($this->_tableArticles)
            ->where('menu_id','=',':id')
            ->and_where('status','=','1')
            ->param(':id', (int)$id)
            ->execute();

        $result = $query->as_array();

        $gall_list = explode("\n",$result[0]['gallery']);
		$gall_list = array_filter($gall_list);

        $result[0]['photos'] = $gall_list;

        if($result)
            return $result[0];
        else
            return FALSE;
    }

    public function get_map($lang)
    {
        $query = DB::select(array('country_'.$lang, 'country'),'logo','coordinates','status')->from($this->_tableMap)
            ->where('status','=','1')
            ->execute();

        $result = $query->as_array();

        foreach ($result as $key => $value) {
            $result[$key]['logo'] = explode("\n",$result[$key]['logo']);
        }       

        if($result)
            return $result;
        else
            return FALSE;
    }    

    public function get_mainpage($lang)
    {
        $result1 = DB::select('id')->from($this->_tableMenus)->where('order_id','=','1')
            ->execute();
        $result1 = $result1->as_array();    
 
  //      $result1 = ORM::factory($this->_table_name);
  //      $result1->where('order_id' , '=' , 1)->find();
  //      $result1->as_object()-execute();
  //      $sql1 = "SELECT id FROM ". $this->_tableMenus ." WHERE `order_id` = 1";

  //      $query1 = DB::query(Database::SELECT, $sql1, FALSE)
  //               ->execute();

  //      $result1 = $query1->as_array();

        $query = DB::select('id',array('title_'.$lang, 'title'),array('text_'.$lang, 'text'),'menu_id')->from($this->_tableArticles)->where('menu_id','=',$result1[0])
            ->execute();

        $result = $query->as_array();

        if($result)
            return $result[0];
        else
            return FALSE;
    }

    public function get_heads($id,$lang){
         $query = DB::select(array('pg_description_'.$lang, 'pg_description'),array('pg_keywords_'.$lang, 'pg_keywords'))->from($this->_tableArticles)->where('menu_id','=',':id')
                         ->param(':id', (int)$id)
                         ->execute();

        $result = $query->as_array();

        if($result)
            return $result[0];
        else
            return FALSE;

    }
}