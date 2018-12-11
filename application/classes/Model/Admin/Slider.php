<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_slider extends Model {

    protected $_tableArticles = 'slider';

    public function get_all(){

          $query = DB::select()->from($this->_tableArticles)
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




    public function update_element($lang_count,$dyn_elems,$elems){
   
        $id=$elems[0];
        $img=$elems[1];
        $status=$elems[2];

        $update = DB::update($this->_tableArticles)
                 ->set(array('photo'=>$img))
                 ->set(array('status'=>$status));

        foreach ($lang_count as $key => $langs) {
           if (is_array($dyn_elems[1][$key])) {
               $dyn_elems[1][$key] = implode('-|-',$dyn_elems[1][$key]);
           } else {
              $dyn_elems[1][$key] = $dyn_elems[1][$key];
           }

            $update->set(array('title_'.$langs => $dyn_elems[0][$key]));
            $update->set(array('full_'.$langs => $dyn_elems[1][$key]));
            $update->set(array('url_'.$langs => $dyn_elems[2][$key]));
            $update->set(array('smalltext_'.$langs => $dyn_elems[3][$key]));
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


    public function save_element($lang_count,$dyn_elems,$elems){
   
        $img=$elems[0];
        $status=$elems[1];

         $sql = DB::insert($this->_tableArticles);
         $col = array('photo','status');
         $val = array($img,$status);

        foreach ($lang_count as $key => $langs) {

       //   $dyn_elems[1][$key] = (strpos($dyn_elems[1][$key],'-|-') !== FALSE) ? implode('-|-',$dyn_elems[1][$key]) : $dyn_elems[1][$key];
         if (is_array($dyn_elems[1][$key])) {
            $dyn_elems[1][$key] = implode('-|-',$dyn_elems[1][$key]);
         } else {
            $dyn_elems[1][$key] = $dyn_elems[1][$key];
         }


          $col[] = 'title_'.$langs;
          $col[] = 'full_'.$langs;
          $col[] = 'url_'.$langs;
          $col[] = 'smalltext_'.$langs;
          $val[] = $dyn_elems[0][$key];
          $val[] = $dyn_elems[1][$key];
          $val[] = $dyn_elems[2][$key];
          $val[] = $dyn_elems[3][$key];
        }
        $sql->columns($col); 
        $sql->values($val); 

        return $sql->execute();

    }


}