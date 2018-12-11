<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Mail extends Controller_Common {

    public function action_get_all()
    {
     $lang = HTML::chars($this->request->param('lang'));

     $test="reinkarnator@list.ru"; 
     $mail="tehrane.h@soliton.az"; // e-mail куда уйдет письмо            
     $mail2="nigar.b@soliton.az"; // e-mail куда уйдет письмо            
     $mail3="info@solitonmebel.az"; // e-mail куда уйдет письмо            
     $mail4="rashad.h@soliton.az"; // e-mail куда уйдет письмо            
     $mail5="emil.a@soliton.az"; // e-mail куда уйдет письмо            

      if($this->request->post('actions')) { 
        if($this->request->post('email')) { 
            $title="CARİ AKSİYALAR VƏ YENİLİKLƏR ÜÇÜN"; 

            $message = 'E-mail: '.HTML::chars($this->request->post('email'));

             $email = Email::factory($title, $message)
            ->to($mail5)
            ->to($mail2)
            ->to($mail3)
            ->to($mail4)
            ->to($mail)
            //->to($test)
            ->from('reinkarnator@list.ru')
            ->send(); 
        }   
      }   
      if($this->request->post('smsform')) { 
        if($this->request->post('sms')) { 
            $title="SMS XƏBƏRDARLIQ ÜÇÜN"; 

            $message = 'E-mail: '.HTML::chars($this->request->post('sms'));

             $email = Email::factory($title, $message)
            ->to($mail5)
            ->to($mail2)
            ->to($mail3)
            ->to($mail4)
            ->to($mail)
            ->from('reinkarnator@list.ru')
            ->send(); 
        }   
      }       


    }
} // End Page
