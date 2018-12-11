<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_Presentations extends Model_Admin_ModelPresets {

      protected $_tableArticles = 'presentations';
      protected $_tableLibrary = 'library';

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

      public function get_library(){
      
          $query = DB::select()->from($this->_tableLibrary)
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
        $photo = $elems[1];
        $pdf = $elems[2];
        $video = $elems[3];
        $head_addon_presentations = $elems[4];
        $img_addon_presentations = $elems[5];        
        $head_addon_catalogue = $elems[6];
        $img_addon_catalogue = $elems[7];
        $head_addon_video = $elems[8];
        $img_addon_video = $elems[9];
        $status = $elems[10];


        (is_array($head_addon_presentations)) ? $head_addon_presentations = implode('-|-',$head_addon_presentations) : $head_addon_presentations = $head_addon_presentations;
        (is_array($img_addon_presentations)) ? $img_addon_presentations = implode('-|-',$img_addon_presentations) : $img_addon_presentations = $img_addon_presentations;
        (is_array($head_addon_catalogue)) ? $head_addon_catalogue = implode('-|-',$head_addon_catalogue) : $head_addon_catalogue = $head_addon_catalogue;
        (is_array($img_addon_catalogue)) ? $img_addon_catalogue = implode('-|-',$img_addon_catalogue) : $img_addon_catalogue = $img_addon_catalogue;
        (is_array($head_addon_video)) ? $head_addon_video = implode('-|-',$head_addon_video) : $head_addon_video = $head_addon_video;        
        (is_array($img_addon_video)) ? $img_addon_video = implode('-|-',$img_addon_video) : $img_addon_video = $img_addon_video;        

        $update = DB::update($this->_tableArticles)
                  ->set(array('photo'=>$photo))
                  ->set(array('head_addon_presentations'=>$head_addon_presentations))
                  ->set(array('img_addon_presentations'=>$img_addon_presentations))
                  ->set(array('head_addon_catalogue'=>$head_addon_catalogue))
                  ->set(array('img_addon_catalogue'=>$img_addon_catalogue))
                  ->set(array('head_addon_video'=>$head_addon_video))
                  ->set(array('img_addon_video'=>$img_addon_video))
                  ->set(array('pdf'=>$pdf))
                  ->set(array('video'=>$video))
                  ->set(array('status'=>$status));
        

        foreach ($lang_count as $key => $langs) {

            $update->set(array('name_'.$langs => $dyn_elems[0][$key]));
            $update->set(array('description_'.$langs => $dyn_elems[1][$key]));

        }
        
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

        $photo = $elems[0];
        $pdf = $elems[1];
        $video = $elems[2];
        $head_addon_presentations = $elems[3];
        $img_addon_presentations = $elems[4];        
        $head_addon_catalogue = $elems[5];
        $img_addon_catalogue = $elems[6];
        $head_addon_video = $elems[7];
        $img_addon_video = $elems[8]; 
        $status = $elems[9];

        (is_array($head_addon_presentations)) ? $head_addon_presentations = implode('-|-',$head_addon_presentations) : $head_addon_presentations = $head_addon_presentations;
        (is_array($img_addon_presentations)) ? $img_addon_presentations = implode('-|-',$img_addon_presentations) : $img_addon_presentations = $img_addon_presentations;
        (is_array($head_addon_catalogue)) ? $head_addon_catalogue = implode('-|-',$head_addon_catalogue) : $head_addon_catalogue = $head_addon_catalogue;
        (is_array($img_addon_catalogue)) ? $img_addon_catalogue = implode('-|-',$img_addon_catalogue) : $img_addon_catalogue = $img_addon_catalogue;
        (is_array($head_addon_video)) ? $head_addon_video = implode('-|-',$head_addon_video) : $head_addon_video = $head_addon_video;        
        (is_array($img_addon_video)) ? $img_addon_video = implode('-|-',$img_addon_video) : $img_addon_video = $img_addon_video;                  

         $sql = DB::insert($this->_tableArticles);
         $col = array('photo','pdf','video','head_addon_presentations','img_addon_presentations','head_addon_catalogue','img_addon_catalogue','head_addon_video','img_addon_video','status');
         $val = array($photo,$pdf,$video,$head_addon_presentations,$img_addon_presentations,$head_addon_catalogue,$img_addon_catalogue,$head_addon_video,$img_addon_video,$status);

         foreach ($lang_count as $key => $langs) {

            $col[] = 'name_'.$langs;
            $col[] = 'description_'.$langs;
            $val[] = $dyn_elems[0][$key];
            $val[] = $dyn_elems[1][$key];

         }

         $sql->columns($col); 
         $sql->values($val); 

         return $sql->execute();

      }
}