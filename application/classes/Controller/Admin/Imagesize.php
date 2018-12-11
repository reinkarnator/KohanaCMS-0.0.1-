<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Imagesize extends Controller_Admin_Common {

public function action_addremove()
{

        $action = HTML::chars($this->request->param('method'));
        $cropped = $this->request->post('photo');
        $off_width = $this->request->post('off_width');
        $off_height = $this->request->post('off_height');
        $off_top = $this->request->post('off_top');
        $off_left = $this->request->post('off_left');

        $cropped = substr($cropped, 1);
       // $cropped = $this->request->post('cropped');

        //$image = Image::factory($cropped, 'GD');
        // Путь до оригинального файла
        //$filename = '/Users/delphist/Pictures/picture.jpg';
        // Имя превью-изображения
        //$thumbnail_filename = pathinfo('/html/upload/images/01.png', PATHINFO_DIRNAME).'/'.pathinfo('/html/upload/images/01.png', PATHINFO_BASENAME);
        // Пересжимаем и сохраняем изображение
        //Image::factory($thumbnail_filename)
         // ->resize(200, 200, 0, 0)
        //  ->save($thumbnail_filename, 100);
        $filename = $cropped;
        // Имя превью-изображения
        switch ($action){
         case 'edit':
        $thumbnail_filename = pathinfo($filename, PATHINFO_DIRNAME).'/0_cutted_'.date('s').pathinfo($filename, PATHINFO_BASENAME);
        // Пересжимаем и сохраняем изображение
        Image::factory($filename)
            ->crop($off_width, $off_height, $off_left, $off_top)
            ->save($thumbnail_filename, 80);  
        break;
        case 'update':
        $thumbnail_filename = pathinfo($filename, PATHINFO_DIRNAME).'/0_resized_'.date('s').pathinfo($filename, PATHINFO_BASENAME);
        Image::factory($filename)
            ->resize($off_width, $off_height, Image::NONE)
            ->save($thumbnail_filename, 80);        
        break;
        }

}
}