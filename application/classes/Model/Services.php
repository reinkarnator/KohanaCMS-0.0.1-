<?php defined('SYSPATH') or die('No direct script access.');

class Model_Services extends Model
{
    protected $_tableMenu = 'services';

    public function get_all($lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'gallery','status')
                    ->from($this->_tableMenu)            
                    ->where('status','=','1')    
                    ->order_by('id', 'ASC') 
                    ->limit(2)    
                    ->execute();

        $result = $query->as_array();
		
		foreach($result as $k=> $res) {
			$gall_list = explode("\n",$result[$k]['gallery']);
			$gall_list = array_filter($gall_list);
			
			$result[$k]['gallery'] = $gall_list;			
		}

        if($result) 
           return $result;
        else
           return FALSE;      
    }   

     public function get_item($id,$lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'gallery','status')
                    ->from($this->_tableMenu) 
                    ->where('status','=','1')   
                    ->and_where('id','=',':id')            
                    ->order_by('id', 'ASC')
                    ->param(':id', $id)     
                    ->execute();

        $result = $query->as_array();
		
		$gall_list = explode("\n",$result[0]['gallery']);
		$gall_list = array_filter($gall_list);
		
		$result[0]['gallery'] = $gall_list;

        if($result) {                       
           return $result[0];
        } else {
           return FALSE; 
        }        
    }            

}