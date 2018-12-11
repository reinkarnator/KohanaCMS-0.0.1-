<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_Library extends Model_Admin_ModelPresets {

      protected $_tableArticles = 'library';

      public function get_all(){
      
          $query = DB::select()->from($this->_tableArticles)
                  ->order_by('id','ASC') 
                  ->execute();

          $result = $query->as_array();

          if($result)
              return $result;
          else
              return FALSE;

      }   

    /*---------------------------- GET EDIT DELETE -----------------------------*/      

      public function get_element($id){

          $query = DB::select()->from($this->_tableArticles)->where('id','=',':id')
                   ->param(':id', (int)$id) 
                   ->execute();

          $result = $query->as_array();

          if($result)
             return $result[0];
          else
             return FALSE;
      }


      public function update_element($lang_count,$elems,$dyn_elems){
   
        $id = $elems[0];
        $head_addon_presentations = $elems[1];
        $img_addon_presentations = $elems[2];        
        $head_addon_catalogue = $elems[3];
        $img_addon_catalogue = $elems[4];
        $head_addon_video = $elems[5];
        $img_addon_video = $elems[6];
        $status = $elems[7];

        (is_array($head_addon_presentations)) ? $head_addon_presentations = implode('-|-',$head_addon_presentations) : $head_addon_presentations = $head_addon_presentations;
        (is_array($img_addon_presentations)) ? $img_addon_presentations = implode('-|-',$img_addon_presentations) : $img_addon_presentations = $img_addon_presentations;
        (is_array($head_addon_catalogue)) ? $head_addon_catalogue = implode('-|-',$head_addon_catalogue) : $head_addon_catalogue = $head_addon_catalogue;
        (is_array($img_addon_catalogue)) ? $img_addon_catalogue = implode('-|-',$img_addon_catalogue) : $img_addon_catalogue = $img_addon_catalogue;
        (is_array($head_addon_video)) ? $head_addon_video = implode('-|-',$head_addon_video) : $head_addon_video = $head_addon_video;        
        (is_array($img_addon_video)) ? $img_addon_video = implode('-|-',$img_addon_video) : $img_addon_video = $img_addon_video;        

        $update = DB::update($this->_tableArticles)
                  ->set(array('head_addon_presentations'=>$head_addon_presentations))
                  ->set(array('img_addon_presentations'=>$img_addon_presentations))
                  ->set(array('head_addon_catalogue'=>$head_addon_catalogue))
                  ->set(array('img_addon_catalogue'=>$img_addon_catalogue))
                  ->set(array('head_addon_video'=>$head_addon_video))
                  ->set(array('img_addon_video'=>$img_addon_video))
                  ->set(array('status'=>$status));
        
        
        $update->where('id','=',':id')
               ->param(':id', (int)$id)
               ->execute();

        $query = DB::select()->from($this->_tableArticles)->where('id','=',':id')
                   ->param(':id', (int)$id)
                   ->execute();

        $result = $query->as_array();


        if($result)
            return $result[0];
        else
            return FALSE;

      }


      public function remove_element($id){

        return $sql = DB::delete($this->_tableArticles)->where('id','=',':id')
                        ->param(':id', (int)$id)
                        ->execute();

      }


      public function add_element(){}


      public function save_element($lang_count,$elems,$dyn_elems){

        $head_addon_presentations = $elems[0];
        $img_addon_presentations = $elems[1];        
        $head_addon_catalogue = $elems[2];
        $img_addon_catalogue = $elems[3];
        $head_addon_video = $elems[4];
        $img_addon_video = $elems[5]; 
        $status = $elems[6];

        (is_array($head_addon_presentations)) ? $head_addon_presentations = implode('-|-',$$head_addon_presentations) : $head_addon_presentations = $head_addon_presentations;
        (is_array($img_addon_presentations)) ? $img_addon_presentations = implode('-|-',$img_addon_presentations) : $img_addon_presentations = $img_addon_presentations;
        (is_array($head_addon_catalogue)) ? $head_addon_catalogue = implode('-|-',$head_addon_catalogue) : $head_addon_catalogue = $head_addon_catalogue;
        (is_array($img_addon_catalogue)) ? $img_addon_catalogue = implode('-|-',$img_addon_catalogue) : $img_addon_catalogue = $img_addon_catalogue;
        (is_array($head_addon_video)) ? $head_addon_video = implode('-|-',$head_addon_video) : $head_addon_video = $head_addon_video;        
        (is_array($img_addon_video)) ? $img_addon_video = implode('-|-',$img_addon_video) : $img_addon_video = $img_addon_video;                  

         $sql = DB::insert($this->_tableArticles);
         $col = array('head_addon_presentations','img_addon_presentations','head_addon_catalogue','img_addon_catalogue','head_addon_video','img_addon_video','status');
         $val = array($head_addon_presentations,$img_addon_presentations,$head_addon_catalogue,$img_addon_catalogue,$head_addon_video,$img_addon_video,$status);

         $sql->columns($col); 
         $sql->values($val); 

         return $sql->execute();

      }
}