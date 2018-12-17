<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_Contacts extends Model_Admin_ModelPresets {

      protected $_tableArticles = 'contacts';

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
          $phone = $elems[1];
          $mob = $elems[2];          
          $email = $elems[3];          
          $map = $elems[4];          

          $update = DB::update($this->_tableArticles)
                      ->set(array('phone'=>$phone))
                      ->set(array('mob'=>$mob))
                      ->set(array('email'=>$email))
                      ->set(array('map'=>$map));
          

          foreach ($lang_count as $key => $langs) {
              $update->set(array('address_'.$langs => $dyn_elems[0][$key]));
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
}