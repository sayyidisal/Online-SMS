<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Stock_model');
	}
	public function phone()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$data['phones']=$this->Stock_model->getPhones();
		$this->load->view('layout/header');
		$this->load->view('phone/list',$data);
		$this->load->view('layout/footer');
	}
	public function addphone()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$this->load->view('layout/header');
		$this->load->view('phone/add');
		$this->load->view('layout/footer');
	}
	public function savephone()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$phone_array=$_POST;
		if($this->Stock_model->add($phone_array))
		{
			/*$this->session->set_flashdata();
			echo "string"; exit;*/
			redirect('stock/phone','refresh');
		}
	}
	public function editphone($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$data['phone']=$this->Stock_model->getphone($id);
		$this->load->view('layout/header');
		$this->load->view('phone/edit',$data);
		$this->load->view('layout/footer');
	}
	public function updatephone()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$phone_array=$_POST;
		if($this->Stock_model->update($phone_array))
		{
			redirect('stock/phone','refresh');
		}
	}
	public function deletephone($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		if($this->Stock_model->deletephone($id))
		{
			redirect('stock/phone','refresh');
		}
	}
	public function accessories()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$data['phones']=$this->Stock_model->getAccessories();
		$this->load->view('layout/header');
		$this->load->view('accessories/list',$data);
		$this->load->view('layout/footer');
	}
	public function addaccessory()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$this->load->view('layout/header');
		$this->load->view('accessories/add');
		$this->load->view('layout/footer');
	}
	public function saveaccessory()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$phone_array=$_POST;
		if($_FILES['pimage']['name']!='')
    	{
			$image = $_FILES['pimage']['name'];
			$phone_array['pimage']=$this->do_upload($image);
		}
		else
		{
			$phone_array['pimage']='';
		}
		//echo "string"; exit;
		if($this->Stock_model->addaccessory($phone_array))
		{
			/*$this->session->set_flashdata();
			echo "string"; exit;*/
			redirect('stock/accessories','refresh');
		}
	}
	public function editaccessory($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$data['acc']=$this->Stock_model->getaccessory($id);
		$this->load->view('layout/header');
		$this->load->view('accessories/edit',$data);
		$this->load->view('layout/footer');
	}
	public function updateaccessory()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		//$phone_array=$_POST;
		$phone_array['id']=$_POST['id'];
		$phone_array['aname']=$_POST['aname'];
		$phone_array['quantity']=$_POST['quantity'];
		$phone_array['price']=$_POST['price'];
		if($_FILES['pimage']['name']!='')
    	{
			$image = $_FILES['pimage']['name'];
			$phone_array['pimage']=$this->do_upload($image);
			@unlink('./assets/accessories/'.$_POST['old_image']);
		}
		else
		{
			$phone_array['pimage']=$_POST['old_image'];
		}
		//echo "string"; exit;
		if($this->Stock_model->updateaccessory($phone_array))
		{
			redirect('stock/accessories','refresh');
		}
	}
	public function deleteaccessory($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		if($this->Stock_model->deleteaccessory($id))
		{
			redirect('stock/accessories','refresh');
		}
	}
	public function parts()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$data['phones']=$this->Stock_model->getParts();
		$this->load->view('layout/header');
		$this->load->view('parts/list',$data);
		$this->load->view('layout/footer');
	}
	public function addpart()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$this->load->view('layout/header');
		$this->load->view('parts/add');
		$this->load->view('layout/footer');
	}
	public function savepart()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$phone_array=$_POST;
		if($this->Stock_model->addpart($phone_array))
		{
			/*$this->session->set_flashdata();
			echo "string"; exit;*/
			redirect('stock/parts','refresh');
		}
	}
	public function editpart($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$data['part']=$this->Stock_model->getpart($id);
		$this->load->view('layout/header');
		$this->load->view('parts/edit',$data);
		$this->load->view('layout/footer');
	}
	public function updatepart()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$phone_array=$_POST;
		if($this->Stock_model->updatepart($phone_array))
		{
			redirect('stock/parts','refresh');
		}
	}
	public function deletepart($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		if($this->Stock_model->deletepart($id))
		{
			redirect('stock/parts','refresh');
		}
	}
	private function do_upload($image){
		if(!empty($image)){
		
			$type = explode('.',$_FILES["pimage"]["name"]);
			$type = $type[count($type)-1];
			$name = uniqid(rand()).'.'.$type;
			$url = './assets/accessories/'.$name;//uniqid(rand()).'.'.$type;

			if(in_array($type,array("jpg","jpeg","gif","png"))){
				
				if(is_uploaded_file($_FILES["pimage"]["tmp_name"])){
					
					if(move_uploaded_file($_FILES["pimage"]["tmp_name"],$url)){

						return $name;
					}
				}	
			}
			return  "";		
		}
	}
}
