<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_Brands extends Model_Admin_ModelPresets {

      protected $_tableArticles = 'brands';

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


      public function get_parents($id = NULL){
          $deflang = Kohana::$config->load('lang')->get('adminLang');  

          if ($id == NULL) {
            $query = DB::select('id','alt_title',array('name_'.$deflang, 'name'))
                    ->from($this->_tableArticles)
                    ->order_by('id','ASC') 
                    ->execute();   
          } else {
            $query = DB::select('id','alt_title',array('name_'.$deflang, 'name'))
                    ->from($this->_tableArticles)
                    ->where('id','<>',':id')
                    ->order_by('id','ASC') 
                    ->param(':id',(int)$id)
                    ->execute();
          }                 


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
        $photo = $elems[2];       
        $pdf = $elems[3];
        $video = $elems[4];
        $status = $elems[5];
        $parent = $elems[6];


        $update = DB::update($this->_tableArticles)
                 ->set(array('alt_title'=>$alt))
                 ->set(array('photo'=>$photo))
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
        $photo = $elems[1];       
        $pdf = $elems[2];
        $video = $elems[3];
        $status = $elems[4];
        $parent = $elems[5];

         $sql = DB::insert($this->_tableArticles);
         $col = array('alt_title','photo','pdf','video','status','parent');
         $val = array($alt,$photo,$pdf,$video,$status,$parent);

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