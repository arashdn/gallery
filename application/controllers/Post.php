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
                
                if($_FILES && $_FILES['pic']['name'] !== "")
                {
                    $this->config->load('upload');
                    $this->load->library('upload');
                    if ( ! $this->upload->do_upload('pic'))
                    {
                        echo $this->config->item('upload_path');
                        $data['upload_error'] = 'خطا در آپلود فایل <br>'.$this->upload->display_errors();
                        $content = $this->load->view('add_post',$data,true);//NULL->data , true is to load into varible
                        $this->load->view('master_view',array('content' => $content));
                        return;
                    }
                    
                    $sub = htmlspecialchars($this->input->post('subject'));
                    $disc = $this->input->post('description')?htmlspecialchars($this->input->post('description')):'';
                    $category = $this->input->post('category');
                    $this->load->model('Post_Model');
                    $res = $this->Post_Model->addPost($sub,$disc,$category);
                    
                    if($res <= 0)
                    {
                        $data['send_error'] = 'خطای پایگاه داده در ارسال فایل';
                        $content = $this->load->view('add_post',$data,true);//NULL->data , true is to load into varible
                        $this->load->view('master_view',array('content' => $content));
                        return;
                    }
                    
                    
                    $this->load->model('Picture');
                    $finalRes = $this->Picture->addPicture($res,$this->upload->data('file_name'));

                    
                    if($finalRes>0)
                        redirect('/');
                    else
                        
                    {
                        $data['send_error'] = 'خطایی نامعلوم در ثبت تصویر در پایگاه داده';
                        $content = $this->load->view('add_post',$data,true);//NULL->data , true is to load into varible
                        $this->load->view('master_view',array('content' => $content));
                        return;
                    }
                    
                }
                else //$_FILES && $_FILES['attach']['name'] !== ""
                {
                    $data['upload_error'] = 'یک تصویر را برای ارسال انتخاب کنید';
                    $content = $this->load->view('add_post',$data,true);//NULL->data , true is to load into varible
                    $this->load->view('master_view',array('content' => $content));
                    return;
                }
                
            }      
        }
        else
        {
            $content = $this->load->view('add_post',$data,true);//NULL->data , true is to load into varible
        
            $this->load->view('master_view',array('content' => $content));
        }
 
    }
}
