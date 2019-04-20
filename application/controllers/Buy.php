<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Buy_model');
	}
	public function index()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$this->load->view('layout/header');
		$this->load->view('buy/list');
		$this->load->view('layout/footer');
	}
	public function addphone()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$this->load->view('layout/header');
		$this->load->view('buy/add');
		$this->load->view('layout/footer');
	}
	public function savephone()
	{
		if(!$this->session->userdata('id'))
        {
            redirect(base_url().'login', 'refresh');
        }
		$phone_array=$_POST;
		if($this->Buy_model->add($phone_array))
		{
			/*$this->session->set_flashdata();
			echo "string"; exit;*/
			redirect(base_url().'buy','refresh');
		}
	}
	public function editphone($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect(base_url().'login', 'refresh');
        }
		$data['phone']=$this->Buy_model->getphone($id);
		$this->load->view('layout/header');
		$this->load->view('buy/edit',$data);
		$this->load->view('layout/footer');
	}
	public function updatephone()
	{
		if(!$this->session->userdata('id'))
        {
            redirect(base_url().'login', 'refresh');
        }
		$phone_array=$_POST;
		if($this->Buy_model->update($phone_array))
		{
			redirect(base_url().'buy','refresh');
		}
	}
	public function deletephone($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect(base_url().'login', 'refresh');
        }
		if($this->Buy_model->deletephone($id))
		{
			redirect(base_url().'buy','refresh');
		}
	}
	
}
