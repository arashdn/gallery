<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginLib 
{

    private $ci;
    function __construct()
    {
        $this->ci = & get_instance();
    }

    public function addSession($id,$name,$role)
    {
        $this->ci->session->set_userdata(
            array(
                'userId'=>$id ,
                'name'=>$name,
                'role'=>$role,
                ));
    }
    
    function addCookie($id,$salt)
    {
        $this->ci->config->load('login');
        $cookie = array(
            'name'   => $this->ci->config->item('login_cookie_name'),
            'value'  => $id.'.'.sha1($salt),
            'expire' => $this->ci->config->item('login_cookie_expire'),
            );

        $this->ci->input->set_cookie($cookie); 
    }
    
    
    function updateCookie()
    {
        $this->ci->config->load('login');
        $login = $this->ci->session->userdata('role');
         if($login == false || $login == $this->ci->config->item('unregistered', 'user_role'))
         {
             $ck = $this->ci->input->cookie($this->ci->config->item('login_cookie_name'));
             if($ck)
             {
                 $vals = explode('.', $ck);
                 if(isset($vals[0]) && isset($vals[1]))
                 {
                    $this->ci->load->model('User');
                    $info = $this->ci->User->checkCookie($vals[0],$vals[1]);
                    if ($info) 
                    {
                        //cookie is correct
                        $this->addSession($info['id'],$info['username'],$info['role']);
                    } 
                    else //incorrect coockie
                    {
                        return;
                    }
                }
                else
                {
                    return;
                }
             }
             else //no cookie
             {
                return;
             }
         }
    }
    
    
    public function logout() 
    {
        $this->ci->config->load('login');
        $this->ci->session->sess_destroy();
        $this->ci->load->helper('cookie');
        delete_cookie($this->ci->config->item('login_cookie_name'));

    }
    
    function isLoggedIn()
    {
        $this->updateCookie();
        $login = $this->ci->session->userdata('role');
        if($login == false || $login == $this->ci->config->item('unregistered', 'user_role'))
            return false;
        else
            return true;
    }
    
    
    function getUserId()
    {
        return $this->ci->session->userdata('userId');
    }
    function getUserRole()
    {
        return $this->ci->session->userdata('role');
    }
    function getUserName()
    {
        return $this->ci->session->userdata('name');
    }
    
}