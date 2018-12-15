<?php defined('SYSPATH') or die('No direct script access.');

class Model_Events extends Model
{
    protected $_tableMenu = 'events';

    public function get_all($lang)
    {
        $query = DB::select('id',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'year','gallery')
                    ->from($this->_tableMenu)
                    ->order_by('id','DESC')
                    ->execute();

        $result = $query->as_array();

        foreach ($result as $key => $value) {
            $result[$key]['photos'] = explode("\n",$result[$key]['gallery']);
        }

        if($result)
            return $result;
        else
            return FALSE;
    }

    public function get_latest($lang)
    {
        $query = DB::select('id',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'year','gallery')
                    ->from($this->_tableMenu)
                    ->order_by('year','DESC')
                    ->limit(4)
                    ->execute();

        $result = $query->as_array();

        foreach ($result as $key => $value) {
            $result[$key]['photos'] = explode("\n",$result[$key]['gallery']);
        }

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
                    ->order_by('id','DESC')
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

    public function get_item($id,$lang)
    {
        $query = DB::select('id',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'year','gallery')
                    ->from($this->_tableMenu)
					->where('id','=',':id')
                    ->order_by('id','ASC')
					->param(':id',$id)
                    ->execute();

        $result = $query->as_array();

        foreach ($result as $value) {
            $result[0]['photos'] = explode("\n",$result[0]['gallery']);
        }

        if($result)
            return $result[0];
        else
            return FALSE;
    }    

}