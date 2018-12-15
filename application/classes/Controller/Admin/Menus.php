<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Menus extends Controller_Admin_Common {

public function action_index()
{

        $action = HTML::chars($this->request->param('method'));
        $id = HTML::chars($this->request->param('id'));
        $artname = HTML::chars($this->request->param('artname'));
        $type = HTML::chars($this->request->controller());
        $lang_count = $this->lang_path();
        $lang = Kohana::$config->load('lang')->get('adminLang');


        $elems[] = $id;
        $elems[] = HTML::chars($this->request->post('alt_title'));       
        $elems[] = HTML::chars($this->request->post('type'));  
        $elems[] = (int)$this->request->post('parent');
        $elems[] = (int)$this->request->post('order');
        $elems[] = (int)$this->request->post('status');
        $elems[] = HTML::chars($this->request->post('link'));
        $elems[] = (int)$this->request->post('component');        

        foreach ($lang_count as $langs) {
              ${'title_categories_'.$langs} = HTML::chars($this->request->post('name_'.$langs));
              ${'description_categories_'.$langs} = HTML::chars($this->request->post('description_'.$langs));

              $dyn_elems[0][] = ${'title_categories_'.$langs};
              $dyn_elems[1][] = ${'description_categories_'.$langs}; 
        }

        switch ($action){
           case 'edit':
             $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                       ->bind('category',$categories)
                       ->bind('type',$type)
                       ->bind('artname',$artname)
                       ->bind('lang_count',$lang_count)
                       ->bind('action',$action)
                       ->bind('id',$id);
             $categories = Model::factory('Admin_'.$type)->edit_element($id);
             $this->template->content = $content;
           break;
           case 'update':
             $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                       ->bind('category',$categories)
                       ->bind('type',$type)
                       ->bind('artname',$artname)
                       ->bind('lang_count',$lang_count)
                       ->bind('action',$action)
                       ->bind('id',$id);
             $categories = Model::factory('Admin_'.$type)->update_element($lang_count,$dyn_elems,$elems);       
             $this->template->content = $content;
           break;
           case 'remove':
             $categories = Model::factory('Admin_'.$type)->remove_element($id);
             $url=URL::base(TRUE,TRUE).'admin/'.$type;
             $this->request->redirect($url);
           break;
        }
}    

public function action_addremove()
{   

        $action = HTML::chars($this->request->param('method'));
        $id = HTML::chars($this->request->param('id'));
        $type = HTML::chars($this->request->controller());
        $lang_count = $this->lang_path();
        $lang = Kohana::$config->load('lang')->get('adminLang');        


        foreach ($lang_count as $langs) {
              ${'title_categories_'.$langs} = HTML::chars($this->request->post('name_'.$langs));
              ${'description_categories_'.$langs} = HTML::chars($this->request->post('description_'.$langs));

              $dyn_elems[0][] = ${'title_categories_'.$langs};
              $dyn_elems[1][] = ${'description_categories_'.$langs}; 
        }

        $order_id   = $this->request->post('order_id');
        $menu_id   = $this->request->post('menu_id');

        $elems[] = HTML::chars($this->request->post('alt_title'));       
        $elems[] = HTML::chars($this->request->post('type'));  
        $elems[] = (int)$this->request->post('parent');
        $elems[] = (int)$this->request->post('order');
        $elems[] = (int)$this->request->post('status');
        $elems[] = HTML::chars($this->request->post('link'));
        $elems[] = (int)$this->request->post('component'); 
          

        switch ($action){
           case 'add':
               $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                          ->bind('type',$type)
                          ->bind('artname',$artname)
                          ->bind('lang_count',$lang_count)
                          ->bind('action',$action)
                          ->bind('menus',$categories);
               $categories = Model::factory('Admin_'.$type)->add_element();
               $this->template->content = $content;
           break;
           case 'save':
               $categories = Model::factory('Admin_'.$type)->save_element($lang_count,$dyn_elems,$elems);
               $url = URL::base(TRUE,TRUE).'admin/'.$type;
               $this->request->redirect($url);
           break;
           case 'changepos':
               foreach( $menu_id as $key => $m_id) :
                $categories = Model::factory('Admin_'.$type)->repos_element($m_id,$order_id[$key]);
               endforeach;
               $url=URL::base(TRUE,TRUE).'admin/'.$type;
               $this->request->redirect($url);
           break;
        }

}

}