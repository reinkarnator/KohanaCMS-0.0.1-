<?php defined('SYSPATH') or die('No direct script access.');

class Model_Contacts extends Model
{
    protected $_tableMenu = 'contacts';

    public function get_all($lang)
    {
        $query = DB::select(array('address_'.$lang,'address'),'phone','email','mob','map')
            ->from($this->_tableMenu)                  
            ->execute();

        $result = $query->as_array();

        if($result)          
           return $result[0];
        else
           return FALSE;       
    }            

}