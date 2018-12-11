<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Contacts extends Controller_Common {
  
    public function action_get_all()
    {
        $content = View::factory('pages/all_'.$this->request->controller().'.tpl')
            ->bind('lang', $this->lang)
            ->bind('breadcrumb', $breadcrumb)
            ->bind('news', $news);
          
        $news = Model::factory($this->request->controller())->get_all($this->lang);
        $breadcrumb = $this->breadcrumb();

        $this->template->content = $content;
        $this->template->title = __("Contacts",null);
    }
} // End Page
