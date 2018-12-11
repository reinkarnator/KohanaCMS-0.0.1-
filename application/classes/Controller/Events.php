<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Events extends Controller_Common {

    public function action_get_item()
    {
        $id = (int)$this->request->param('id');    

        $content = View::factory('pages/'.$this->request->controller().'.tpl')
             ->bind('lang', $this->lang)                                    
             ->bind('news', $news);

        $news = Model::factory($this->request->controller())->get_item($id,$this->lang);
		
		if (is_array($news['photos'])) {
			foreach ($news['photos'] as $key => $photo) {
				$filename = ltrim($photo,'/');
				if (is_file($filename)) {
					$thumbnail_filename = pathinfo($filename, PATHINFO_DIRNAME).'/thumbnail_'.pathinfo($filename, PATHINFO_BASENAME);
					$news['thumbs'][] = '/'.$thumbnail_filename;
					if(!is_file($thumbnail_filename)){					
						Image::factory($filename)
							->resize(200, 200, Image::AUTO)
							->save($thumbnail_filename, 80); 
					}	
				}
			}
		}
		
		$news['year'] = $this->get_date($news['year']);

        $this->template->content = $content;
        $this->template->title = $news['name'];
    }      

    public function action_get_all()
    {
        
        $content = View::factory('pages/all_'.$this->request->controller().'.tpl')
                    ->bind('lang', $this->lang)
                    ->bind('news', $news);

        $news = Model::factory($this->request->controller())->get_all($this->lang);   

		foreach($news as $key => $value) {
			$news[$key]['year'] = $this->get_date($news[$key]['year']);

			if (is_array($news[$key]['photos'])) {
				//foreach ($news['photos'] as $key => $photo) {
					$filename = ltrim($news[$key]['photos'][0],'/');
					if (is_file($filename)) {
						$thumbnail_filename = pathinfo($filename, PATHINFO_DIRNAME).'/thumbnail_'.pathinfo($filename, PATHINFO_BASENAME);
						$news[$key]['thumbs'] = '/'.$thumbnail_filename;
						if(!is_file($thumbnail_filename)){					
							Image::factory($filename)
								->resize(400, 400, Image::AUTO)
								->save($thumbnail_filename, 80); 
						}	
					}
				//}
			}			
		}
        

        $this->template->content = $content;
        $this->template->title = __("Фотогалерея",null);
    }
	
} // End Page
