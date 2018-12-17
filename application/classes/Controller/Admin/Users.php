<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Users extends Controller_Admin_Common {

public function action_index()
{

        $action = HTML::chars($this->request->param('method'));
        $id = HTML::chars($this->request->param('id'));
        $artname = HTML::chars($this->request->param('artname'));
        $type = HTML::chars($this->request->controller());


        $name = HTML::chars($this->request->post('name'));
        $uname = HTML::chars($this->request->post('username'));
        $photo = HTML::chars($this->request->post('photo'));
        $pass = HTML::chars(Auth::instance()->hash_password($this->request->post('password')));
        $email = HTML::chars($this->request->post('email'));

        switch ($action){
            case 'edit':
                $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                    ->bind('category',$categories)
                    ->bind('type',$type)
                    ->bind('artname',$artname)
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
                    ->bind('action',$action)
                    ->bind('id',$id);
                $categories = Model::factory('Admin_'.$type)->update_element($id,$name,$uname,$pass,$photo,$email);
                $this->template->content = $content;
            break;
        //    case 'remove':
          //      $categories = Model::factory('Admin_'.$type)->remove_element($id);
            //    $url=URL::base(TRUE,TRUE).'admin/'.$type;
              //  $this->request->redirect($url);
               // break;
        }
}    


}