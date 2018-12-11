<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Contacts extends Controller_Common {

    public function action_get_all()
    {
    
    $contacts = Model::factory('Contacts')->get_all($this->request->param('lang'));    

    $mail = $contacts['email'];

    // $mail="kamal.abdulrahimov@irrigation.az";        

     //if ($this->request->post('send')) { 
      //print_r($this->request->post('send'));
      if($this->request->post('name') && $this->request->post('surname') && $this->request->post('email')) { 
          $title="Smartagro quickform"; 

          $message = '
          Имя: '.HTML::chars($this->request->post('name')).'
          Фамилия: '.HTML::chars($this->request->post('surname')).'
          Email: '.HTML::chars($this->request->post('email')).'
          Телефон: '.HTML::chars($this->request->post('phone'));

           $email = Email::factory($title, $message)
          ->to($mail)
          ->from('no-reply@smartagro.az')
          ->send(); 

          $this->request->redirect(URL::base(true).$this->request->uri());
      } 
      if($this->request->post('firstname') && $this->request->post('email')) {  
          $title="Smartagro contact form"; 

          $message = '
          Ф.И.О: '.HTML::chars($this->request->post('firstname')).'
          Email: '.HTML::chars($this->request->post('email')).'
          Телефон: '.HTML::chars($this->request->post('phone')).'
          Компания: '.HTML::chars($this->request->post('company')).'
          Коммент: '.HTML::chars($this->request->post('comment'));

           $email = Email::factory($title, $message)
          ->to($mail)
          ->from('no-reply@smartagro.az')
          ->send(); 

          $this->request->redirect(URL::base(true).$this->request->uri());
      }  
     //} 


    }
} // End Page
