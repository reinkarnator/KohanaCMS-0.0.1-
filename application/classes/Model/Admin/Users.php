<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_users extends Model_Admin_ModelPresets {

    protected $_table_name = 'users';

    public function get_all(){

          $query = DB::select()->from($this->_table_name)
                    ->execute();

          $result = $query->as_array();

          if($result)
              return $result;
          else
              return FALSE;

    }


    public function edit_element($id){


          $query = DB::select()->from($this->_table_name)->where('id','=',':id')
                    ->param(':id', (int)$id) 
                    ->execute();

          $result = $query->as_array();

          if($result)
              return $result[0];
          else
              return FALSE;

    }


    public function update_element($id,$name,$uname,$pass,$photo,$email){
     
            $id=$id;
            $name=$name;
            $uname=$uname;
            $pass=$pass;
            $photo=$photo;
            $email=$email;

            $update = DB::update($this->_table_name)
                      ->set(array('name'=>$name))
                      ->set(array('username'=>$uname))
                      ->set(array('password'=>$pass))
                      ->set(array('email'=>$email))
                      ->set(array('photo'=>$photo));

            $update->where('id','=',':id')
                      ->param(':id', (int)$id)
                      ->execute();

            $query = DB::select()->from($this->_table_name)->where('id','=',':id')
                      ->param(':id', (int)$id)
                      ->execute();

            $result = $query->as_array();


            if($result)
                  return $result[0];
            else
                  return FALSE;

    }
}

