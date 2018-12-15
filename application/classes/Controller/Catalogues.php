<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Catalogues extends Controller_Common {    

    public function action_get_all()
    {
        
        $content = View::factory('pages/all_'.$this->request->controller().'.tpl')
                    ->bind('lang', $this->lang)
                    ->bind('news', $news);

        $news = Model::factory($this->request->controller())->get_all($this->lang);  


        foreach ($news as $key => $res) {
            if ($res['gallery']){
                $res['gallery'] = substr($res['gallery'], 1);
                if(!file_exists(realpath($res['gallery']).'.jpg')) {
                    exec('convert -density 300 -background white -resize x350 '.realpath($res['gallery']).'[0]  '.realpath($res['gallery']).'.jpg');
                }
            }
        }
        

        $this->template->content = $content;
        $this->template->title = __("Каталоги",null);
    }
} // End Page
    


