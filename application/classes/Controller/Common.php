<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Common extends Controller_Template {

   public $template;

    public function before()
    {
        //Choose template for mainpage and innerpage
        if (Request::current()->controller() == 'Menu' && Request::current()->action() == 'mainpage'){
            $this->template='main.tpl';
        } else if(Request::current()->controller() == 'Brands' || Request::current()->controller() == 'Products') {
            $this->template='products.tpl';   
        } else if(Request::current()->controller() == 'Partners') {
            $this->template='partners.tpl';    
        } else if(Request::current()->controller() == 'Events') {
            $this->template='events.tpl'; 
        } else if(Request::current()->controller() == 'Catalogues') {
            $this->template='catalogues.tpl';                           
        } else {
            $this->template='inner.tpl'; 
        }             
        //Load before() method from Template class
        parent::before();
        //Request current lang, id, artname 
        $lang = $this->request->param('lang');
        $id = $this->request->param('id');
        $artname = $this->request->param('artname');

        //Check if language empty, assign it to config value 
        if (empty($lang)){
            $site_config = Kohana::$config->load('lang');
            $lang  = $site_config->get('defaultLang');
        }

        $langslist = Kohana::$config->load('lang')->get('langsList');
       //Load language 
       I18n::lang($lang.'-'.$lang);
       $this->lang = $lang;

        $newurl = substr($this->request->uri(), 2);

      /*  // Socials      
        $socials = Model::factory('Socials')->get_all();

        $socialsmodule = View::factory('socials/socials.tpl')
                          ->bind('lang', $lang)   
                          ->bind('last', $socials);    

        $this->template->socialsmodule = $socialsmodule;       

        // Slider
        $slider = Model::factory('Slider')->all_slider($lang);

        $slidermodule = View::factory('slider/slider.tpl')
                          ->bind('slider', $slider)
                          ->bind('lang', $lang);      

        $this->template->slidermodule = $slidermodule;


        // Banner products
        $banner = Model::factory('Banner')->all_slider($lang);

        $bannermodule = View::factory('banner/banner.tpl')
                          ->bind('banner', $banner)
                          ->bind('lang', $lang);      

        $this->template->bannermodule = $bannermodule;  
*/

        //footer form 
        /*$footerform = View::factory('footer/footerform.tpl')
                        ->bind('lang', $lang);*/ 


        $difflang = array_filter($langslist, function($key, $val) {
              return $val;
        }, ARRAY_FILTER_USE_BOTH);

        $langselect = View::factory('header/langsel.tpl')
                        ->bind('language', $lang)    
                        ->bind('difflang', $difflang);     

        $socials = View::factory('header/socials.tpl')  
                        ->bind('socialsmodule', $socialsmodule);                             

        $this->template->langsel = $langselect;               
      //  $this->template->socials = $socials;               

/*
        // Pref product
        $prmain = Model::factory('Products')->get_item_mainpage($lang);

        $prmainmodule = View::factory('products/mainpageproduct.tpl')
                          ->bind('last', $prmain)
                          ->bind('lang', $lang);      

        $this->template->prmainmodule = $prmainmodule;  

        // mainpage product
        $prsecond = Model::factory('Products')->get_item_mainpage_secondary($lang);

        $prsecondmodule = View::factory('products/secondaryproduct.tpl')
                            ->bind('last', $prsecond)
                            ->bind('lang', $lang);      

        $this->template->prsecondmodule = $prsecondmodule;         


        //services
        $services = Model::factory('Services')->get_all($lang);


        $servicesmodule = View::factory('services/services.tpl')
                  ->bind('lang', $lang)    
                  ->bind('last', $services);    

        $this->template->servicesmodule = $servicesmodule;

        //partners
        $partners = Model::factory('Partners')->get_all($lang);


        $partnersmodule = View::factory('partners/partners.tpl')
                  ->bind('lang', $lang)    
                  ->bind('last', $partners);    

        $this->template->partnersmodule = $partnersmodule;


        //Testimonials
        $testimonials = Model::factory('Testimonials')->get_all($lang);


        $testimonialsmodule = View::factory('testimonials/testimonials.tpl')
                                ->bind('lang', $lang)    
                                ->bind('last', $testimonials);    

        $this->template->footerformmodule = $testimonialsmodule;  


        // Catlist and product list      
        $brands = Model::factory('Brands')->get_all($lang);
        $brands_w_parents = Model::factory('Brands')->get_categories_w_parent($lang);
        $cats = Model::factory('Brands')->get_cats($lang);


        $brandsproducts = View::factory('brands/brands_products.tpl')
                            ->bind('lang', $lang)   
                            ->bind('last', $brands_w_parents);    


        $brandsmodule = View::factory('brands/brands.tpl')
                          ->bind('lang', $lang)   
                          ->bind('last', $brands); 


        $this->template->brandsmodule = $brandsmodule;
        $this->template->brandsproducts = $brandsproducts; 

        //List of cats on mainpage
        $catlistmodule = View::factory('products/catlist.tpl')
                          ->bind('last', $cats)
                          ->bind('lang', $lang);  

		

        $this->template->catlistmodule = $catlistmodule;               


        // Menus
        $menus = Model::factory('Menu')->all_menus_top($lang,$id);       

        //Assign data blocks to view. Used for templates.
        $menumodule = View::factory('menu/default.tpl')
                        ->bind('menus', $menus)
                        ->bind('lang', $lang); 


        
        //Contacts     
        $contacts = Model::factory('Contacts')->get_all($lang);
*/
/*        $contactsmodule = View::factory('contacts/contacts.tpl')
                  ->bind('lang', $lang)   
                  ->bind('last', $contacts); */   

        $weather = $this->getWeather();
        $currency = $this->getCurrency();

  	    $weathercurrency = View::factory('module/weathcurr.tpl')
                          ->bind('weathermodule', $weather)
                          ->bind('currencymodule', $currency); 
  				  
  				  
  		  $this->template->weathercurrmodule = $weathercurrency;
/*
        //Contacts data
        $this->template->phone = $contacts['phone'];
        $this->template->address = $contacts['address'];
        $this->template->mobile = $contacts['mob'];

        //Years events
        $years = Model::factory('Events')->get_year();
        
        $yearsmodule = View::factory('events/years.tpl')
                        ->bind('last', $years);

        $this->template->yearsmodule = $yearsmodule; 
  	
        //Years catalogues
        $yearscat = Model::factory('Catalogues')->get_year();
        
        $yearscatalogue = View::factory('events/years.tpl')
                        ->bind('last', $yearscat);

        $this->template->yearscatalogue = $yearscatalogue;		
*/
        //Breadcrumb
        $this->template->breadcrumb = $this->breadcrumb();

        // Check if meta data presents, load it to page.     
        if (class_exists('Model_'.Request::current()->controller()) && method_exists(Model::factory(Request::current()->controller()), "get_heads") && isset($id)) {  
          $getting_descriptions = Model::factory(Request::current()->controller())->get_heads($id,$lang);
          $this->template->getting_descriptions = $getting_descriptions;   
        } 

        // Load template variables to template's files
        $this->template->menumodule = $menumodule;
        $this->template->newurl  = $newurl;
        $this->template->language = $lang;
        $this->template->id = $id;
    }  

    public function breadcrumb(){

        $param[0]['name'] = __('Главная',NULL);
        $param[0]['link'] = URL::base(TRUE);
      if (Request::current()->controller() == 'Menu' && Request::current()->action() != 'mainpage') {
        $menu = Model::factory('Menu')->get_menu($this->request->param('id'),$this->request->param('lang'));
        $param[1]['name'] = $menu['name'];
        $param[1]['link'] = URL::base(TRUE).$this->request->param('lang').'/page/'.$menu['id'].'-'.$menu['alt_title'];
      }
      else if (Request::current()->controller() == 'Presentations' || Request::current()->controller() == 'Partners') {
        $param[1]['name'] = __(Request::current()->controller(),NULL);
        $param[1]['link'] = URL::base(TRUE).$this->request->param('lang').'/'.Request::current()->controller();
      }            
      else if (Request::current()->controller() == 'Brands') {
        $param[1]['name'] = __('Продукты',NULL);  
        $param[1]['link'] = URL::base(TRUE).$this->request->param('lang').'/'.Request::current()->controller();      
      }
      else if (Request::current()->controller() == 'Products') {
        $param[1]['name'] = __('Продукты',NULL); 
        $param[1]['link'] = URL::base(TRUE).$this->request->param('lang').'/Brands'; 
        if ($this->request->param('category')) {
  		    $product = Model::factory('Products')->get_breadcrumb($this->request->param('category'),$this->request->param('lang'));
          $param[2]['name'] = $product['name']; 
          $param[2]['link'] = URL::base(TRUE).$this->request->param('lang').'/products/'.$this->request->param('category'); 
        }
        if ($this->request->param('artname')) {
          $param[3]['name'] = $this->request->param('artname'); 
          $param[3]['link'] = URL::base(TRUE).$this->request->param('lang').'/products/'.$this->request->param('category').'/'.$this->request->param('id').'-'.$this->request->param('artname');          
        }    
      } 
      else {
		    $param[1]['name'] = __(Request::current()->controller(),NULL);
		    $param[1]['link'] = URL::base(TRUE).$this->request->param('lang').'/'.Request::current()->controller();	   
      }     

      $breadcrumb = View::factory('pages/breadcrumb.tpl')   
                  ->bind('news', $param); 

      
      return $breadcrumb;

    }

	  public function getSession() {

       $session = Session::instance();

       return $session;

    }

    public function getWeather() {

      $currdate = date('d-m-Y');

      $session = $this->getSession();

      if ($session->get('getdate') != $currdate) {

        $url = 'http://api.openweathermap.org/data/2.5/group?id=587084,585221,586523,584649,147429&units=metric&appid=5f1dbf2cc54db7f092d081c0f51908f8';

        if ($url) {

            $content = @file_get_contents($url);
            
            if ($content) {
                $json = json_decode($content, true);

                $weath[] = array();

                foreach ($json['list'] as $jk => $jval) {
                    $weath[$jk]['name'] = $jval['name'];
                    $weath[$jk]['wind'] = round($jval['wind']['speed'],1);
                    $weath[$jk]['temp'] = ((int)$jval['main']['temp']>0)?'+'.(int)$jval['main']['temp']:(int)$jval['main']['temp'];
                    $weath[$jk]['icon'] = $jval['weather'][0]['icon'];
                }
            }

        }
        $session->delete('getdate');
        $session->delete('getweather');
        $session->set('getdate', $currdate); 
        $session->set('getweather', $weath); 

      } else {
        $weath = $session->get('getweather');
      }

      if ($weath)
          return $weath;
      else 
          return FALSE;      
    }

    public function getCurrency() {  

         $session = $this->getSession();

         if (!$session->get('getcurrency')) {
           $url = 'http://www.cbar.az/currencies/'.date('d.m.Y').'.xml'; 
           $yesterday = 'http://www.cbar.az/currencies/'.date('d.m.Y', time() - 60 * 60 * 24).'.xml';
           $oil = 'http://www.forexpf.ru/_informer_/comod.php?id=017864523';

           $str_today = @file_get_contents($url);       
           $str_yesterday = @file_get_contents($yesterday);    
           $oil_only = @file_get_contents($oil);

           $oil_n = explode("document.getElementById",$oil_only);

           $oil_curr = filter_var($oil_n[15], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
           $oil_curr = ltrim($oil_curr, '.');        
    
         }  

         if ($str_today == TRUE && $str_yesterday == TRUE) {
               $xml = simplexml_load_string($str_today);
               $xml_yesterday = simplexml_load_string($str_yesterday);
               
               $curr = $xml->ValType[1];
               $curr_yesterday = $xml_yesterday->ValType[1];
			   
     
               $currency = array();

               $currency[0]['today'] = (float)$curr->Valute[44]->Value;
               $currency[1]['today'] = (float)$curr->Valute[4]->Value;
               $currency[2]['today'] = (float)$curr->Valute[38]->Value;
               $currency[3]['today'] = (int)$xml->ValType[0]->Valute[1]->Value;
               $currency[4]['today'] = $oil_curr;

               $currency[0]['yesterday'] = (float)$curr_yesterday->Valute[44]->Value;
               $currency[1]['yesterday'] = (float)$curr_yesterday->Valute[4]->Value;
               $currency[2]['yesterday'] = (float)$curr_yesterday->Valute[38]->Value;
               $currency[3]['yesterday'] = (int)$xml->ValType[0]->Valute[1]->Value;
               $currency[4]['yesterday'] = $oil_curr;

                foreach ($currency as $ck => $cval) {
                     if ($currency[$ck]['yesterday'] > $currency[$ck]['today']) { 
                        $currency[$ck]['icon'] = 'down'; 
                     } else if ($currency[$ck]['yesterday'] < $currency[$ck]['today']) {
                        $currency[$ck]['icon'] = 'up'; 
                     } else if ($currency[$ck]['yesterday'] = $currency[$ck]['today']) {
                        $currency[$ck]['icon'] = 'equil';  
                     } else {
                        $currency[$ck]['icon'] = 'equil'; 
                     }          
                }

                $session->delete('getcurrency');
                $session->set('getcurrency', $currency); 
              
          } else {  
             $currency = $session->get('getcurrency');
          }  

          if($currency)
              return $currency;
          else
              return FALSE;
              
    }  

    public function get_date($dt) {

        $date = new DateTime($dt);
        $dt = $date->format('d F Y');

        $pieces = explode(" ", $dt);

        switch ($pieces[1]) {
          case 'January':
          $mnth = __('Yanvar',null);
          break;
          case 'February':
          $mnth = __('Fevral',null);
          break;
          case 'March':
          $mnth = __('Mart',null);
          break;
          case 'April':
          $mnth = __('Aprel',null);
          break;
          case 'May':
          $mnth = __('May',null);
          break;
          case 'June':
          $mnth = __('İyun',null);
          break;
          case 'July':
          $mnth = __('İyul',null);
          break;
          case 'August':
          $mnth = __('Avgust',null);
          break;
          case 'September':
          $mnth = __('Sentyabr',null);
          break;
          case 'October':
          $mnth = __('Oktyabr',null);
          break;
          case 'November':
          $mnth = __('Noyabr',null);
          break;
          case 'December':
          $mnth = __('Dekabr',null);
          break;
        }

        $vr[] = $pieces[0].' ';
        $vr[] = $mnth.' ';
        $vr[] = $pieces[2];

        return $vr;
    }         

	

} // End Common