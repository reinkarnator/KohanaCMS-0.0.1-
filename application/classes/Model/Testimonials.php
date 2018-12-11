<?php defined('SYSPATH') or die('No direct script access.');

class Model_Testimonials extends Model
{
    protected $_tableMenu = 'testimonials';

    public function get_all($lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','status','parent')
                    ->from($this->_tableMenu)            
                    ->where('status','=','1')              
                    ->order_by('id', 'ASC')     
                    ->execute();

        $result = $query->as_array();

        if($result) 
           return $result;
        else
           return FALSE;      
    }    

}