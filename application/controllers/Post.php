<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller
{
    public function index()
    {
        
    }
    
    public function add()
    {
        if(!$this->loginlib->isLoggedIn())
        {
            redirect('/member');
            return;
        }
        
        $content = $this->load->view('add_post',null,true);//NULL->data , true is to load into varible
        
        $this->load->view('master_view',array('content' => $content));
    }
}
