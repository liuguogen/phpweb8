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
	  //$this->_pre_contruct();
	}
	public function index()
	{
		$this->load->view('home/index');
	}
}
