<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Admin_Common extends Controller_Template {

    public $template;
    public $sessionId;
    protected $auth;
    protected $user;

    public function lang_path() {
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


    public function before()
    {  
      
      if (Request::current()->action() == 'login'){
            $this->template='admin/login';
      } else {
            $this->template='admin/main';  
      }        
    
      parent::before(); 

      $site_config = Kohana::$config->load('lang');
      $lang  = $site_config->get('adminLang');
      I18n::lang($lang.'-'.$lang);

      $this->auth = Auth::instance();
	    $this->user = $this->auth->get_user();

      if ($this->auth->logged_in()) { 
            //Session for editor
            Session::instance()->set('KCFINDER', array('disabled'=>false));          
                  
            $query=$this->user;
            $account=$query->as_array();
            $content = View::factory('admin/admin')
                       ->bind("account",$account)
                       ->bind("menus",$menus);
            $this->template->content = $content;
      }

      elseif ($_POST){
          $post = Arr::extract($_POST, array('username','password'));
               if($this->auth->login($post['username'], $post['password'], FALSE))
               {
                     $this->request->redirect(URL::base(TRUE,TRUE).'admin');     
               }else{
                     $this->request->redirect(URL::base(TRUE,TRUE).'admin/login');                            
               }
      } else {
          if(Request::current()->action() != 'login')
                $this->request->redirect(URL::base(TRUE,TRUE).'admin/login');
      }

      $menus = array(__("Главная",null)=>'',
                      __("Материалы",null)=>'Materials',
                      __("Меню",null)=>'Menus',
                      __("Услуги",null)=>'Services',
                      __("События",null)=>'Events',
                      __("Категории",null)=>'Brands',
                      __("Продукты",null)=>'Products',
                      __("Партнеры",null)=>'Partners',
                      __("Отзывы",null)=>'Testimonials',
                      __("Каталоги",null)=>'Catalogues',
                      __("Соцсети",null)=>'Socials',
                      __("Слайдер",null)=>'Slider',
                      __("Баннеры",null)=>'Banner',
                      __("Переводы",null)=>'Translates/edit',
                      __("Контакты",null)=>'Contacts/1-m/edit',
                      __("Пользователи",null)=>'Users');

      $this->template->menus = $menus;

    }

    

} // End Common