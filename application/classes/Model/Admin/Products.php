<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_Products extends Model_Admin_ModelPresets {

      protected $_tableArticles = 'products';
      protected $_tableLibrary = 'library';

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

      public function get_parents(){

          $deflang = Kohana::$config->load('lang')->get('adminLang');        

          $query = DB::select('id','alt_title',array('name_'.$deflang, 'name'))
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
        $brand = $elems[2];       
        $photo = $elems[3];       
        $photo_position = $elems[4];       
        $mainpage = $elems[5];       
        $pdf = $elems[6];
        $video = $elems[7];
        $head_addon_presentations = $elems[8];
        $img_addon_presentations = $elems[9];        
        $head_addon_catalogue = $elems[10];
        $img_addon_catalogue = $elems[11];
        $head_addon_video = $elems[12];
        $img_addon_video = $elems[13];        
        $status = $elems[14];
        $parent = $elems[15];

        (is_array($head_addon_presentations)) ? $head_addon_presentations = implode('-|-',$head_addon_presentations) : $head_addon_presentations = $head_addon_presentations;
        (is_array($img_addon_presentations)) ? $img_addon_presentations = implode('-|-',$img_addon_presentations) : $img_addon_presentations = $img_addon_presentations;
        (is_array($head_addon_catalogue)) ? $head_addon_catalogue = implode('-|-',$head_addon_catalogue) : $head_addon_catalogue = $head_addon_catalogue;
        (is_array($img_addon_catalogue)) ? $img_addon_catalogue = implode('-|-',$img_addon_catalogue) : $img_addon_catalogue = $img_addon_catalogue;
        (is_array($head_addon_video)) ? $head_addon_video = implode('-|-',$head_addon_video) : $head_addon_video = $head_addon_video;        
        (is_array($img_addon_video)) ? $img_addon_video = implode('-|-',$img_addon_video) : $img_addon_video = $img_addon_video;            


        $update = DB::update($this->_tableArticles)
                 ->set(array('alt_title'=>$alt))
                 ->set(array('photo'=>$photo))
                 ->set(array('photo_position'=>$photo_position))
                 ->set(array('mainpage'=>$mainpage))
                  ->set(array('head_addon_presentations'=>$head_addon_presentations))
                  ->set(array('img_addon_presentations'=>$img_addon_presentations))
                  ->set(array('head_addon_catalogue'=>$head_addon_catalogue))
                  ->set(array('img_addon_catalogue'=>$img_addon_catalogue))
                  ->set(array('head_addon_video'=>$head_addon_video))
                  ->set(array('img_addon_video'=>$img_addon_video))                 
                 ->set(array('brand'=>$brand))
                 ->set(array('pdf'=>$photo))
                 ->set(array('video'=>$photo))
                 ->set(array('status'=>$status))
                 ->set(array('parent'=>$parent));
        


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
        $brand = $elems[1];       
        $photo = $elems[2];       
        $photo_position = $elems[3];
        $mainpage = $elems[4];       
        $pdf = $elems[5];
        $video = $elems[6];
        $head_addon_presentations = $elems[7];
        $img_addon_presentations = $elems[8];        
        $head_addon_catalogue = $elems[9];
        $img_addon_catalogue = $elems[10];
        $head_addon_video = $elems[11];
        $img_addon_video = $elems[12];         
        $status = $elems[13];
        $parent = $elems[14];


        (is_array($head_addon_presentations)) ? $head_addon_presentations = implode('-|-',$head_addon_presentations) : $head_addon_presentations = $head_addon_presentations;
        (is_array($img_addon_presentations)) ? $img_addon_presentations = implode('-|-',$img_addon_presentations) : $img_addon_presentations = $img_addon_presentations;
        (is_array($head_addon_catalogue)) ? $head_addon_catalogue = implode('-|-',$head_addon_catalogue) : $head_addon_catalogue = $head_addon_catalogue;
        (is_array($img_addon_catalogue)) ? $img_addon_catalogue = implode('-|-',$img_addon_catalogue) : $img_addon_catalogue = $img_addon_catalogue;
        (is_array($head_addon_video)) ? $head_addon_video = implode('-|-',$head_addon_video) : $head_addon_video = $head_addon_video;        
        (is_array($img_addon_video)) ? $img_addon_video = implode('-|-',$img_addon_video) : $img_addon_video = $img_addon_video;          

         $sql = DB::insert($this->_tableArticles);
         $col = array('alt_title','brand','photo','photo_position','mainpage','pdf','video','head_addon_presentations','img_addon_presentations','head_addon_catalogue','img_addon_catalogue','head_addon_video','img_addon_video','status','parent');
         $val = array($alt,$brand,$photo,$photo_position,$mainpage,$pdf,$video,$head_addon_presentations,$img_addon_presentations,$head_addon_catalogue,$img_addon_catalogue,$head_addon_video,$img_addon_video,$status,$parent);

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