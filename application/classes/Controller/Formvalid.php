<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Formvalid extends Controller_Common {

    public function action_get_all()
    {  
    //Getting mail configuration's username and sendto parameters
    $mail = Kohana::$config->load('email')->get('options')['username'];
    $to = Kohana::$config->load('email')->get('sendto');       

   //if ($this->request->post('send')) { 
    if($this->request->post('name') && $this->request->post('email')) { 
        $title="Quickform"; 

        $message = '
        Имя: '.HTML::chars($this->request->post('name')).'
        Email: '.HTML::chars($this->request->post('email')).'
        Сообщение: '.HTML::chars($this->request->post('message'));

        //Adding parameters to Swiftmailer email factory
        Email::factory($title, $message)
            ->to($to)
            ->from($mail)
            ->send(); 

       // $this->request->redirect(URL::base(true).$this->request->uri());
    }  
   //} 


    }
} // End Page
