<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_Socials extends Model_Admin_ModelPresets {

      protected $_tableArticles = 'socials';

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


      public function update_element($elems){
   
        $id = $elems[0];
        $name = $elems[1];       
        $url = $elems[2];       
        $status = $elems[3];       


        $update = DB::update($this->_tableArticles)
                 ->set(array('name'=>$name))
                 ->set(array('status'=>$status))
                 ->set(array('url'=>$url));
        
        
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


      public function save_element($elems){

        $name = $elems[0];       
        $url = $elems[1]; 
        $status = $elems[2];

         $sql = DB::insert($this->_tableArticles);
         $col = array('name','url','status');
         $val = array($name,$url,$status);

         $sql->columns($col); 
         $sql->values($val); 

         return $sql->execute();

      }
}