<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Seller_model');
	}
	public function index()
	{
		if(!$this->session->userdata('id'))
        {
            redirect(base_url().'login', 'refresh');
        }
        $data['sellers']=$this->Seller_model->getsellers();
        $this->load->view('layout/header');
		$this->load->view('seller/list',$data); 
		$this->load->view('layout/footer');		   
	}
	public function add()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login', 'refresh');
        }
       $this->load->view('layout/header');
		$this->load->view('seller/add'); 
		$this->load->view('layout/footer');		   
	}
	public function save()
	{
		if(!$this->session->userdata('id'))
        {
            redirect(base_url().'login', 'refresh');
        }
       extract($_POST);
			$data['name'] = $_POST['name'];
			$data['email'] = $_POST['email'];
			$data['phone'] = $_POST['phone'];
			$data['address'] =  $_POST['address'];
			$passw1 = $_POST['password'];
			      
		    $passw = hash('sha256', $passw1);

		   
		  $salt = $this->createSalt();
		  $data['password'] = hash('sha256', $salt . $passw);
		  
		  if($_FILES['image']['name']!='')
    	{
			$image = $_FILES['image']['name'];
			$data['image']=$this->do_upload($image);
		}
		else
		{
			$data['image']='';
		} 
		$data['role']='seller';
		//print_r($data); exit;
		if($this->Seller_model->addSeller($data))
		{
			redirect(base_url().'seller','refresh');
		}
	}
	function createSalt()
   {
    return '2123293dsj2hu2besdbsjdsd';
   }
   
   public function edit($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login', 'refresh');
        }
		$data['seller']=$this->Seller_model->getseller($id);
		$this->load->view('layout/header');
		$this->load->view('seller/edit',$data);
		$this->load->view('layout/footer');
	}
	public function update()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login', 'refresh');
        }
        $data['admin_id'] = $_POST['admin_id'];
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['phone'] = $_POST['phone'];
		$data['address'] =  $_POST['address'];
		if(!empty($_POST['password']))
		{
		  $passw1 = $_POST['password'];
		  $passw = hash('sha256', $passw1);
		  $salt = $this->createSalt();
		  $data['password'] = hash('sha256', $salt . $passw);
		}
		
		  
		  if($_FILES['image']['name']!='')
    	{
			$image = $_FILES['image']['name'];
			@unlink('./assets/profile/'.$_POST['old_image']);
			$data['image']=$this->do_upload($image);
		}
		else
		{
			$data['image']=$_POST['old_image'];
		} 
		$data['role']='seller';
		//print_r($data); exit;
		if($this->Seller_model->updateSeller($data))
		{
			redirect(base_url().'seller','refresh');
		}
	}
	public function delete($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login', 'refresh');
        }
		if($this->Seller_model->delete($id))
		{
			redirect(base_url().'seller','refresh');
		}
	}
   private function do_upload($image){
		if(!empty($image)){
		
			$type = explode('.',$_FILES["image"]["name"]);
			$type = $type[count($type)-1];
			$name = uniqid(rand()).'.'.$type;
			$url = './assets/profile/'.$name;//uniqid(rand()).'.'.$type;

			if(in_array($type,array("jpg","jpeg","gif","png"))){
				
				if(is_uploaded_file($_FILES["image"]["tmp_name"])){
					
					if(move_uploaded_file($_FILES["image"]["tmp_name"],$url)){

						return $name;
					}
				}	
			}
			return  "";		
		}
	}

}
