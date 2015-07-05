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
    
    
    
   
        
    function getList($start , $limit )
    {
        $select = 'select post.id,post.cat,post.title,post.description,post.posttime,users.username ';
        
        $end = '';
        $end .= ' limit '.$start.' , '.$limit;
        $result = $this->db->query($select.$this->listSql.$end, null);
        
        $info = $result->result_array();
        return $info;
    }
    
    
}