<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function addComment($message,$post,$sender,$date=null)
    {
        
        if($date == null)
            $date = time();
        
        $data = array(
        'post' => $post ,
        'message' => $message,
        'time' => $date,
        'sender' => $sender,
        );

        if($this->db->insert('comment', $data)>0)
        {
            return $this->db->insert_id();
        }
        return 0;
    }
    
    
    
   
        
    function getComments($post)
    {
        $select = 'select comment.id,comment.message,comment.time,users.username from comment,users where comment.post = ? ';
        
       
        $result = $this->db->query($select, array($post));
        
        $info = $result->result_array();
        return $info;
    }
    
    
}