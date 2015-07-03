<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function getAllCategory()
    {
        return $this->db->get('category')->result_array();
    }
}