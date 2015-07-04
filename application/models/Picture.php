<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Picture extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function addPicture($postId,$fileName)
    {
        $data = array(
        'filename' => $fileName,
        'post' => $postId,
        'path' => '',
        );

        if($this->db->insert('picture', $data)>0)
        {
            return $this->db->insert_id();
        }
        return 0;
    }
    
    
    function getPostPicture($postId)
    {
        $sql = "select id,filename from picture where post = ? limit 1";
        $result = $this->db->query($sql, array($postId));

        
        if($result->result_id->num_rows < 1)
        {
            return FALSE;
        }
        
        $info = $result->result_array();
        return $info;
    }
    
}