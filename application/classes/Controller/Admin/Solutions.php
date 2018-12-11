<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Solutions extends Controller_Admin_Common {

public function action_index()
{

        $action = HTML::chars($this->request->param('method'));
        $id = HTML::chars($this->request->param('id'));
        $artname = HTML::chars($this->request->param('artname'));
        $type = HTML::chars($this->request->controller());
        $lang_count = $this->lang_path();
       $site_config = Kohana::$config->load('lang');
       $deflang  = $site_config->get('adminLang');  
       $library = Model::factory('Admin_Library')->get_all();      

        $elems[] = $id;
        $elems[] =  HTML::chars($this->request->post('alt_title'));
        $elems[] = $this->request->post('photo');
        $elems[] =  HTML::chars($this->request->post('position'));        
        $elems[] = (int)$this->request->post('status');
        $elems[] = $this->request->post('head_addon_presentations');
        $elems[] = $this->request->post('img_addon_presentations');
        $elems[] = $this->request->post('head_addon_catalogue');
        $elems[] = $this->request->post('img_addon_catalogue');
        $elems[] = $this->request->post('head_addon_video');
        $elems[] = $this->request->post('img_addon_video'); 
        $elems[] =  HTML::chars($this->request->post('parent'));       

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
                   ->bind('library',$library)
                   ->bind('parents',$parents)
                   ->bind('type',$type)
                   ->bind('action',$action)
                   ->bind('artname',$artname)
                   ->bind('lang_count',$lang_count)
                   ->bind('lang',$deflang)
                   ->bind('id',$id);
          $categories = Model::factory('Admin_'.$type)->get_element($id);
          $parents = Model::factory($type)->get_all($deflang);
          $this->template->content = $content;
         break;
         case 'update':
         $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                   ->bind('category',$categories)
                   ->bind('library',$library)
                   ->bind('parents',$parents)
                   ->bind('type',$type)
                   ->bind('action',$action)
                   ->bind('artname',$artname)
                   ->bind('lang_count',$lang_count)
                   ->bind('lang',$deflang)                   
                   ->bind('id',$id);
         $categories = Model::factory('Admin_'.$type)->update_element($lang_count,$elems,$dyn_elems);
         $parents = Model::factory($type)->get_all($deflang);
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
        $library = Model::factory('Admin_Library')->get_all();


        $elems[] =  HTML::chars($this->request->post('alt_title'));
        $elems[] = $this->request->post('photo');
        $elems[] =  HTML::chars($this->request->post('position'));        
        $elems[] = (int)$this->request->post('status');
        $elems[] = $this->request->post('head_addon_presentations');
        $elems[] = $this->request->post('img_addon_presentations');
        $elems[] = $this->request->post('head_addon_catalogue');
        $elems[] = $this->request->post('img_addon_catalogue');
        $elems[] = $this->request->post('head_addon_video');
        $elems[] = $this->request->post('img_addon_video');  
        $elems[] =  HTML::chars($this->request->post('parent'));      

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
                    ->bind('library',$library)
                    ->bind('action',$action)
                    ->bind('lang_count',$lang_count)
                    ->bind('lang',$deflang)
                    ->bind('category',$categories)
                    ->bind('parents',$parents);
         $categories = Model::factory('Admin_'.$type)->add_element();
         $parents = Model::factory($type)->get_all($deflang);
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