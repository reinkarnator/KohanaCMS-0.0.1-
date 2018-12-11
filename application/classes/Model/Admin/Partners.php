<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_Partners extends Model_Admin_ModelPresets {

      protected $_tableArticles = 'partners';

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

      /*-------------------------------------------------------------------- GET EDIT DELETE ---------------------------------------------------------------*/      

      public function get_element($id){

          $query = DB::select()->from($this->_tableArticles)
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
          $photo = $elems[1];        
          $url = $elems[2];
          $status = $elems[3];

          $update = DB::update($this->_tableArticles)
                      ->set(array('photo'=>$photo))
                      ->set(array('url'=>$url))
                      ->set(array('status'=>$status));
          

          foreach ($lang_count as $key => $langs) {

              $update->set(array('name_'.$langs => $dyn_elems[0][$key]));

          }
          
          $update->where('id','=',':id')
                 ->param(':id', (int)$id)
                 ->execute();

          $query = DB::select()->from($this->_tableArticles)
                     ->where('id','=',':id')
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

         $photo = $elems[0];
         $url = $elems[1];
         $status = $elems[2];

         $sql = DB::insert($this->_tableArticles);
         $col = array('photo','url','status');
         $val = array($photo,$url,$status);

         foreach ($lang_count as $key => $langs) {

            $col[] = 'name_'.$langs;
            $val[] = $dyn_elems[0][$key];

         }

         $sql->columns($col); 
         $sql->values($val); 

         return $sql->execute();

      }
}