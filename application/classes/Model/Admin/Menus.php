<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_Menus extends Model_Admin_ModelPresets {

protected $_tableArticles = 'menu';


    public function get_all(){

        $lang = Kohana::$config->load('lang')->get('adminLang');   

        $query = DB::select()->from($this->_tableArticles)
                             ->order_by('parent_id')
                             ->order_by('order_id')  
                             ->execute();

        $result = $query->as_array();

        $query_menu = DB::select('id','name_'.$lang)->from($this->_tableArticles)  
                      ->execute();

        $result_menu=$query_menu->as_array();
        $result[0]['result_menu']=$result_menu;

        if($result)
            return $result;
        else
            return FALSE;
    }

    public function buildMenu($parentId,$menuData,$c,$id,$y)
    {
        $html = '';
        $lang = Kohana::$config->load('lang')->get('adminLang');      
       
        if (isset($menuData['parents'][$parentId]))
        {
            foreach ($menuData['parents'][$parentId] as $itemId)
            {  
              if ($menuData['items'][$itemId]['parent_id']==$c) {   
                 $x = str_repeat('&#8211', $y++);
                 //Selected items
                 if ($id!=0 && $menuData['items'][$itemId]['id']==$menuData['items'][$id]['parent_id']){ 
                  $html .= '<option selected value="'.$menuData['items'][$itemId]['id'].'">'.$x.$menuData['items'][$itemId]['name_'.$lang.''].'</option><span></span>';
                 }else{ 
                  $html .= '<option value="'.$menuData['items'][$itemId]['id'].'">'.$x.$menuData['items'][$itemId]['name_'.$lang.''].'</option><span></span>';
                 } 
                 //Create new elements
                  $html .=$this->buildMenu($itemId,$menuData,$menuData['items'][$itemId]['id'],$id,$y);    
                 //Make counter - to equil same level menu
                  --$y;
              }   
            }
           
        }

        return $html;
    }

    public function get_selected($id)
    {
        $query = DB::select()->from($this->_tableArticles)->where('id','=',':id')
                 ->param(':id', (int)$id) 
                 ->execute();

        $result = $query->as_array();

        if($result)
            return $result[0]['parent_id'];
        else
            return FALSE;
    }

    public function add_element(){

        $lang = Kohana::$config->load('lang')->get('adminLang');    

        $query = DB::select()->from($this->_tableArticles)->order_by('parent_id')->order_by('name_'.$lang)
                       ->as_assoc()
                       ->execute();  

        $menuData = array(
            'items' => array(),
            'parents' => array()
        );

        foreach ($query as $menuItem)
        {
            $menuData['items'][$menuItem['id']] = $menuItem;
            $menuData['parents'][$menuItem['parent_id']][] = $menuItem['id'];
        }
        
        return $this->buildMenu(0,$menuData,0,0,0);

    }


    public function edit_builder($id){

      $lang = Kohana::$config->load('lang')->get('adminLang');      
      
      $query = DB::select()->from($this->_tableArticles)
                     ->order_by('parent_id')
                     ->order_by('name_'.$lang)
                     ->as_assoc()
                     ->execute();  

        $menuData = array(
            'items' => array(),
            'parents' => array()
        );

        foreach ($query as $menuItem)
        {
            $menuData['items'][$menuItem['id']] = $menuItem;
            $menuData['parents'][$menuItem['parent_id']][] = $menuItem['id'];
        }

        return $this->buildMenu(0,$menuData,0,$id,0);

    }




/*--------------------------------EDIT REMOVE INSERT---------------------------------------*/



      public function edit_element($id){

        $query = DB::select()->from($this->_tableArticles)->where('id','=',':id')
                 ->param(':id', (int)$id) 
                 ->execute();

        $result = $query->as_array();
        $result[0]['menus_all']=$this->edit_builder($id);

        if($result)
            return $result[0];
        else
            return FALSE;

      }

      public function update_element($lang_count,$dyn_elems,$elems){    
   
              $id=$elems[0];
              $alt_categories=$this->str2url($dyn_elems[0][0]);
              $get_type=$elems[2];
              $parent=trim($elems[3]);
              $status=$elems[4];
              $order=$elems[5];
              $links=$elems[6];
              $component=$elems[7];


              $update = DB::update($this->_tableArticles)
                       ->set(array('alt_title'=>$alt_categories))
                       ->set(array('order_id'=>$order))
                       ->set(array('type'=>$get_type))
                       ->set(array('status'=>$status))
                       ->set(array('parent_id'=>$parent))
                       ->set(array('link'=>$links))
                       ->set(array('component'=>$component));

              foreach ($lang_count as $key => $langs) {
                  $update->set(array('name_'.$langs => $dyn_elems[0][$key]));
              }

              $update->where('id','=',':id')
                      ->param(':id', (int)$id)
                      ->execute();



              $query = DB::select()->from($this->_tableArticles)->where('id','=',':id')
                                   ->param(':id', (int)$id)
                                   ->execute();

              $result = $query->as_array();
              $result[0]['menus_all']=$this->edit_builder($id);


              if($result)
                  return $result[0];
              else
                  return FALSE;
      }

      public function save_element($lang_count,$dyn_elems,$elems){
    
              $alt_categories=$this->str2url($dyn_elems[0][0]);
              $get_type=$elems[1];
              $parent=trim($elems[2]);
              $status=$elems[3];
              $order=$elems[4];
              $links=$elems[5];
              $component=$elems[6];

              $sql = DB::insert($this->_tableArticles);
              $col = array('order_id','alt_title','type','parent_id','status','link','component');
              $val = array($order,$alt_categories,$get_type,$parent,$status,$links,$component);

              foreach ($lang_count as $key => $langs) {
                  $col[] = 'name_'.$langs;
                  $val[] = $dyn_elems[0][$key];
              }

              $sql->columns($col); 
              $sql->values($val); 

              return $sql->execute();
      }




      public function repos_element($menu_id,$order_id){

              $query = DB::update($this->_tableArticles)
                       ->set(array('order_id'=>$order_id))
                       ->where('id','=',':menu_id') 
                       ->param(':menu_id', (int)$menu_id)  
                       ->execute();

      }


      public function remove_element($id){

              return DB::delete($this->_tableArticles)->where('id','=',':id')
                         ->param(':id', (int)$id)
                         ->execute();

      }


}