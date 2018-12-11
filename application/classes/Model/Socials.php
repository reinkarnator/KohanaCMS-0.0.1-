<?php defined('SYSPATH') or die('No direct script access.');

class Model_Socials extends Model
{
    protected $_tableMenu = 'socials';

    public function get_all()
    {
        $query = DB::select('name','url','status')
                    ->from($this->_tableMenu)   
                    ->where('status','=','1')              
                    ->execute();

        $result = $query->as_array();

        if($result) 
           return $result;
        else
           return FALSE;      
    }      
}