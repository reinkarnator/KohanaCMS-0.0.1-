<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Menu extends Controller_Common {

    public function action_mainpage()
    {
        $lang = HTML::chars($this->request->param('lang'));

         if (empty($lang)){
          $site_config = Kohana::$config->load('lang');
          $lang  = $site_config->get('defaultLang');
         }
         I18n::lang($lang.'-'.$lang);

        $content = View::factory('pages/Material.tpl')
            ->bind('material', $material)
            ->bind('lang', $lang);

        $material = Model::factory('Material')->get_mainpage($lang);


        $this->template->content = $content;
        $this->template->title = $material['title'];
    }

    public function action_material()
    {
        $id = HTML::chars($this->request->param('id'));
        $lang = HTML::chars($this->request->param('lang'));

        if (empty($lang)){
          $site_config = Kohana::$config->load('lang');
          $lang  = $site_config->get('defaultLang');
        }
        I18n::lang($lang.'-'.$lang);

        $breadcrumb = $this->breadcrumb();     

        $content = View::factory('pages/Material.tpl')
            ->bind('material', $material)
          //  ->bind('map', $map)
            ->bind('event', $event)
            ->bind('breadcrumb', $breadcrumb)
            ->bind('id', $id)
            ->bind('lang', $lang);

        $material = Model::factory('Material')->get_material($id,$lang);

      /*  $map = View::factory('material/Map.tpl')
            ->bind('last', $mapbase)
            ->bind('lang', $lang); 

        $mapbase = Model::factory('Material')->get_map($lang);
        */

        $event = View::factory('material/Events.tpl')
            ->bind('last', $eventbase)
            ->bind('lang', $lang);

        $eventbase = Model::factory('Events')->get_latest($lang);

       // $events_cont = $this->request->controller('Events');

        foreach($eventbase as $key => $value) {
            $eventbase[$key]['year'] = $this->get_date($eventbase[$key]['year']);
        }                


        $this->template->content = $content;
        $this->template->title = $material['title'];
        $this->template->full = $material['full'];


    }
} // End Page
