<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model(array('Login_model','Seller_model'));
	}
	public function login()
	{
		if(isset($_POST['login']))
		{
		$unm = $_POST['username'];
		//$p="admin";
		$passw = hash('sha256', $_POST['passwd']);
		//$passw = hash('sha256',$p);
		
		$salt = $this->createSalt();
		$pass = hash('sha256', $salt . $passw);
		$result=$this->Login_model->login($unm,$pass);
		     if(count($result)==1) {
			{
				$data=array(
					'id'=>$result->admin_id,
					'pass'=>$result->password,
					'email'=>$result->email,
					'name'=>$result->name,
					'image'=>$result->image
				);
				$this->session->set_userdata($data);
				$this->load->view('layout/template');    
		    }
		}
		else {
				$this->load->view('layout/login');
			     $message = "Invalid Username or Password!";
			  }
			
			}
			else
			{
				$this->load->view('layout/login');
			}
		
	}
	public function index()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$this->load->view('layout/template');    
	}
	public function profile()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
        $id=$this->session->userdata('id');
        $data['seller']=$this->Seller_model->getseller($id);
        $this->load->view('layout/header');
		$this->load->view('layout/profile',$data);
		$this->load->view('layout/footer');
		    
	}
	public function version()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
        $this->load->view('layout/header');
		$this->load->view('layout/version');
		$this->load->view('layout/footer');
		    
	}
	public function tac()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
        if(isset($_POST['btn_save']))
        {
        	echo "string"; exit;
        	$tac_array=$_POST;
			if($this->Seller_model->addtac($tac_array))
			{
				redirect('login/tac','refresh');
			}
        }
        $data['tac']=$this->Seller_model->gettac();
        $this->load->view('layout/header');
		$this->load->view('layout/tac',$data);
		$this->load->view('layout/footer');
		    
	}
	public function savetac()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
        //echo "string"; exit;
        	$tac_array=$_POST;
			$this->Seller_model->addtac($tac_array);
				redirect('login/tac','refresh');
		    
	}
	public function update()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login', 'refresh');
        }
        $data['admin_id'] = $_POST['admin_id'];
        $data['company'] = $_POST['company'];
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
			redirect(base_url().'login/profile','refresh');
		}
	}
	function createSalt()
	{
	    return '2123293dsj2hu2besdbsjdsd';
	}
	/*public function logout()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$this->load->view('layout/template');    
	}*/
	public function logout()
	{
		$this->session->unset_userdata('id');
		//$this->session->unset_userdata('userId');
		//$this->session->unset_userdata('site_lang');
		redirect(base_url().'login', 'refresh');
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
