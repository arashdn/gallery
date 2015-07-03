<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_Model extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function addPost($title,$description,$cat,$date=null)
    {
        
        if($date == null)
            $date = time();
        
        $data = array(
        'title' => $title ,
        'description' => $description,
        'posttime' => $date,
        'cat' => $cat,
        );

        if($this->db->insert('post', $data)>0)
        {
            return $this->db->insert_id();;
        }
        return 0;
    }
    
}