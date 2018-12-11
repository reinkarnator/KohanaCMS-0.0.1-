<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Slider extends Controller_Admin_Common {

public function action_index()
{

        $action = HTML::chars($this->request->param('method'));
        $id = HTML::chars($this->request->param('id'));
        $artname = HTML::chars($this->request->param('artname'));
        $type = HTML::chars($this->request->controller());
        $lang_count = $this->lang_path();

        $elems[] = $id;

        foreach ($lang_count as $langs) {
              ${'title_categories_'.$langs} = HTML::chars($this->request->post('title_'.$langs));
              ${'description_full_'.$langs} = $this->request->post('full_'.$langs);
              ${'url_'.$langs} = $this->request->post('url_'.$langs);
              ${'smalltext_'.$langs} = $this->request->post('smalltext_'.$langs);
              
              $dyn_elems[0][] = ${'title_categories_'.$langs};
              $dyn_elems[1][] = ${'description_full_'.$langs};
              $dyn_elems[2][] = ${'url_'.$langs};
              $dyn_elems[3][] = ${'smalltext_'.$langs};
        }             
        
        $elems[] = $this->request->post('photo');
        $elems[] = (int)$this->request->post('status');


        switch ($action){
         case 'edit':
         $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                   ->bind('type',$type)
                   ->bind('artname',$artname)
                   ->bind('lang_count',$lang_count)
                   ->bind('action',$action)
                   ->bind('category',$categories)
                   ->bind('id',$id);
          $categories = Model::factory('Admin_'.$type)->get_element($id);
          $this->template->content = $content;
         break;
         case 'update':
         $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                   ->bind('type',$type)
                   ->bind('artname',$artname)
                   ->bind('lang_count',$lang_count)
                   ->bind('action',$action)
                   ->bind('category',$categories)
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

        foreach ($lang_count as $langs) {
              ${'title_categories_'.$langs} = HTML::chars($this->request->post('title_'.$langs));
              ${'description_full_'.$langs} = $this->request->post('full_'.$langs);
              ${'url_'.$langs} = $this->request->post('url_'.$langs);
              ${'smalltext_'.$langs} = $this->request->post('smalltext_'.$langs);
              
              $dyn_elems[0][] = ${'title_categories_'.$langs};
              $dyn_elems[1][] = ${'description_full_'.$langs};
              $dyn_elems[2][] = ${'url_'.$langs};
              $dyn_elems[3][] = ${'smalltext_'.$langs};
        }          
        
        $elems[] = $this->request->post('photo');
        $elems[] = (int)$this->request->post('status');

        switch ($action){
         case 'add':
         $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                    ->bind('type',$type)
                    ->bind('action',$action)
                    ->bind('lang_count',$lang_count)
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