<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Like extends CI_Controller
{

	public function index()
	{
            
            echo 'not allowed';
	}
        
        
        public function dolike($post = null)
        {
            if($post == null)
            {
                echo LIKE_ERROR;
                return;
            }
            if(!$this->loginlib->isLoggedIn())
            {
                echo LIKE_ERROR;
                return;
            }
            
            $this->load->model('Like_model');
            $user = $this->loginlib->getUserId();
            if($this->Like_model->userLikedPost($post,$user))
            {
                if($this->Like_model->remove($post,$user)>0)
                {
                    echo LIKE_NO_LIKE;
                }
            }
            else
            {
                if($this->Like_model->add($post,$user)>0)
                {
                    echo LIKE_OK;
                }
            }
        }
        
        function test($post = null)
        {
            if($post == null)
            {
                echo LIKE_ERROR;
                return;
            }
            if(!$this->loginlib->isLoggedIn())
            {
                echo LIKE_ERROR;
                return;
            }
            
            $content = $this->load->view('test_view',null,true);//NULL->data , true is to load into varible
        
            $this->load->view('master_view',array('content' => $content));
        }
}
