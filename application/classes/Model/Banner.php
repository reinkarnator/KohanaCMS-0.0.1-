<?php defined('SYSPATH') or die('No direct script access.');

class Model_Banner extends Model
{
    protected $_tableMenu = 'banner';
    
    public function all_slider($lang)
    {
        $query = DB::select('id',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'type','url','img_link')
    	       ->from($this->_tableMenu)
               ->execute();

        $result = $query->as_array();

        if($result)
        	return $result;
        else
        	return FALSE;
    }
}