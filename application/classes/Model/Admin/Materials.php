<?php defined('SYSPATH') or die('No direct script access.');

class Model_Admin_materials extends Model_Admin_ModelPresets {

    protected $_tableArticles = 'materials';
    protected $menu = 'menu';

    public function get_all(){
        $deflang = Kohana::$config->load('lang')->get('adminLang');

        $query = DB::select()->from($this->_tableArticles)->order_by('id','ASC')  
                      ->execute();
           
        $result=$query->as_array();

        $query_menu = DB::select('id','name_'.$deflang)->from($this->menu)  
                      ->execute();

        $result_menu=$query_menu->as_array();
        $result[0]['result_menu']=$result_menu;

            if ($result)
                return $result;
            else
                return FALSE;
    }


    public function buildDauther($parentId,$menuData,$dept)
    {
        $html = '';
        $deflang = Kohana::$config->load('lang')->get('adminLang');

        if (isset($menuData['parents'][$parentId]))
        {
            foreach ($menuData['parents'][$parentId] as $itemId)
            {
                $html .= '<option value="'.$menuData['items'][$itemId]['id'].'">--'.$menuData['items'][$itemId]['name_'.$deflang.''].'</option><span></span>';
                // Выводим детей
                $html .=$this->buildMenu($itemId,$menuData,$dept);
                //  $html .= ;
            }
        }

        return $html;
    }




    public function buildMenu($parentId,$menuData,$dept)
    {
        $html = '';
        $deflang = Kohana::$config->load('lang')->get('adminLang');

        if (isset($menuData['parents'][$parentId]))
        {
            foreach ($menuData['parents'][$parentId] as $itemId)
            {
                $html .= '<option value="'.$menuData['items'][$itemId]['id'].'">'.$menuData['items'][$itemId]['name_'.$deflang.''].'</option><span></span>';

                if ($dept>=1){
                    $html .=$this->buildMenu($itemId,$menuData,$dept);
                }
                if ($dept<1){
                    $html .=$this->buildDauther($itemId,$menuData,$dept);
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
            return $result[0];
        else
            return FALSE;
    }

    public function select_selected($id)
    {
        $k=$this->get_selected($id);
        $query = DB::select()->from($this->menu)->where('id','=',$k['menu_id'])
                 ->execute();

        $result = $query->as_array();

        if($result)
            return $result[0];
        else
            return FALSE;
    }



    public function get_element($id)
    {
        $query = DB::select()->from($this->_tableArticles)->where('id','=',':id')
                ->param(':id', (int)$id) 
                ->execute();

        $result = $query->as_array();
        $result[0]['menus_all']=$this->add_element();
        $result[0]['selected']=$this->select_selected($id);

            if($result)
                return $result[0];
            else
                return FALSE;
    }




    public function update_element($lang_count,$dyn_elems,$elems){

        $id=$elems[0];
        $menu_id=$elems[1];
        $status=$elems[2];
        $gallery = $elems[3];


        $update = DB::update($this->_tableArticles)
                 ->set(array('menu_id'=>$menu_id))
                  ->set(array('gallery'=>$gallery))               
                 ->set(array('status'=>$status));

        foreach ($lang_count as $key => $langs) {
            $update->set(array('title_'.$langs => $dyn_elems[0][$key]));
            $update->set(array('text_'.$langs => $dyn_elems[1][$key]));
            $update->set(array('pg_description_'.$langs => $dyn_elems[2][$key]));
            $update->set(array('pg_keywords_'.$langs => $dyn_elems[3][$key]));
        }
        
        $update->where('id','=',':id')
               ->param(':id', (int)$id)
               ->execute();


        $query = DB::select()->from($this->_tableArticles)->where('id','=',':id')
                   ->param(':id', (int)$id)
                   ->execute();

        $result = $query->as_array();
        $result[0]['menus_all']=$this->add_element();
        $result[0]['selected']=$this->select_selected($id);

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

    public function add_element(){
        $deflang = Kohana::$config->load('lang')->get('adminLang');

        $query = DB::select()->from($this->menu)->order_by('parent_id')->order_by('name_'.$deflang)
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
        
        return $this->buildMenu(0,$menuData,0);
    }

    public function save_element($lang_count,$dyn_elems,$elems){
    
        $menu_id = $elems[0];
        $status=$elems[1];
        $gallery = $elems[2];

         $sql = DB::insert($this->_tableArticles);
         $col = array('menu_id','status','gallery');
         $val = array($menu_id,$status,$gallery);

        foreach ($lang_count as $key => $langs) {
              $col[] = 'title_'.$langs;
              $col[] = 'text_'.$langs;
              $col[] = 'pg_description_'.$langs;
              $col[] = 'pg_keywords_'.$langs;
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

