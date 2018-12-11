<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Map extends Controller_Admin_Common {

public function action_index()
{

        $action = HTML::chars($this->request->param('method'));
        $id = HTML::chars($this->request->param('id'));
        $artname = HTML::chars($this->request->param('artname'));
        $type = HTML::chars($this->request->controller());
        $lang_count = $this->lang_path();

        $elems[] = $id;
        $elems[] = $this->request->post('coordinates');  
        $elems[] = $this->request->post('logo');  
        $elems[] = (int)$this->request->post('status');  

        foreach ($lang_count as $langs) {

              ${'country_'.$langs} = HTML::chars($this->request->post('country_'.$langs));

              $dyn_elems[0][] = ${'country_'.$langs};
        }        


        switch ($action){
         case 'edit':
         $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                   ->bind('category',$categories)
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

        $elems[] = $this->request->post('coordinates');  
        $elems[] = $this->request->post('logo');  
        $elems[] = (int)$this->request->post('status');  

        foreach ($lang_count as $langs) {

              ${'country_'.$langs} = HTML::chars($this->request->post('country_'.$langs));

              $dyn_elems[0][] = ${'country_'.$langs};
        }  

        switch ($action){
         case 'add':
         $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                    ->bind('type',$type)
                    ->bind('action',$action)
                    ->bind('lang_count',$lang_count)
                    ->bind('lang',$deflang)
                    ->bind('category',$categories);
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