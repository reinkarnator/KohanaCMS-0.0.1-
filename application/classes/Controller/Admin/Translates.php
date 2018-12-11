<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Translates extends Controller_Admin_Common {

public function lang_url() {
     if (is_dir(APPPATH.'i18n')) {
        if ($handle = opendir(APPPATH.'i18n')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $langs_count[] = $entry;
                    sort($langs_count); 
                 }
            }
        return $langs_count;    

        closedir($handle);
        }     
      } 
}

public function action_addremove()
{

        $action = HTML::chars($this->request->param('method'));
        $type = HTML::chars($this->request->controller());
        $lang_count = $this->lang_path();

      ///  $elems[] = $this->request->post('review');

        switch ($action){
         case 'edit':

         foreach ($lang_count as $key => $entry) {
             $fh = APPPATH.'i18n/'.$entry.'/'.$entry.'.php';
             $lang_files = file_get_contents($fh);
             $regex = "~'[^']*'(*SKIP)(*F)|\s+~";
             $replaced = preg_replace($regex,"",$lang_files);
             $replaced = str_replace(array("<?phpdefined('SYSPATH')ordie('No direct script access.');returnarray(", ");"), '', $replaced);
             $replaced = str_replace("','","',\r\n'",$replaced);
             $ars[] = $replaced;
         }

         $content = View::factory('admin/'.$type.'/'.$type)
                   ->bind('type',$type)
                   ->bind('action',$action)
                   ->bind('lang_count',$lang_count)
                   ->bind('ars',$ars);
          $this->template->content = $content;
         break;
         case 'update':
         foreach ($lang_count as $key => $entry) { 
             $key++;
             $fh = APPPATH.'i18n/'.$entry.'/'.$entry.'.php'; 
             file_put_contents($fh,"<?php defined('SYSPATH') or die('No direct script access.'); return array(".$this->request->post('translate_'.$key).");");   
             $lang_files = file_get_contents($fh);
             $regex = "~'[^']*'(*SKIP)(*F)|\s+~";
             $replaced = preg_replace($regex,"",$lang_files);
             $replaced = str_replace(array("<?phpdefined('SYSPATH')ordie('No direct script access.');returnarray(", ");"), '', $replaced);
             $replaced = str_replace("','","',\r\n'",$replaced);
             $ars[] = $replaced;  
         }
         $content = View::factory('admin/'.$type.'/'.$type)
                   ->bind('type',$type)
                   ->bind('action',$action)
                   ->bind('lang_count',$lang_count)
                   ->bind('ars',$ars);
         $this->template->content = $content;
         break;
         case 'remove':
         $url=URL::base(TRUE,TRUE).'admin/'.$type;
         $this->request->redirect($url);
         break;
         }
}    
/*
public function action_addremove()
{    

        $action = HTML::chars($this->request->param('method'));
        $id = HTML::chars($this->request->param('id'));
        $type = HTML::chars($this->request->controller());
        $lang_count = $this->lang_path();


        $elems[] = HTML::chars($this->request->post('name'));
        $elems[] = $this->request->post('review');

        switch ($action){
         case 'add':
         $content = View::factory('admin/'.$type.'/'.$type.'_edit')
                    ->bind('type',$type)
                    ->bind('action',$action)
                    ->bind('lang_count',$lang_count)
                   // ->bind('category',$categories);
         //$categories = Model::factory('Admin_'.$type)->add_element();
         $this->template->content = $content;
         break;
         case 'save':
         //$categories = Model::factory('Admin_'.$type)->save_element($lang_count,$elems);
         $url=URL::base(TRUE,TRUE).'admin/'.$type;
         $this->request->redirect($url);
         break;
         }
}
*/

}