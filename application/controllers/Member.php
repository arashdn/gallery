<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller 
{
	public function index()
	{
		$content = $this->load->view('home',null,true);//NULL->data , true is to load into varible

		$this->load->view('master_view',array('content' => $content));
	}
	public function login()
	{
		$content = $this->load->view('login',null,true);//NULL->data , true is to load into varible

		$this->load->view('master_view',array('content' => $content));
	}
	public function register()
	{
		$content = $this->load->view('register',null,true);//NULL->data , true is to load into varible

		$this->load->view('master_view',array('content' => $content));
	}
}
