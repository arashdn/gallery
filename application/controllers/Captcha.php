<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends CI_Controller
{

	public function index()
	{
            $this->load->helper('captcha');
            
            $this->config->load('captcha');
            
            
            $capCode = rand($this->config->item('min_range', 'captcha') , $this->config->item('max_range', 'captcha'));
            
            $vals = array(
                'word' => $capCode ,
                'img_path' => CAPTCHA_PATH,
                'img_url' => base_url().CAPTCHA_PATH,
                //'font_path' => './path/to/fonts/texb.ttf',
                'img_width' => '150',
                'img_height' => 40,
                'expiration' => $this->config->item('expire', 'captcha')
                );

            $cap = create_captcha($vals);
            
            $this->session->set_userdata(array('captcha'=>$capCode , 'capimg'=>$cap['time'].'.jpg'));

            echo $cap['image'];
            
	}
        

        
}
