<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function index2()
	{
		$content = $this->load->view('home',null,true);//NULL->data , true is to load into varible

		$this->load->view('master_view',array('content' => $content));
	}
        
    public function index($page = null)
    {  


        $this->load->model('Post_Model');

        $this->Post_Model->setupPostList();

        $num = $this->Post_Model->getListCount();
        if($num==null)
        {
            show_error('خطای نامعلومی رخ داد');
            return;
        }


        $this->load->library('pagination');

        $this->config->load('paging');

        $pageItem = $this->config->item('post_per_page', 'postlist_paging');

        $config['base_url'] = site_url('home/index/');
        $config['total_rows'] = $num;
        $config['per_page'] = $pageItem;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;


        $config['reuse_query_string'] = TRUE;//very important to move in search pages



        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '&gt;&gt;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '&gt;&gt;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $pageList = $this->pagination->create_links();



        if($page==null)
        {
            $page=1;
        }
        else if(!is_numeric($page))
        {
            show_error('شماره صفحه اشتباه است');
            return;
        }



        $startInDb = ($page-1)*$pageItem;
        $res = $this->Post_Model->getList($startInDb,$pageItem);
        
        if($res == null)
        {
            $res=array();
        }

        
        $this->load->library('JalaliDate');
        $dater = new JalaliDate();
        $this->load->model('Picture');
        $this->config->load('upload');
        
        //foreach ($data['messages'] as $key => $value) //Memory leak problem
        while(list($key,$value)= each($res))
        {
            $dater->setTimeStamp($res[$key]['posttime']);
            $res[$key]['displayDate'] = $dater->getListDate();
            

            $att = $this->Picture->getPostPicture($value['id']);
            if(!$att)
            {
                show_error('خطا در بارگزاری اطلاعات فایل های پیوستی', '500', 'خطا');
                return;
            }
            $res[$key]['picture'] = base_url().PIC_UPLOAD_PATH.$att[0]['filename'];

        }//for each
        
        $content = $this->load->view('home',array('paging'=>$pageList , 'posts'=>$res),true);

	$this->load->view('master_view',array('content' => $content));
        
    }
}
