<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Formvalid extends Controller_Common {

    public function action_get_all()
    {  

    $mail = 'web.of.azerbaijan@gmail.com';
    // $mail="kamal.abdulrahimov@irrigation.az";        

     //if ($this->request->post('send')) { 
      //print_r($this->request->post('send'));
      if($this->request->post('name') && $this->request->post('email')) { 
          $title="Odontos quickform"; 

          $message = '
          Имя: '.HTML::chars($this->request->post('name')).'
          Email: '.HTML::chars($this->request->post('email')).'
          Сообщение: '.HTML::chars($this->request->post('message'));

           $email = Email::factory($title, $message)
          ->to($mail)
          ->from('web.of.azerbaijan@gmail.com')
          ->send(); 

         // $this->request->redirect(URL::base(true).$this->request->uri());
      }  
     //} 


    }
} // End Page
