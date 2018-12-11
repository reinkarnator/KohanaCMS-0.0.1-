<?php defined('SYSPATH') or die('No direct script access.');

class Model_Products extends Model
{
    protected $_tableMenu = 'products';
    protected $_brands = 'brands';

    public function get_all($lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','photo_position','mainpage','pdf','video','head_addon_presentations','img_addon_presentations','head_addon_catalogue','img_addon_catalogue','head_addon_video','img_addon_video','brand','status','parent')
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
    public function get_item($brand,$lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','photo_position','mainpage','pdf','video','head_addon_presentations','img_addon_presentations','head_addon_catalogue','img_addon_catalogue','head_addon_video','img_addon_video','brand','status','parent')
                    ->from($this->_tableMenu)  
                    ->where('status','=','1') 
                    ->and_where('brand','=',':brand')            
                    ->order_by('id', 'ASC')
                    ->param(':brand', $brand)     
                    ->execute();

        $result = $query->as_array();

        if($result) {
            foreach ($result as $key => $links) {
                $result[$key]['head_addon_presentations'] = explode("-|-", $result[$key]['head_addon_presentations']);
                $result[$key]['img_addon_presentations'] = explode("-|-", $result[$key]['img_addon_presentations']);
                $result[$key]['head_addon_catalogue'] = explode("-|-", $result[$key]['head_addon_catalogue']);
                $result[$key]['img_addon_catalogue'] = explode("-|-", $result[$key]['img_addon_catalogue']);
                $result[$key]['head_addon_video'] = explode("-|-", $result[$key]['head_addon_video']);
                $result[$key]['img_addon_video'] = explode("-|-", $result[$key]['img_addon_video']);
            }            
           return $result;
        } else {
           return FALSE;
        }         
    }   
    public function get_brand($brand,$lang)
    {
        $query = DB::select('id','alt_title','photo',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'status')
                    ->from($this->_brands) 
                    ->where('status','=','1')  
                    ->and_where('alt_title','=',':brand')            
                    ->order_by('id', 'ASC')
                    ->param(':brand', $brand)     
                    ->execute();

        $result = $query->as_array();

        if($result) 
           return $result[0];
        else
           return FALSE;      
    } 
    public function get_breadcrumb($brand,$lang)
    {
        $query = DB::select('id','alt_title','photo',array('name_'.$lang,'name'),'status')
                    ->from($this->_brands) 
                    ->where('status','=','1')  
                    ->and_where('alt_title','=',':brand')            
                    ->order_by('id', 'ASC')
                    ->param(':brand', $brand)     
                    ->execute();

        $result = $query->as_array();

        if($result) {
           return $result[0];
        }else{
           return FALSE;
		}
    } 	
    public function get_item_detailed($id,$lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','photo_position','mainpage','pdf','video','head_addon_presentations','img_addon_presentations','head_addon_catalogue','img_addon_catalogue','head_addon_video','img_addon_video','brand','status','parent')
                    ->from($this->_tableMenu) 
                    ->where('status','=','1') 
                    ->and_where('id','=',':id')            
                    ->param(':id', $id)     
                    ->execute();

        $result = $query->as_array();


        if($result) {
           $detection = $this->childProducts($result[0]['alt_title'],$lang,$result[0]['name']);
          if (empty($detection[0]['alt_title'])) {
                $result[0]['head_addon_presentations'] = explode("-|-", $result[0]['head_addon_presentations']);
                $result[0]['img_addon_presentations'] = explode("-|-", $result[0]['img_addon_presentations']);
                $result[0]['head_addon_catalogue'] = explode("-|-", $result[0]['head_addon_catalogue']);
                $result[0]['img_addon_catalogue'] = explode("-|-", $result[0]['img_addon_catalogue']);
                $result[0]['head_addon_video'] = explode("-|-", $result[0]['head_addon_video']);
                $result[0]['img_addon_video'] = explode("-|-", $result[0]['img_addon_video']);   
                         
              return $result[0];
          } else {
              return $this->childProducts($result[0]['alt_title'],$lang,$result[0]['name']);
          } 
        } else {
           return FALSE;
        }         
    } 
    public function childProducts($id,$lang,$b_name = '') {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','photo_position','mainpage','pdf','video','head_addon_presentations','img_addon_presentations','head_addon_catalogue','img_addon_catalogue','head_addon_video','img_addon_video','brand','status','parent')
                    ->from($this->_tableMenu) 
                    ->where('status','=','1') 
                    ->and_where('parent','=',':id')            
                    ->param(':id', $id)     
                    ->execute();

        $result = $query->as_array();
        $result[0]['bname'] = $b_name;

        if($result) {
            foreach ($result as $key => $links) {
                $result[$key]['head_addon_presentations'] = explode("-|-", $result[$key]['head_addon_presentations']);
                $result[$key]['img_addon_presentations'] = explode("-|-", $result[$key]['img_addon_presentations']);
                $result[$key]['head_addon_catalogue'] = explode("-|-", $result[$key]['head_addon_catalogue']);
                $result[$key]['img_addon_catalogue'] = explode("-|-", $result[$key]['img_addon_catalogue']);
                $result[$key]['head_addon_video'] = explode("-|-", $result[$key]['head_addon_video']);
                $result[$key]['img_addon_video'] = explode("-|-", $result[$key]['img_addon_video']);
            }            
           return $result;
        } else {
           return FALSE;
        }                
    } 

    public function get_item_mainpage($lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','brand','photo_position','mainpage','status')
                    ->from($this->_tableMenu) 
                    ->where('status','=','1')           
                    ->and_where('photo_position','=','1') 
                    ->order_by('id', 'ASC') 
                    ->limit(1)               
                    ->execute();

        $result = $query->as_array();


        if($result) {
            return $result[0];
        } else {
            return FALSE;
        }         
    }

    public function get_item_mainpage_secondary($lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','brand','photo_position','mainpage','status')
                    ->from($this->_tableMenu) 
                    ->where('status','=','1')           
                    ->and_where('mainpage','=','1') 
                    ->order_by('id', 'ASC') 
                    ->limit(2)               
                    ->execute();

        $result = $query->as_array();


        if($result) {
            return $result;
        } else {
            return FALSE;
        }         
    }    

    public function get_item_other($id,$lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','brand','photo_position','mainpage','status')
                    ->from($this->_tableMenu) 
                    ->where('status','=','1')           
                    ->and_where('id','<>',':id')           
                    ->order_by('id', 'ASC') 
                    ->limit(4)          
                    ->param(':id', $id)     
                    ->execute();

        $result = $query->as_array();


        if($result) {
              return $result;
        } else {
           return FALSE;
        }         
    }                    

}