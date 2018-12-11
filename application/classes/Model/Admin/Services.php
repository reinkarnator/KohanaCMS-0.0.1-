<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_Services extends Model_Admin_ModelPresets {

      protected $_tableArticles = 'services';

      public function get_all(){

          $deflang = Kohana::$config->load('lang')->get('adminLang');        

          $query = DB::select()
                  ->from($this->_tableArticles)
                  ->order_by('id','ASC') 
                  ->execute();          


          $result = $query->as_array();

          if($result)
              return $result;
          else
              return FALSE;
      }   

    /*------------------------------------------------------------------- GET EDIT DELETE ---------------------------------------------------------------------*/      

      public function get_element($id){

          $query = DB::select()
                   ->from($this->_tableArticles)
                   ->where('id','=',':id')
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
        $alt = $elems[1];       
        $gallery = $elems[2];       
        $position = $elems[3];
        $status = $elems[4];
        $head_addon_presentations = $elems[5];
        $img_addon_presentations = $elems[6];        
        $head_addon_catalogue = $elems[7];
        $img_addon_catalogue = $elems[8];
        $head_addon_video = $elems[9];
        $img_addon_video = $elems[10];      

        (is_array($head_addon_presentations)) ? $head_addon_presentations = implode('-|-',$head_addon_presentations) : $head_addon_presentations = $head_addon_presentations;
        (is_array($img_addon_presentations)) ? $img_addon_presentations = implode('-|-',$img_addon_presentations) : $img_addon_presentations = $img_addon_presentations;
        (is_array($head_addon_catalogue)) ? $head_addon_catalogue = implode('-|-',$head_addon_catalogue) : $head_addon_catalogue = $head_addon_catalogue;
        (is_array($img_addon_catalogue)) ? $img_addon_catalogue = implode('-|-',$img_addon_catalogue) : $img_addon_catalogue = $img_addon_catalogue;
        (is_array($head_addon_video)) ? $head_addon_video = implode('-|-',$head_addon_video) : $head_addon_video = $head_addon_video;        
        (is_array($img_addon_video)) ? $img_addon_video = implode('-|-',$img_addon_video) : $img_addon_video = $img_addon_video;             


        $update = DB::update($this->_tableArticles)
                 ->set(array('alt_title'=>$alt))
                 ->set(array('gallery'=>$gallery))
                  ->set(array('head_addon_presentations'=>$head_addon_presentations))
                  ->set(array('img_addon_presentations'=>$img_addon_presentations))
                  ->set(array('head_addon_catalogue'=>$head_addon_catalogue))
                  ->set(array('img_addon_catalogue'=>$img_addon_catalogue))
                  ->set(array('head_addon_video'=>$head_addon_video))
                  ->set(array('img_addon_video'=>$img_addon_video))                 
                 ->set(array('status'=>$status));
        


        foreach ($lang_count as $key => $langs) {

            $update->set(array('name_'.$langs => $dyn_elems[0][$key]));
            $update->set(array('text_'.$langs => $dyn_elems[1][$key]));

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

        return DB::delete($this->_tableArticles)->where('id','=',':id')
                        ->param(':id', (int)$id)
                        ->execute();

      }


      public function add_element(){}


      public function save_element($lang_count,$elems,$dyn_elems){

    
         $alt = $elems[0];
         $gallery = $elems[1];
         $position = $elems[2];
         $status = $elems[3];
        $head_addon_presentations = $elems[4];
        $img_addon_presentations = $elems[5];        
        $head_addon_catalogue = $elems[6];
        $img_addon_catalogue = $elems[7];
        $head_addon_video = $elems[8];
        $img_addon_video = $elems[9];   

        (is_array($head_addon_presentations)) ? $head_addon_presentations = implode('-|-',$head_addon_presentations) : $head_addon_presentations = $head_addon_presentations;
        (is_array($img_addon_presentations)) ? $img_addon_presentations = implode('-|-',$img_addon_presentations) : $img_addon_presentations = $img_addon_presentations;
        (is_array($head_addon_catalogue)) ? $head_addon_catalogue = implode('-|-',$head_addon_catalogue) : $head_addon_catalogue = $head_addon_catalogue;
        (is_array($img_addon_catalogue)) ? $img_addon_catalogue = implode('-|-',$img_addon_catalogue) : $img_addon_catalogue = $img_addon_catalogue;
        (is_array($head_addon_video)) ? $head_addon_video = implode('-|-',$head_addon_video) : $head_addon_video = $head_addon_video;        
        (is_array($img_addon_video)) ? $img_addon_video = implode('-|-',$img_addon_video) : $img_addon_video = $img_addon_video;                 



         $sql = DB::insert($this->_tableArticles);
         $col = array('alt_title','gallery','status','head_addon_presentations','img_addon_presentations','head_addon_catalogue','img_addon_catalogue','head_addon_video','img_addon_video');
         $val = array($alt,$gallery,$status,$head_addon_presentations,$img_addon_presentations,$head_addon_catalogue,$img_addon_catalogue,$head_addon_video,$img_addon_video);

         foreach ($lang_count as $key => $langs) {

            $col[] = 'name_'.$langs;
            $col[] = 'text_'.$langs;
            $val[] = $dyn_elems[0][$key];
            $val[] = $dyn_elems[1][$key];

         }

         $sql->columns($col); 
         $sql->values($val); 

         return $sql->execute();

      }
}