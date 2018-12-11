<?php defined('SYSPATH') or die('No direct script access.');

class Model_Menu extends Model
{
   protected $_tableMenu = 'menu';
   

   public function buildMenu($parentId,$menuData,$dept,$lang,$id)
    {
        $html = '';

        if (isset($menuData['parents'][$parentId]))
        {
          $html .= '<ul class="nav navbar-nav">';
            foreach ($menuData['parents'][$parentId] as $itemId)
            {
            if ($menuData['items'][$itemId]['component']=='2') { 
             if ($menuData['items'][$itemId]['id']=='1'){
                if ($menuData['items'][$itemId]['id']=='1' && Request::current()->controller()=='Menu' && $id<='1') {
                $html .= '<li id="t'.$menuData['items'][$itemId]['id'].'"><a class="active-menu" href="'.URL::site().$lang.'" >'.$menuData['items'][$itemId]['name'].'</a>';
                }else{
                $html .= '<li id="t'.$menuData['items'][$itemId]['id'].'"><a href="'.URL::site().$lang.'" >'.$menuData['items'][$itemId]['name'].'</a>';    
                }
                
             } else {
                if ($id==$menuData['items'][$itemId]['id'] && $id!='1') { 
                $html .= '<li id="t'.$menuData['items'][$itemId]['id'].'"><a class="active-menu" href="'.URL::site().$lang.'/page/'.$menuData['items'][$itemId]['id'].'-'.$menuData['items'][$itemId]['alt_title'].'" >'.$menuData['items'][$itemId]['name'].'</a>';
                }else{
                $html .= '<li id="t'.$menuData['items'][$itemId]['id'].'"><a href="'.URL::site().$lang.'/page/'.$menuData['items'][$itemId]['id'].'-'.$menuData['items'][$itemId]['alt_title'].'" >'.$menuData['items'][$itemId]['name'].'</a>';
                }
             }
            }
            if ($menuData['items'][$itemId]['component']=='3') { 
             if ($menuData['items'][$itemId]['id']=='1'){
                if ($menuData['items'][$itemId]['id']=='1' && Request::current()->controller()=='Menu' && $id<='1') {
                $html .= '<li id="t'.$menuData['items'][$itemId]['id'].'"><a class="active-menu" href="#" >'.$menuData['items'][$itemId]['name'].'</a>';
                }else{
                $html .= '<li id="t'.$menuData['items'][$itemId]['id'].'"><a href="#" >'.$menuData['items'][$itemId]['name'].'</a>';    
                }
                
             } else {
                if ($id==$menuData['items'][$itemId]['id'] && $id!='1') { 
                $html .= '<li id="t'.$menuData['items'][$itemId]['id'].'"><a class="active-menu" href="#" >'.$menuData['items'][$itemId]['name'].'</a>';
                }else{
                $html .= '<li id="t'.$menuData['items'][$itemId]['id'].'"><a href="#" >'.$menuData['items'][$itemId]['name'].'</a>';
                }
             }
            }
            if ($menuData['items'][$itemId]['component']=='1') { 
                $curr_link = str_replace("/", "", $menuData['items'][$itemId]['link']);
                $curr_link = ucfirst($curr_link);
                $pos = strpos($menuData['items'][$itemId]['link'],"http://");
                if (Request::current()->controller()==$curr_link) { 
                  if ($pos!==FALSE){    
                $html .= '<li id="t'.$menuData['items'][$itemId]['id'].'"><a class="active-menu" href="'.$menuData['items'][$itemId]['link'].'" target="_blank" rel="nofollow">'.$menuData['items'][$itemId]['name'].'</a>';
                  }else{
                $html .= '<li id="t'.$menuData['items'][$itemId]['id'].'"><a class="active-menu" href="'.URL::site().$lang.$menuData['items'][$itemId]['link'].'" >'.$menuData['items'][$itemId]['name'].'</a>';  
                  }
                }else{
                  if ($pos!==FALSE){    
                $html .= '<li id="t'.$menuData['items'][$itemId]['id'].'"><a href="'.$menuData['items'][$itemId]['link'].'" target="_blank" rel="nofollow">'.$menuData['items'][$itemId]['name'].'</a>';
                  }else{
                $html .= '<li id="t'.$menuData['items'][$itemId]['id'].'"><a href="'.URL::site().$lang.$menuData['items'][$itemId]['link'].'" >'.$menuData['items'][$itemId]['name'].'</a>';  
                  }
                }
            }

                $html .= $this->buildMenu($itemId,$menuData,$dept,$lang,$id);

                $html .= '</li>';
            }
            $html .= '</ul>';
        }

        return $html;
    }


public function all_menus_left($lang,$inner){
    $query = DB::select('id','alt_title',array('name_'.$lang, 'name'), array('description_'.$lang, 'description'),'type','parent_id','component','link')->from($this->_tableMenu)->where('type','=','left')->and_where('status','=','1')->order_by('parent_id')->order_by('order_id')
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
       // print_r($menuData['parents']);
    }
  return $this->buildMenu(0,$menuData,0,$lang,$inner);
}


public function all_menus_top($lang,$id){
    $query = DB::select('id','alt_title',array('name_'.$lang, 'name'), array('description_'.$lang, 'description'),'type','parent_id','component','link')->from($this->_tableMenu)->where('type','=','top')->and_where('status','=','1')->order_by('parent_id')->order_by('order_id')
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
       // print_r($menuData['parents']);
    }
  return $this->buildMenu(0,$menuData,0,$lang,$id);
}

public function get_menu($id = '',$lang)
    {
        $query = DB::select('id','alt_title',array('name_'.$lang, 'name'), array('description_'.$lang, 'description'),'type','parent_id','component','link')->from($this->_tableMenu)->where('id','=',':id')
            ->param(':id', (int)$id)
            ->execute();

        $result = $query->as_array();

        if($result)
            return $result[0];
        else
            return FALSE;
    }

}