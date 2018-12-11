<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Materials extends Controller_Admin_Common {

public function action_index()
{

        $action = HTML::chars($this->request->param('method'));
        $id = HTML::chars($this->request->param('id'));
        $artname = HTML::chars($this->request->param('artname'));
        $type = HTML::chars($this->request->controller());
        $lang_count = $this->lang_path();
        $user = $this->user;
        $deflang  = Kohana::$config->load('lang')->get('adminLang');
        $library = Model::factory('Admin_Library')->get_all();


        $elems[] = $id;
        $elems[] = (int)$this->request->post('menu_id');
        $elems[] = (int)$this->request->post('status');
        $elems[] = $this->request->post('gallery');             
        $elems[] = $this->request->post('head_addon_presentations');
        $elems[] = $this->request->post('img_addon_presentations');
        $elems[] = $this->request->post('head_addon_catalogue');
        $elems[] = $this->request->post('img_addon_catalogue');
        $elems[] = $this->request->post('head_addon_video');
        $elems[] = $this->request->post('img_addon_video');        



        foreach ($lang_count as $langs) {
              ${'title_categories_'.$langs} = HTML::chars($this->request->post('title_'.$langs));
              ${'description_categories_'.$langs} = $this->request->post('text_'.$langs);
              ${'pg_description_'.$langs} = HTML::chars($this->request->post('pg_description_'.$langs));
              ${'pg_keywords_'.$langs} = HTML::chars($this->request->post('pg_keywords_'.$langs));

              $dyn_elems[0][] = ${'title_categories_'.$langs};
              $dyn_elems[1][] = ${'description_categories_'.$langs}; 
              $dyn_elems[2][] = ${'pg_description_'.$langs}; 
              $dyn_elems[3][] = ${'pg_keywords_'.$langs}; 
        }




        switch ($action){
         case 'edit':
         $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                   ->bind('category',$categories)
                   ->bind('library',$library)
                   ->bind('type',$type)
                   ->bind('artname',$artname)
                   ->bind('lang_count',$lang_count)
                   ->bind('lang',$deflang)
                   ->bind('action',$action)
                   ->bind('id',$id);
          $categories = Model::factory('Admin_'.$type)->get_element($id);
          $this->template->content = $content;
         break;
         case 'update':
         $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                   ->bind('category',$categories)
                   ->bind('library',$library)
                   ->bind('type',$type)
                   ->bind('artname',$artname)
                   ->bind('lang_count',$lang_count)
                   ->bind('lang',$deflang)
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
        $deflang  = Kohana::$config->load('lang')->get('adminLang');
        $library = Model::factory('Admin_Library')->get_all();

        foreach ($lang_count as $langs) {
              ${'title_categories_'.$langs} = HTML::chars($this->request->post('title_'.$langs));
              ${'description_categories_'.$langs} = $this->request->post('text_'.$langs);
              ${'pg_description_'.$langs} = HTML::chars($this->request->post('pg_description_'.$langs));
              ${'pg_keywords_'.$langs} = HTML::chars($this->request->post('pg_keywords_'.$langs));

              $dyn_elems[0][] = ${'title_categories_'.$langs};
              $dyn_elems[1][] = ${'description_categories_'.$langs}; 
              $dyn_elems[2][] = ${'pg_description_'.$langs}; 
              $dyn_elems[3][] = ${'pg_keywords_'.$langs}; 
        }


        $elems[] = (int)$this->request->post('menu_id');
        $elems[] = (int)$this->request->post('status');
        $elems[] = $this->request->post('gallery');     
        $elems[] = $this->request->post('head_addon_presentations');
        $elems[] = $this->request->post('img_addon_presentations');
        $elems[] = $this->request->post('head_addon_catalogue');
        $elems[] = $this->request->post('img_addon_catalogue');
        $elems[] = $this->request->post('head_addon_video');
        $elems[] = $this->request->post('img_addon_video');        

        switch ($action){
         case 'add':
         $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                    ->bind('type',$type)
                    ->bind('library',$library)
                    ->bind('action',$action)
                    ->bind('lang_count',$lang_count)
                    ->bind('lang',$deflang)
                    ->bind('category',$categories);
         $categories = Model::factory('Admin_'.$type)->add_element();
         $this->template->content = $content;
         break;
         case 'save':
         $categories = Model::factory('Admin_'.$type)->save_element($lang_count,$dyn_elems,$elems);
         $url=URL::base(TRUE,TRUE).'admin/'.$type;
         $this->request->redirect($url);
         break;
         }

}

}