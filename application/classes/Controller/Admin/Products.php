<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Products extends Controller_Admin_Common {

public function action_index()
{

        $action = HTML::chars($this->request->param('method'));
        $id = HTML::chars($this->request->param('id'));
        $artname = HTML::chars($this->request->param('artname'));
        $type = HTML::chars($this->request->controller());
        $lang_count = $this->lang_path();
        $site_config = Kohana::$config->load('lang');
        $deflang  = $site_config->get('adminLang');
        $brands = Model::factory('Brands')->get_all($deflang);
        $parents = Model::factory('Admin_'.$type)->get_parents();

        $elems[] = $id;
        $elems[] = HTML::chars($this->request->post('brand'));
        $elems[] = $this->request->post('photo');
        $elems[] = $this->request->post('photo_position');
        $elems[] = $this->request->post('mainpage');      
        $elems[] = (int)$this->request->post('status'); 


        foreach ($lang_count as $langs) {

              ${'name_'.$langs} = HTML::chars($this->request->post('name_'.$langs));
              ${'text_'.$langs} = $this->request->post('text_'.$langs);

              $dyn_elems[0][] = ${'name_'.$langs};
              $dyn_elems[1][] = ${'text_'.$langs};

        }        

        switch ($action){
         case 'edit':
           $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                     ->bind('category',$categories)
                     ->bind('brands',$brands)
                     ->bind('parents',$parents)
                     ->bind('type',$type)
                     ->bind('action',$action)
                     ->bind('artname',$artname)
                     ->bind('lang_count',$lang_count)
                     ->bind('lang',$deflang)
                     ->bind('id',$id);
            
            $categories = Model::factory('Admin_'.$type)->get_element($id);
            $this->template->content = $content;
         break;
         case 'update':
           $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                     ->bind('category',$categories)
                     ->bind('brands',$brands)
                     ->bind('parents',$parents)
                     ->bind('type',$type)
                     ->bind('action',$action)
                     ->bind('artname',$artname)
                     ->bind('lang_count',$lang_count)
                     ->bind('lang',$deflang)                   
                     ->bind('id',$id);

           $categories = Model::factory('Admin_'.$type)->update_element($lang_count,$elems,$dyn_elems);
           $this->template->content = $content;
         break;
         case 'remove':
           $categories = Model::factory('Admin_'.$type)->remove_element($id);
           $url_redirect=URL::base(TRUE,TRUE).'admin/'.$type;
           $this->request->redirect($url_redirect);
         break;
         }
}    

public function action_addremove()
{    

        $action = HTML::chars($this->request->param('method'));
        $id = HTML::chars($this->request->param('id'));
        $type = HTML::chars($this->request->controller());
        $lang_count = $this->lang_path();
        $site_config = Kohana::$config->load('lang');
        $deflang  = $site_config->get('adminLang'); 
        $brands = Model::factory('Brands')->get_all($deflang);
        $parents = Model::factory('Admin_'.$type)->get_parents();    

        $elems[] = HTML::chars($this->request->post('brand'));
        $elems[] = $this->request->post('photo');
        $elems[] = $this->request->post('photo_position');
        $elems[] = $this->request->post('mainpage');       
        $elems[] = (int)$this->request->post('status');  

        foreach ($lang_count as $langs) {
              ${'name_'.$langs} = HTML::chars($this->request->post('name_'.$langs));
              ${'text_'.$langs} = $this->request->post('text_'.$langs);

              $dyn_elems[0][] = ${'name_'.$langs};
              $dyn_elems[1][] = ${'text_'.$langs};
        } 

        switch ($action){
         case 'add':
           $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                      ->bind('type',$type)
                      ->bind('action',$action)
                      ->bind('parents',$parents)                 
                      ->bind('lang_count',$lang_count)
                      ->bind('lang',$deflang)
                      ->bind('category',$categories)
                      ->bind('brands',$brands);
           $categories = Model::factory('Admin_'.$type)->add_element();
           $this->template->content = $content;
         break;
         case 'save':
           $categories = Model::factory('Admin_'.$type)->save_element($lang_count,$elems,$dyn_elems);
           $url_redirect=URL::base(TRUE,TRUE).'admin/'.$type;
           $this->request->redirect($url_redirect);
         break;
        }
}

}