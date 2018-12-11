<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Socials extends Controller_Admin_Common {

public function action_index()
{

        $action = HTML::chars($this->request->param('method'));
        $id = HTML::chars($this->request->param('id'));
        $artname = HTML::chars($this->request->param('artname'));
        $type = HTML::chars($this->request->controller());

        $elems[] = $id;
        $elems[] = HTML::chars($this->request->post('name'));
        $elems[] = HTML::chars($this->request->post('url'));
        $elems[] = (int)$this->request->post('status');  
     


        switch ($action){
         case 'edit':
         $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                   ->bind('category',$categories)
                   ->bind('type',$type)
                   ->bind('action',$action)
                   ->bind('artname',$artname)
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
                   ->bind('id',$id);

         $categories = Model::factory('Admin_'.$type)->update_element($elems);
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

        $elems[] = HTML::chars($this->request->post('name'));
        $elems[] = HTML::chars($this->request->post('url'));
        $elems[] = (int)$this->request->post('status');  


         switch ($action){
         case 'add':
         $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                    ->bind('type',$type)
                    ->bind('action',$action)
                    ->bind('category',$categories);

         $categories = Model::factory('Admin_'.$type)->add_element();
         $this->template->content = $content;
         break;
         case 'save':
         $categories = Model::factory('Admin_'.$type)->save_element($elems);
         $url_redirect=URL::base(TRUE,TRUE).'admin/'.$type;
         $this->request->redirect($url_redirect);
         break;
        }
}

}