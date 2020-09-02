<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('cart');
		$this->load->helper('form');
	}
	
	public function index()
	{
		//header
		$this->load->view('layout/header');
		//navbar
		$data['menu'] = $this->Home_model->fetch_menu();
		$data['sub_menu'] = $this->Home_model->fetch_submenu();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('layout/navbar', $data);
		//content
		$data['products'] = $this->Home_model->fetch_data_product();
		$this->load->view('home', $data);
		//footer
		$this->load->view('layout/footer');
	}

	public function detail($id)
	{	
		//header
		$this->load->view('layout/header');
		//navbar
		$data['menu'] = $this->Home_model->fetch_menu();
		$data['sub_menu'] = $this->Home_model->fetch_submenu();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('layout/navbar', $data);
		//conten
		$data['products'] = $this->Home_model->product_by_id($id);
		$data['images_products'] = $this->Home_model->fetch_data_images_product();
		$this->load->view('detail', $data);
		//footer
		$this->load->view('layout/footer');
	}
	
	public function upload()
	{
		$data[] = "";

		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
	}
}