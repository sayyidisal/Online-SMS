<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sell extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model(array('Sell_model','Stock_model','Seller_model','Buy_model'));
	}
	public function index()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		//print_r($data); exit;
		$this->load->view('layout/header');
		$this->load->view('sell/list');
		$this->load->view('layout/footer');  
	}
	public function add()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
        $data['phones']=$this->Stock_model->getPhones();
        $data['buyphones']=$this->Buy_model->getPhones();
        $data['accessories']=$this->Stock_model->getAccessories();
        $data['parts']=$this->Stock_model->getParts();
		//$this->load->view('layout/header');
		$this->load->view('sell/add',$data);
		  
	}
	
	public function get_phone($id,$cat)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
        //echo $id,$cat; exit;
        if($cat=='phone')
        {
        	$result=$this->Stock_model->getphone($id);	
        	$res['id']=$result->id;
        	$res['pname']=$result->pname;
        	$res['category']='phone';
            $res['cat_id']=1;
            $res['pprice']='';
            $res['stock']='';
            $res['warrenty']=$result->wperiod;
        }
        else if($cat=='refurbisht')
        {
        	$result=$this->Buy_model->getphone($id);
        	$res['id']=$result->id;
        	$res['pname']=$result->pname;
        	$res['category']='refurbisht phone';
            $res['cat_id']=4;
            $res['pprice']='';
            $res['stock']='';
            $res['warrenty']=$result->wperiod;
        }
        else if($cat=='accessory')
        {
        	$result=$this->Stock_model->getaccessory($id);
        	$res['id']=$result->id;
        	$res['pname']=$result->aname;
        	$res['category']='accessories';
            $res['cat_id']=2;
            $res['pprice']=$result->price;
            $res['stock']=$result->quantity;
            $res['warrenty']='';	
        }
        else if($cat=='parts')
        {
        	$result=$this->Stock_model->getpart($id);
        	$res['id']=$result->id;
        	$res['pname']=$result->partname;
        	$res['category']='parts';
            $res['cat_id']=3;
            $res['pprice']=$result->price;
            $res['stock']=$result->quantity;
            $res['warrenty']=$result->warranty;
        }
        //print_r($result); exit;
        echo json_encode($res);
	}
	public function get_buyphones($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
        $res=$this->Buy_model->getphone($id);
        echo json_encode($res);
	}
	public function get_accessory($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
        $res=$this->Stock_model->getaccessory($id);	
        echo json_encode($res);
	}
	public function get_part($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
        $res=$this->Stock_model->getpart($id);	
        echo json_encode($res);
	}
	public function save()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
       $data1=json_decode($this->input->post('temptext'));
       $customer=array('customer_name' => $this->input->post('customer_name'),
        'customer_phone' => $this->input->post('customer_phone'),
    	'customer_email' => $this->input->post('customer_email'),
    	'user_id' => $this->session->userdata('id'),);
       $i=0;
       //$regItems=array();
       if(!empty($data1))
				{
					$cust_id=$this->Sell_model->addcustomer($customer);
					foreach ($data1 as $value) 
					{
						if($value->category==1)
						{
							$category='Phone';
							$phone=$this->Stock_model->getphone($value->pname);
							$this->Stock_model->assignphone($value->pname);
							$name=$phone->pname;
							$warrenty=date('d-m-Y',strtotime('+'.$value->warrenty.' days'));
							$emei1=$phone->emei1;
							$emei2=$phone->emei2;
						} 
						if($value->category==2)
						{
							$category='Accessories';
							$phone=$this->Stock_model->getaccessory($value->pname);
							$this->Sell_model->updateaccessory($value->pname,$value->quantity,$phone->quantity);
							$name=$phone->aname;
							$warrenty='';
							$emei1=0;
							$emei2=0;
						} 
						if($value->category==3)
						{
							$category='Parts';
							$phone=$this->Stock_model->getpart($value->pname);
							$this->Sell_model->updatepart($value->pname,$value->quantity,$phone->quantity);
							$name=$phone->partname;
							$warrenty=date('d-m-Y',strtotime('+'.$value->warrenty.' days'));
							$emei1=0;
							$emei2=0;
						}
						if($value->category==4)
						{
							$category='Refurbisht Phone';
							$phone=$this->Buy_model->getphone($value->pname);
							$this->Stock_model->assignrphone($value->pname);
							$name=$phone->pname;
							$warrenty=date('d-m-Y',strtotime('+'.$value->warrenty.' days'));
							$emei1=$phone->emei1;
							$emei2=$phone->emei2;
						}
						$regItems[$i]=array(
							'customer_name'=>$cust_id,
							'category'=>$category,
							'name'=>$name,
							'emei1'=>$emei1,
							'emei2'=>$emei2,
							'warrenty'=>$warrenty,
							'price'=>$value->rate,
							'quantity'=>$value->quantity,
							'created_date'=>date('d-m-Y')
						);
						$i++;
					}
					//print_r($regItems); exit;
					$this->Sell_model->addItems($regItems);
					redirect(base_url().'sell/invoice/'.$cust_id, 'refresh');
				}
				else
				{
					redirect(base_url().'sell/add', 'refresh');
				}

	}
	public function invoice($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
        $data['tac']=$this->Seller_model->gettac();
        $data['customer']=$this->Sell_model->getcustomer($id);
        $data['invoice']=$this->Sell_model->getinvoice($id);
        $data['admin']=$this->Seller_model->getseller(1);		
       /*echo "<pre>";
       print_r($data);*/

        ob_start();
	    $html=ob_get_clean();
	    $html=utf8_encode($html);
	  
	    $html=$this->load->view('sell/pdf',$data,TRUE);
	    require_once(APPPATH.'third_party/mpdf60/mpdf.php');
	    
	    $mpdf=new mPDF();
	    $mpdf->allow_charset_conversion=true;
	    $mpdf->charset_in='UTF-8';
	    $mpdf->WriteHTML($html);
	    $mpdf->output('meu-pdf','I');
	}
	public function delete($id)
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login', 'refresh');
        }
		if($this->Sell_model->delete($id))
		{
			redirect(base_url().'sell','refresh');
		}
	}
}
