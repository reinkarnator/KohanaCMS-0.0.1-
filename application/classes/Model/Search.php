<?php defined('SYSPATH') or die('No direct script access.');

class Model_Search extends Model
{
    protected $_tableMenu = 'solutions';
    protected $_tableCats = 'services';

    /**
     * Get all articles
     * @return array
     */

    public function get_item($lang)
    { 

        $value = Arr::get($_POST, 'srch_val', FALSE);
        $value = HTML::chars($value);
        if ($value !== FALSE AND $value != '')
        {

                $query1 = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','status','base')
                  ->from($this->_tableCats)
                  ->where('name_'.$lang, 'like', ':val')
                  ->or_where('text_'.$lang, 'like', ':val')
                  ->param(':val', '%'.$value.'%'); 

                $query = DB::select('id','alt_title',array('name_'.$lang,'name'),array('text_'.$lang,'text'),'photo','status','base')
                  ->union($query1, FALSE)
                  ->from($this->_tableMenu)
                  ->where('name_'.$lang, 'like', ':val')
                  ->or_where('text_'.$lang, 'like', ':val')
                  ->param(':val', '%'.$value.'%')
                  ->execute(); 
                                              

            $result = $query->as_array();                

            if($result) {    

               $result[0]["srch_value"] = $value;

                return $result;

            } else {

                return FALSE; 
            }
                

        }         
         
 
    }

    public function get_cat_name($id,$lang)
    { 
        if (is_array($id)) {

            $query = DB::select('id','alt_title',array('title_'.$lang, 'title'))->from($this->_tableCats)->where('id','IN',':id')
                ->param(':id', $id)
                ->execute(); 

        } else {

            $query = DB::select('alt_title',array('title_'.$lang, 'title'))->from($this->_tableCats)->where('id','=',':id')
                ->param(':id', (int)$id)
                ->execute(); 
        }
      
        $result = $query->as_array();


        if($result)
            return $result;
        else
            return FALSE; 

    }  

}