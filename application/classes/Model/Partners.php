<?php defined('SYSPATH') or die('No direct script access.');

class Model_Partners extends Model
{
    protected $_tableMenu = 'partners';

    public function get_all($lang)
    {
        $query = DB::select(array('name_'.$lang,'name'),'photo','url','status')
            ->from($this->_tableMenu) 
            ->where('status','=','1')               
            ->order_by('id', 'ASC')     
            ->execute();

        $result = $query->as_array();

        if($result) {           
           return $result;
        } else { 
           return FALSE;
        }        
    }            

}