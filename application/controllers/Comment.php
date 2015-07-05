<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller
{

	public function index()
	{
            
            echo 'not allowed';
	}
        
        public function add($post = null)
        {
            if($post == null)
            {
                echo REQ_ERROR;
                return;
            }
            if(!$this->loginlib->isLoggedIn())
            {
                echo REQ_ERROR;
                return;
            }
            if(!$this->input->post('message'))
            {
                echo REQ_ERROR;
                return;
            }
            $message = htmlspecialchars($this->input->post('message'));

            $this->load->model('Comment_model');
            if($this->Comment_model->addComment($message,$post,$this->loginlib->getUserId())>0)
            {
                echo REQ_OK;
                return;
            }
            echo REQ_ERROR;
            return;
        }
}
        