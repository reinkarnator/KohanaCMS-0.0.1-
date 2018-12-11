<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Search extends Controller_Common {

    public function action_get_item()
    {

        //$artname = HTML::chars($this->request->post('srch_val'));
        $lang = HTML::chars($this->request->param('lang'));

      if (empty($lang)){
        $site_config = Kohana::$config->load('lang');
        $lang  = $site_config->get('defaultLang');
      }
      I18n::lang($lang.'-'.$lang);

        $content = View::factory('pages/Search.tpl')
            ->bind('news', $news)
            ->bind('lang', $lang);

        $news = Model::factory('Search')->get_item($lang);


        $this->template->content = $content;
        $this->template->title = __("Результаты поиска", NULL);
    }

} // End Page
