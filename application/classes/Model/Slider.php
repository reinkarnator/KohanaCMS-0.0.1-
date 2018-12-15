<?php defined('SYSPATH') or die('No direct script access.');

class Model_Slider extends Model
{
    protected $_tableMenu = 'slider';
    
    public function all_slider($lang)
    {
    	$query = DB::select('id',array('title_'.$lang,'title'),array('full_'.$lang,'full'),'photo',array('url_'.$lang, 'url'),array('smalltext_'.$lang, 'smalltext'))
		    	->from($this->_tableMenu)
		    	->where('status','=','1')
		      ->execute();

        $result = $query->as_array();
        
			
          foreach($result as $res_key => $res_val){ 
        			if ($result[$res_key]['full']) {
                     $result[$res_key]['full'] = (strpos($result[$res_key]['full'], '-|-')) ? explode("-|-", $result[$res_key]['full']) : $result[$res_key]['full'];
        			}	
          }

        
        if($result)
          return $result;
        else 
          return FALSE;      
    }
}