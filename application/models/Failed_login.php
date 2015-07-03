<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Failed_login extends CI_Model
{
    public function add()
    {
        $sql = "insert into failedLogin(time,ip) values(?,?)";
        $this->db->query($sql, array(time(),$this->input->ip_address()));
    }
    
    public function clear()
    {
        $this->config->load('login');
        $sql = "delete from failedLogin where time < ?";
        $this->db->query($sql, array(time()-$this->config->item('failed_login_timeout')));
    }
    
    
    public function isIpOk($ip)
    {
        $this->config->load('login');
        $sql = "SELECT count(*) FROM failedLogin WHERE ip = ?";
        $result = $this->db->query($sql, array($ip));
        
        $info =  $result->row_array();
        if($info['count(*)']>$this->config->item('failed_login_allowed'))
        {
            return false;
        }
        return true;
    }
}