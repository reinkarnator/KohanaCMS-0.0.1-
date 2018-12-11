<?php defined('SYSPATH') or die('No direct script access.');

class Model_Presentations extends Model
{
    protected $_tableMenu = 'presentations';

    public function get_all($lang)
    {
        $query = DB::select('id',array('name_'.$lang,'name'),array('description_'.$lang,'text'),'photo','pdf','video','head_addon_presentations','img_addon_presentations','head_addon_catalogue','img_addon_catalogue','head_addon_video','img_addon_video','status')
                    ->from($this->_tableMenu) 
                    ->where('status','=','1')               
                    ->order_by('id', 'ASC')     
                    ->execute();

        $result = $query->as_array();
        foreach ($result as $key => $links) {
            $result[$key]['head_addon_presentations'] = explode("-|-", $result[$key]['head_addon_presentations']);
            $result[$key]['img_addon_presentations'] = explode("-|-", $result[$key]['img_addon_presentations']);
            $result[$key]['head_addon_catalogue'] = explode("-|-", $result[$key]['head_addon_catalogue']);
            $result[$key]['img_addon_catalogue'] = explode("-|-", $result[$key]['img_addon_catalogue']);
            $result[$key]['head_addon_video'] = explode("-|-", $result[$key]['head_addon_video']);
            $result[$key]['img_addon_video'] = explode("-|-", $result[$key]['img_addon_video']);
        }


    

        if($result) 
           return $result;
        else
           return FALSE;      
    }         

}