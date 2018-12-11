<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Products extends Controller_Common {

    public function action_get_item()
    {
        $id = $this->request->param('category'); 
        $content = View::factory('pages/'.$this->request->controller().'.tpl')
             ->bind('lang', $this->lang)                   
             ->bind('brands', $brands)
             ->bind('news', $news);

        $news = Model::factory($this->request->controller())->get_item($id,$this->lang);
        $brands = Model::factory($this->request->controller())->get_brand($id,$this->lang);

        $this->template->content = $content;
        $this->template->title = $id;
    }  
    public function action_get_item_detailed()
    {
        $id = $this->request->param('id');
        $bran = $this->request->param('category'); 
        $content = View::factory('pages/'.$this->request->controller().'_detailed.tpl')
             ->bind('lang', $this->lang)                   
             ->bind('brands', $brands)
             ->bind('other', $other)
             ->bind('news', $news);

        $news = Model::factory($this->request->controller())->get_item_detailed($id,$this->lang);
        $brands = Model::factory($this->request->controller())->get_brand($bran,$this->lang);
        $other = Model::factory($this->request->controller())->get_item_other($id,$this->lang);

        if (empty($news['name'])) {
          //$name = Model::factory($this->request->controller())->childProducts($news[0]['alt_title'],$this->lang);
          $this->template->title = $news[0]['bname'];
        } else {
          $this->template->title = $news['name'];        
        }

        $this->template->content = $content;        
    }     

    public function action_get_all()
    {
        $content = View::factory('pages/all_'.$this->request->controller().'.tpl')
             ->bind('lang', $this->lang)
             ->bind('news', $news);
          
        $news = Model::factory($this->request->controller())->get_all($this->lang);

        $this->template->content = $content;
        $this->template->title = __("Products",null);
    }
} // End Page
