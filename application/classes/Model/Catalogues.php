<?php defined('SYSPATH') or die('No direct script access.');

class Model_Catalogues extends Model
{
    protected $_tableMenu = 'catalogues';

    public function get_all($lang)
    {
        $query = DB::select('id',array('name_'.$lang,'name'),'year','gallery')
                    ->from($this->_tableMenu)
                    ->order_by('year','ASC')
                    ->execute();

        $result = $query->as_array();

        if($result)
            return $result;
        else
            return FALSE;
    }

    public function get_year()
    {
        $query = DB::select('id','year')
                    ->distinct(true)
                    ->from($this->_tableMenu)
                    ->order_by('id','ASC')
                    ->execute();

        $result = $query->as_array();


        foreach ($result as $key => $value) {
            //$result[$key]['year'] = date('Y', strtotime($value['year']));
            $news['year'][] = date('Y', strtotime($value['year']));
            
        }

        $result = array_unique($news['year']);



        if($result)
            return $result;
        else
            return FALSE;
    }
   
}