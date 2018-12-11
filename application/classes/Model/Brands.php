<?php defined('SYSPATH') or die('No direct script access.');

class Model_Brands extends Model
{
    protected $_tableMenu = 'brands';

    public function get_all($lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','pdf','video','status','parent')
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

    public function get_cats($lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','pdf','video','status','parent')
                    ->from($this->_tableMenu)
                    ->where('status','=','1')               
                    ->order_by('id', 'ASC') 
					->limit(7)					
                    ->execute();

        $result = $query->as_array();

        if($result) 
           return $result;
        else
           return FALSE;      
    }

    public function get_categories_w_parent($lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),'status','parent')
                    ->from($this->_tableMenu)
                    ->where('status','=','1')               
                    ->order_by('id', 'ASC')     
                    ->execute();

        $result = $query->as_array();


        if($result) {

            $map = array();

            foreach ($result as $node) {
              // init self
              if (!array_key_exists($node['id'], $map)) {
                $map[$node['id']] = array('name' => $node['name'],'alt_title' => $node['alt_title'],'parent' => $node['parent']);
              }
              else {
             //   $map[$node['id']]['name'] = $node['name'];
              //  $map[$node['id']]['alt_title'] = $node['alt_title'];
             //   $map[$node['id']]['parent'] = $node['parent'];
              }

              // init parent
              if (!array_key_exists($node['parent'], $map)) {
                $map[$node['parent']] = array();
              }

              // add to parent
              $map[$node['parent']]['child'][$node['id']] = & $map[$node['id']];
            }

           return $map[0];            

        } else {
           return FALSE;
        }  
    }     

}