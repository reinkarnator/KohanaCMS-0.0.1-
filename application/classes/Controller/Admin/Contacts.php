<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Contacts extends Controller_Admin_Common {

public function action_index()
{

        $action = HTML::chars($this->request->param('method'));
        $id = HTML::chars($this->request->param('id'));
        $artname = HTML::chars($this->request->param('artname'));
        $type = HTML::chars($this->request->controller());
        $lang_count = $this->lang_path();

        $elems[] = $id;
        $elems[] = $this->request->post('phone');
        $elems[] = $this->request->post('email');
        $elems[] = $this->request->post('mob');
        $elems[] = $this->request->post('map');

        foreach ($lang_count as $langs) {
              ${'address_'.$langs} = $this->request->post('address_'.$langs);

              $dyn_elems[0][] = ${'address_'.$langs};
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
        }
}    

}