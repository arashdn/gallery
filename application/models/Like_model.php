<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Like_model extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    public function add($post , $liker)
    {
        return $this->db->insert('likes', array('post' => $post, 'liker' => $liker));
    }
    
    public function remove($post , $liker)
    {
        return $this->db->delete('likes', array('post' => $post , 'liker' => $liker));
    }
    
    public function userLikedPost($post , $liker)
    {
        $sql = "SELECT count(*) FROM likes where post = ? and liker = ?";
        $result = $this->db->query($sql, array($post , $liker));
        
        $info =  $result->row_array();
        if($info['count(*)']==1)
        {
            return true;
        }
        return false;
    }
    
    public function getLikeCount($post)
    {
        $sql = "SELECT count(*) FROM likes where post = ?";
        $result = $this->db->query($sql, array($post));
        
        $info =  $result->row_array();
        return $info['count(*)'];
    }
    
}