<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller 
{
	public function index()
	{
		$content = $this->load->view('home',null,true);//NULL->data , true is to load into varible

		$this->load->view('master_view',array('content' => $content));
	}
	public function login($sts = null)
	{
            if($this->loginlib->isLoggedIn())
            {
                redirect('/');
                return;
            }
            
            switch ($sts) 
            {
                case null:
                    $sts = '';
                    break;
                case 'incorrect':
                    $sts = 'نام کاربری یا کلمه عبور اشتباه است.';
                    break;
                case 'incorrectcaptcha':
                    $sts = 'کد امنیتی صحیح نیست.';
                    break;
                default:
                    $sts = 'خطایی در ورود رخ داد.';
                    break;
            } 

            
            $this->load->model('failed_login');
            $this->failed_login->clear();
            $loginCaptcha = true;
            if($this->failed_login->isIpOk($this->input->ip_address()))
            {
                $loginCaptcha = false;
            }
            
            $data = array('loginMsg'=>$sts , 'showLoginCaptcha'=>$loginCaptcha);
            
            $content = $this->load->view('login',$data,true);

            $this->load->view('master_view',array('content' => $content));
	}
        
        
	public function register()
	{
            if($this->loginlib->isLoggedIn())
            {
                redirect('/');
                return;
            }
            
            $this->load->library('form_validation');
            
            if($this->input->post('submit'))
            {
            
                $this->form_validation->set_rules('username', 'نام کاربری', 'required|htmlspecialchars');
                $this->form_validation->set_rules('password', 'کلمه عبور', 'required');
                $this->form_validation->set_rules('password_conf', 'کلمه عبور', 'required|matches[password]');
                $this->form_validation->set_rules('email', 'ایمیل', 'required|valid_email|callback_free_email');
                $this->form_validation->set_rules('captcha', 'کد امنیتی', 'required|callback_validate_captcha');
                
                $this->form_validation->set_message('required', '%s نباید خالی باشد');
                $this->form_validation->set_message('valid_email', 'آدرس ایمیل وارد شده باید معتبر باشد');
                $this->form_validation->set_message('matches', 'کلمات عبور وارد شده یکسان نیست');
                $this->form_validation->set_message('validate_captcha', 'کد امنیتی صحیح نیست');
                $this->form_validation->set_message('free_email', 'این ایمیل قبلا ثبت شده');
                
                
                if ($this->form_validation->run() == FALSE)
                {
                    $content = $this->load->view('register',null,true);//NULL->data , true is to load into varible

                    $this->load->view('master_view',array('content' => $content));
                }
                else
                {
                    $this->load->model('User');
                    $name=$this->input->post('username');
                    $mail=$this->input->post('email');
                    $pass=$this->input->post('password');
                    $res = $this->User->register($name,$pass,$mail);
                    if($res>0)
                    {
                        $this->loginlib->addSession($res,$name,$this->User->getRole());
                        print_r($this->session->userdata());
                        //redirect ("/");
                    }
                    else
                    {
                         show_error("خطای نامعلومی رخ داد", 500 , 'خطا');
                    }
                }      
            }
            else
            {
                $content = $this->load->view('register',null,true);//NULL->data , true is to load into varible

		$this->load->view('master_view',array('content' => $content));
            }
            
            
	}

        
        
        
        public function validate_captcha()
        {
            
            $sss=$this->input->post('captcha');
            
            $path = FCPATH.CAPTCHA_PATH.$this->session->userdata['capimg'];
            if($sss== $this->session->userdata['captcha'] && file_exists($path))
            {
                unlink($path);
                return true;
            }
            else
            {
                if(file_exists($path))
                    unlink($path);
                return false;
            }

        }
        
        public function free_email()
        {
            $mail=$this->input->post('email');
            $this->load->model('User');
            if($this->User->isMailRegistered($mail))
            {
                return false;
            }
            return true;

        }
        
        
        public function dologin()
        {
            $name=$this->input->post('login_user');
            $pass=$this->input->post('login_pass');
            
            
            $this->load->model('User');
            $this->load->model('failed_login');
            
            
            if(!$this->failed_login->isIpOk($this->input->ip_address()))
            {
                if(!$this->validate_captcha())
                    redirect ('member/login/incorrectcaptcha');
            }
            
            $login = $this->User->checkLogin($name,$pass);
                        
            if($login)
            {
            
                if($this->input->post('login_rem')!=FALSE)
                {
                    $this->loginlib->addCookie($login['id'],$login['salt']);
                }
                //print_r($this->input->post());
                //echo '<pre>'.print_r($login->row_array(),TRUE)."Row Number : ".$login->num_rows;
                
                
               $this->loginlib->addSession($login['id'],$login['username'],$login['role']);
               
               redirect('/');
    
            }
            
            else
            {
                $this->failed_login->add();
                redirect('member/login/incorrect');
            }
           
            
        }
        
        
        
        public function logout() 
        {
            $this->loginlib->logout();
            redirect('/');
            
        }
        
}
