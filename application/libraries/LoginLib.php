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
    
    function isLoggedIn()
    {
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