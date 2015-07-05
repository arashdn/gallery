<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller
{

	public function index()
	{
            
            echo 'not allowed';
	}
        
        public function add($post)
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
            
        }
}
        