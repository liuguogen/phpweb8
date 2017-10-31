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
	private $limit=10;
	public function __construct()
	{


		 parent::__construct();
		if(!$this->input->cookie('admin_id'))
		{

			echo '<script>window.top.location.href="'.site_url('Login_controller/index').'"</script>';
        	
        	exit();
		}
	}
	/**
	 * 默认页
	 * @return [type] [description]
	 */
	public function index()
	{
		$this->load->view('home/index');
	}
	/**
	 * 欢迎页
	 * @return [type] [description]
	 */
	public function welcome() {

		$this->load->view('home/welcome');
	}
	/**
	 * 配置信息
	 * @return [type] [description]
	 */
	public function setting() {
		if(IS_POST) {
			$data = $this->input->post();
			$data['create_time'] = time();
			if(isset($data['thumb']) && $data['thumb']) {
				$data['thumb'] = implode(',',$data['thumb']);
			}
			if(isset($data['setting_id']) && $data['setting_id']!='') {
				$setting_id = $data['setting_id'];
				unset($data['setting_id']);
				$flag = $this->Admin_model->update('setting',$data,array('setting_id'=>$setting_id));
			} else {
				$flag = $this->Admin_model->insert('setting',$data);
			}
			
			if($flag) {
				$this->message('保存成功',site_url('Default_controller/setting'));
			} else {
				$this->message('保存失败',site_url('Default_controller/setting'));
			}
		} else {
			$rRow = $this->Admin_model->getRow('*','setting');
			$rRow['thumb'] = $rRow['thumb']  ? explode(',',$rRow['thumb'])  :array();
			
			$data['data'] = $rRow; 
			$this->load->view('home/setting',$data);
		}
	}
	/**
	 * 新闻列表
	 * @return [type] [description]
	 */
	public function newsList() {
		if(!empty($_POST)){
			$keyword=trim($this->input->post('news_name'));
			$data['news_name']=$keyword;
			$total=$this->Admin_model->getCount('news',array('news_name|like'=>$keyword));
			$filter=array('news_name|like'=>$keyword);
			}else{
				$keyword='';
				$total=$this->Admin_model->getCount('news');
				$data['news_name']=$keyword;
				$filter=array();
			}

			$this->load->library('pagination');
			$limit = $this->limit;
			$config['base_url'] = site_url('Default_controller/newsList').'?page=p';
			$config['total_rows'] = $total;
			$config['per_page'] = $limit;
			$config['full_tag_open'] = '<div class="pagination">'; // 分页开始样式
			$config['full_tag_close'] = '</div>'; // 分页结束样式
			$config['first_link'] = '首页'; // 第一页显示
			$config['last_link'] = '末页'; // 最后一页显示
			$config['next_link'] = '下一页 '; // 下一页显示
			$config['prev_link'] = '上一页'; // 上一页显示
			$config['cur_tag_open'] = ' <a class="current">'; // 当前页开始样式
			$config['cur_tag_close'] = '</a>'; // 当前页结束样式
			$config['num_links'] = 2;// 当前连接前后显示页码个数
			$config['page_query_string']=TRUE;
			//$config['uri_segment'] = 4;
			$config['use_page_numbers'] = TRUE;
			$config['page_query_string']=TRUE;
			$config['use_page_numbers'] = TRUE;
			$per_page=$this->input->get('per_page');
			$start=$per_page?($per_page-1)*$limit:0; 
			
			$data['row']=$this->Admin_model->getList('*','news',$filter,$start,$limit,'create_time DESC');
			$this->pagination->initialize($config);
			$data['page_links']=$this->pagination->create_links();
			$this->load->view('home/newslist',$data);
	}
	/**
	 * 添加新闻
	 */
	public function addNews() {
		if(IS_POST) {
			$data = $this->input->post();
			$data['create_time'] = time();
			if(isset($data['news_id']) && $data['news_id']) {
				$news_id = $data['news_id'];
				unset($data['news_id']);
				$flag = $this->Admin_model->update('news',$data,array('news_id'=>$news_id));
			} else {
				$flag = $this->Admin_model->insert('news',$data);
			}
			if($flag) {
				$this->message('保存成功',site_url('Default_controller/newsList'));
			} else {
				$this->message('保存失败',site_url('Default_controller/addNews'));
			}
		} else {
			if(isset($_GET['news_id'])) {
				$data['data'] = $this->Admin_model->getRow('*','news',array('news_id'=>$this->input->get('news_id')));
				//$data['news_type'] = $this->Admin_model->getList('type_id,type_name','news_type');
			} 
			//else {
				$data['news_type'] = $this->Admin_model->getList('type_id,type_name','news_type');
			//}
			$this->load->view('home/addnews',$data);
		}
	}
	/**
	 * 删除新闻 逻辑删除
	 * @return [type] [description]
	 */
	public function delNews() {
		$news_id = $this->input->get('news_id');
		$flag = $this->Admin_model->update('news',array('is_del'=>1),array('news_id'=>$news_id));
		if($flag) {
			$this->message('删除成功',site_url('Default_controller/newsList'));
		} else {
			$this->message('删除失败',site_url('Default_controller/newsList'));
		}
	}
	/**
	 * 新闻分类
	 * @return [type] [description]
	 */
	public function newsType() {
		if(!empty($_POST)){
			$keyword=trim($this->input->post('type_name'));
			$data['type_name']=$keyword;
			$total=$this->Admin_model->getCount('news_type',array('type_name|like'=>$keyword));
			$filter=array('type_name|like'=>$keyword);
			}else{
				$keyword='';
				$total=$this->Admin_model->getCount('news_type');
				$data['type_name']=$keyword;
				$filter=array();
			}

			$this->load->library('pagination');
			$limit = $this->limit;
			$config['base_url'] = site_url('Default_controller/newsType').'?page=p';
			$config['total_rows'] = $total;
			$config['per_page'] = $limit;
			$config['full_tag_open'] = '<div class="pagination">'; // 分页开始样式
			$config['full_tag_close'] = '</div>'; // 分页结束样式
			$config['first_link'] = '首页'; // 第一页显示
			$config['last_link'] = '末页'; // 最后一页显示
			$config['next_link'] = '下一页 '; // 下一页显示
			$config['prev_link'] = '上一页'; // 上一页显示
			$config['cur_tag_open'] = ' <a class="current">'; // 当前页开始样式
			$config['cur_tag_close'] = '</a>'; // 当前页结束样式
			$config['num_links'] = 2;// 当前连接前后显示页码个数
			$config['page_query_string']=TRUE;
			//$config['uri_segment'] = 4;
			$config['use_page_numbers'] = TRUE;
			$config['page_query_string']=TRUE;
			$config['use_page_numbers'] = TRUE;
			$per_page=$this->input->get('per_page');
			$start=$per_page?($per_page-1)*$limit:0; 
			
			$data['row']=$this->Admin_model->getList('*','news_type',$filter,$start,$limit,'create_time DESC');
			$this->pagination->initialize($config);
			$data['page_links']=$this->pagination->create_links();
			$this->load->view('home/newstype',$data);
	}
	/**
	 * 添加分类
	 * @return [type] [description]
	 */
	public function addnewsType() {
		if(IS_POST) {
			$data = $this->input->post();
			$data['create_time'] = time();
			if(isset($data['type_id']) && $data['type_id']!='') {
				$type_id = $data['type_id'];
				unset($data['type_id']);
				$flag = $this->Admin_model->update('news_type',$data,array('type_id'=>$type_id));
			} else {
				$flag = $this->Admin_model->insert('news_type',$data);
			}
			if($flag) {
				$this->message('保存成功',site_url('Default_controller/newsType'));
			} else {
				$this->message('保存失败',site_url('Default_controller/addnewsType'));
			}
		} else {
			if(isset($_GET['type_id'])) {
				$type_id = $this->input->get('type_id');
				$data['data'] = $this->Admin_model->getRow('*','news_type',array('type_id'=>$type_id));
			} else {
				$data['data']=array();
			}

			$this->load->view('home/addnewstype',$data);
		}
	}
	/**
	 * 删除分类
	 * @return [type] [description]
	 */
	public function delNewsType() {
		$type_id = $this->input->get('type_id');
		$flag  = $this->Admin_model->delete('news_type',array('type_id'=>$type_id));
		if($flag) {
			$this->message('删除成功',site_url('Default_controller/newsType'));
		} else {
			$this->message('删除失败',site_url('Default_controller/newsType'));
		}
	}
}
