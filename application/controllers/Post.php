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
        
        
        $this->load->library('form_validation');
        
        if($this->input->post('submit'))
        {

            $this->form_validation->set_rules('category', 'دسته بندی', 'required|htmlspecialchars');
            $this->form_validation->set_rules('subject', 'عنوان', 'required|htmlspecialchars');
            $this->form_validation->set_rules('description', 'توصیف', 'htmlspecialchars');

            $this->form_validation->set_message('required', '%s نباید خالی باشد');


            if ($this->form_validation->run() == FALSE)
            {
                $content = $this->load->view('add_post',$data,true);//NULL->data , true is to load into varible
        
                $this->load->view('master_view',array('content' => $content));
            }
            else
            {
                echo 'send';
            }      
        }
        else
        {
            $content = $this->load->view('add_post',$data,true);//NULL->data , true is to load into varible
        
            $this->load->view('master_view',array('content' => $content));
        }
 
    }
}
