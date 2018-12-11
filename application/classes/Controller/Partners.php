<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Partners extends Controller_Common {

    public function action_get_item()
    {
        $id = (int)$this->request->param('id');    

        $content = View::factory('pages/'.$this->request->controller().'.tpl')
             ->bind('lang', $this->lang)                   
             ->bind('news', $news);

        $news = Model::factory($this->request->controller())->get_item($id,$this->lang);

        $this->template->content = $content;
        $this->template->title = $news['title'];
    }    

    public function action_get_all()
    {
        $content = View::factory('pages/all_'.$this->request->controller().'.tpl')
            ->bind('lang', $this->lang)
            ->bind('news', $news);
          
        $news = Model::factory($this->request->controller())->get_all($this->lang);

        $this->template->content = $content;
        $this->template->title = __("Partners",null);
    }
} // End Page
