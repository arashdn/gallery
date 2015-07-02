<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{
           
    function __construct() 
    {
        parent::__construct();
    }
    
    private $id;
    private $name;
    private $role;
    private $mail;    
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }


        
    function isMailRegistered($mail)
    {
         $sql = "select id from users where email=?"; 
         $db= $this->db->query($sql, array("$mail")); 
         return $db->result_id->num_rows;
    }
    
    function passwordGenerator($pass,$salt)
    {
        return sha1($pass.$salt);
    }
    
    
    function register($name,$pass,$mail)
    {
        $this->load->helper('string');
        $salt = random_string('md5');
        $passToSave = $this->passwordGenerator($pass, $salt);
        
        $this->config->load('roles');
        $role = $this->config->item('registered', 'user_role');
       
        $mailActive = '';

        $data = array(
        'username' => $name ,
        'pass' => $passToSave ,
        'salt' => $salt ,
        'email' => $mail ,
        'role' => $role,
        'mailactive' => $mailActive,
        );

        if($this->db->insert('users', $data)>0)
        {
            $this->name = $name;
            $this->id = $this->db->insert_id();
            $this->role = $role;
            $this->mail=$mail;
            return $this->db->insert_id();
        }
        return 0;
    }
    
    public function checkLogin($email,$pass)
    {   
        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $result = $this->db->query($sql, array($email));

        
        if($result->result_id->num_rows != 1)
        {
            return FALSE;
        }
        
        $info = $result->row_array();
        if($info['pass']==$this->passwordGenerator($pass, $info['salt']))
        {
            return $info;
        }
        else
        {
            return false;
        }
        
    }
    
    
    function checkCookie($id,$hashSalt)
    {
        $sql = "SELECT * FROM users WHERE id = ? LIMIT 1";
        $result = $this->db->query($sql, array($id));
    
        if($result->result_id->num_rows != 1)
            return FALSE;
       
        
        $info = $result->row_array();
        if(sha1($info['salt'])==$hashSalt)
            return $info;
        else
            return false;
    }
}