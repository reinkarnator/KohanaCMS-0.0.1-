<?php defined('SYSPATH') or die('No direct script access.');

class Model_Solutions extends Model
{
    protected $_tableMenu = 'solutions';

    public function get_all($lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','status','parent')
                    ->from($this->_tableMenu)            
                    ->where('status','=','1')      
                    ->and_where('parent','=','0')           
                    ->order_by('id', 'ASC')     
                    ->execute();

        $result = $query->as_array();

        if($result) 
           return $result;
        else
           return FALSE;      
    } 

    public function get_subs($lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','status','parent')
                    ->from($this->_tableMenu)            
                    ->where('status','=','1')      
                    ->order_by('parent', 'ASC')
                    ->order_by('id', 'ASC')
                    ->as_assoc()     
                    ->execute();

    $menuData = array(
        'items' => array(),
        'parents' => array()
    );

    foreach ($query as $menuItem)
    {
        $menuData['items'][$menuItem['id']] = $menuItem;
        $menuData['parents'][$menuItem['parent']][] = $menuItem['id'];
    }
    
    return $this->buildMenu(0,$menuData,0,$lang);
     
    } 

   public function buildMenu($parentId,$menuData,$k,$lang)
    {

        $html = '';

        if (isset($menuData['parents'][$parentId]))
        {
            $html .= '<ul>';
            foreach ($menuData['parents'][$parentId] as $itemId)
            {
                $k=$k+1;
                $html .= '<li class="sol'.$menuData['items'][$itemId]['id'].'"><a href="'.URL::base(TRUE).$lang.'/solutions/'.$menuData['items'][$itemId]['id'].'-'.$menuData['items'][$itemId]['alt_title'].'" >'.$menuData['items'][$itemId]['name'].'</a>';              
           

                $html .= $this->buildMenu($itemId,$menuData,$k,$lang);

                $html .= '</li>';
            }

            $html .= '</ul>';
        }

        return $html;
    }


    public function get_item($id,$lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','status','head_addon_presentations','img_addon_presentations','head_addon_catalogue','img_addon_catalogue','head_addon_video','img_addon_video','status')
                    ->from($this->_tableMenu)
                    ->where('status','=','1')    
                    ->and_where('id','=',':id')            
                    ->order_by('id', 'ASC')
                    ->param(':id', $id)     
                    ->execute();

        $result = $query->as_array();

        if($result) {
            $result[0]['head_addon_presentations'] = explode("-|-", $result[0]['head_addon_presentations']);
            $result[0]['img_addon_presentations'] = explode("-|-", $result[0]['img_addon_presentations']);
            $result[0]['head_addon_catalogue'] = explode("-|-", $result[0]['head_addon_catalogue']);
            $result[0]['img_addon_catalogue'] = explode("-|-", $result[0]['img_addon_catalogue']);
            $result[0]['head_addon_video'] = explode("-|-", $result[0]['head_addon_video']);
            $result[0]['img_addon_video'] = explode("-|-", $result[0]['img_addon_video']); 

           return $result[0];
        } else {
           return FALSE; 
        }        
    } 
    public function get_childs($id,$lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','status','parent')
                    ->from($this->_tableMenu)            
                    ->where('status','=','1')    
                    ->and_where('parent','=',':id')    
                    ->order_by('id', 'ASC')    
                    ->param(':id', (int)$id) 
                    ->execute();

        $result = $query->as_array();

        if($result) 
           return $result;
        else
           return FALSE;      
    } 
    public function get_ids(){
         $query = DB::select(array(DB::expr('MAX(id)'), 'maxid'),array(DB::expr('MIN(id)'), 'minid'))
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