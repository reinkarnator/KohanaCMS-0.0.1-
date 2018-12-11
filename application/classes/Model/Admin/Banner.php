<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_Banner extends Model {

      protected $_tableArticles = 'banner';

      public function get_all(){

          $query = DB::select()->from($this->_tableArticles)->order_by('id','ASC') 
                   ->execute();

          $result = $query->as_array();

          if($result)
              return $result;
          else
              return FALSE;

      }
      
      public function get_unique(){

          $query = DB::select()->from($this->_tableArticles)->order_by('id','ASC') 
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
              $type = $elems[1];
              $url = $elems[2];
              $img_link = $elems[3];

              $update = DB::update($this->_tableArticles)
                       ->set(array('type'=>$type))
                       ->set(array('url'=>$url))
                       ->set(array('img_link'=>$img_link));


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

              return $sql = DB::delete($this->_tableArticles)->where('id','=',':id')
                              ->param(':id', (int)$id)
                              ->execute();

      }


      public function add_element(){}


      public function save_element($lang_count,$elems,$dyn_elems){
    
              $type = $elems[0];
              $url = $elems[1];
              $img_link = $elems[2];

              $sql = DB::insert($this->_tableArticles);
              $col = array('type','url','img_link');
              $val = array($type,$url,$img_link);

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