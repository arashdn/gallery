<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_Model extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function addPost($title,$description,$sender,$cat,$date=null)
    {
        
        if($date == null)
            $date = time();
        
        $data = array(
        'title' => $title ,
        'description' => $description,
        'posttime' => $date,
        'sender' => $sender,
        'cat' => $cat,
        );

        if($this->db->insert('post', $data)>0)
        {
            return $this->db->insert_id();
        }
        return 0;
    }
    
    
    
    private $listSql='';
    function setupPostList()
    {
        $this->listSql = ' from post,users where post.sender=users.id';
    }
    
    
    function getListCount()
    {
        $select = 'select count(*) as cnt ';
        if($this->listSql == '')
            return null;
        $result = $this->db->query($select.$this->listSql, null);

        if($result->result_id->num_rows != 1)
            return null;
        
        $info = $result->row_array();
        return $info['cnt'];
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