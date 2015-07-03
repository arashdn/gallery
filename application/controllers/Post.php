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
        
        $this->load->model('Category');
        $categories = $this->Category->getAllCategory();
            
        $data = array('categories' => $categories);
        $content = $this->load->view('add_post',$data,true);//NULL->data , true is to load into varible
        
        $this->load->view('master_view',array('content' => $content));
    }
}
