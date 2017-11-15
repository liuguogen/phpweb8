<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Default_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
	  parent::__construct();
	  $home_data = $this->Home_model->getRow('*','setting');
	  $this->config->set_item('home_data',$home_data);
	  //获取NEWStype
	  $cat_list = $this->Home_model->getList('*','news_type');

	  $this->config->set_item('cat_list',$cat_list);
	  //$this->_pre_contruct();
	  //
	  
	}
	public function index()
	{  
		//查询推荐文章
		$data['is_top'] = $this->Home_model->getRow('news_id,news_name,news_content','news',array('is_top'=>1),0,1);
		$this->load->view('home/index',$data);
	}
	/**
	 * 新闻详情
	 * @return [type] [description]
	 */
	public function newsDetail() {
		$news_id=$this->uri->segment(2);
		$data['data'] = $this->Home_model->getRow('*','news',array('news_id'=>$news_id));
		//增加访问量
		$this->Home_model->query("update news set read_num=read_num+1 where news_id={$news_id}");
		$this->load->view('home/detail',$data);
	}
}
