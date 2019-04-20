<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model(array('Buy_model','Sell_model','Stock_model','Seller_model'));
	}
	public function index()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$data['sellers']=$this->Sell_model->getsellers();
		$data['users']=$this->Seller_model->getsellers();
		
		//print_r($data); exit;
		$this->load->view('layout/header');
		$this->load->view('reports/sell_list',$data);
		  
	}
	public function warrenty()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$data['items']=$this->Sell_model->getwarrenties();
		
		//print_r($data); exit;
		$this->load->view('layout/header');
		$this->load->view('reports/warrenty_list',$data);
		$this->load->view('layout/footer');
		  
	}
	public function show_sell()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
        $data['sellers']=$this->Sell_model->getsellers();
         $data['admin']=$this->Seller_model->getseller(1);
       /*echo "<pre>";
       print_r($data);*/

        ob_start();
	    $html=ob_get_clean();
	    $html=utf8_encode($html);
	  
	    $html=$this->load->view('reports/sell_pdf',$data,TRUE);
	    require_once(APPPATH.'third_party/mpdf60/mpdf.php');
	    
	    $mpdf=new mPDF();
	    $mpdf->allow_charset_conversion=true;
	    $mpdf->charset_in='UTF-8';
	    $mpdf->WriteHTML($html);
	    $mpdf->output('meu-pdf','I');
	}
	public function phones()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
		$data['phones']=$this->Stock_model->getPhones();
		$this->load->view('layout/header');
		$this->load->view('reports/stock_phone',$data);
		$this->load->view('layout/footer'); 
	}
	public function show_phone()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
       $data['phones']=$this->Stock_model->getPhones();
       $data['admin']=$this->Seller_model->getseller(1);
       /*echo "<pre>";
       print_r($data);*/

        ob_start();
	    $html=ob_get_clean();
	    $html=utf8_encode($html);
	  
	    $html=$this->load->view('reports/phone_pdf',$data,TRUE);
	    require_once(APPPATH.'third_party/mpdf60/mpdf.php');
	    
	    $mpdf=new mPDF();
	    $mpdf->allow_charset_conversion=true;
	    $mpdf->charset_in='UTF-8';
	    $mpdf->WriteHTML($html);
	    $mpdf->output('meu-pdf','I');
	}
	public function accessories()
	{
		if(!$this->session->userdata('id'))
        {
            redirect(base_url().'login', 'refresh');
        }
		$data['phones']=$this->Stock_model->getAccessories();
		$this->load->view('layout/header');
		$this->load->view('reports/stock_accessory',$data);
		$this->load->view('layout/footer'); 
	}
	public function show_accessories()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
       $data['phones']=$this->Stock_model->getAccessories();
       $data['admin']=$this->Seller_model->getseller(1);
       /*echo "<pre>";
       print_r($data);*/

        ob_start();
	    $html=ob_get_clean();
	    $html=utf8_encode($html);
	  
	    $html=$this->load->view('reports/accessories_pdf',$data,TRUE);
	    require_once(APPPATH.'third_party/mpdf60/mpdf.php');
	    
	    $mpdf=new mPDF();
	    $mpdf->allow_charset_conversion=true;
	    $mpdf->charset_in='UTF-8';
	    $mpdf->WriteHTML($html);
	    $mpdf->output('meu-pdf','I');
	}
	public function parts()
	{
		if(!$this->session->userdata('id'))
        {
            redirect(base_url().'login', 'refresh');
        }
		$data['phones']=$this->Stock_model->getParts();
		$this->load->view('layout/header');
		$this->load->view('reports/stock_parts',$data);
		$this->load->view('layout/footer'); 
	}
	public function show_part()
	{
		if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
       $data['phones']=$this->Stock_model->getParts();
       $data['admin']=$this->Seller_model->getseller(1);
       /*echo "<pre>";
       print_r($data);*/

        ob_start();
	    $html=ob_get_clean();
	    $html=utf8_encode($html);
	  
	    $html=$this->load->view('reports/part_pdf',$data,TRUE);
	    require_once(APPPATH.'third_party/mpdf60/mpdf.php');
	    
	    $mpdf=new mPDF();
	    $mpdf->allow_charset_conversion=true;
	    $mpdf->charset_in='UTF-8';
	    $mpdf->WriteHTML($html);
	    $mpdf->output('meu-pdf','I');
	}
	public function sales_filter()
    {   
    	if(!$this->session->userdata('id'))
        {
            redirect('login/login', 'refresh');
        }
        $from=date("d-m-Y", strtotime($this->input->post('st_date')));
        $to=date("d-m-Y", strtotime($this->input->post('end_date')));
        $user=$this->input->post('user');

        $data=$this->Sell_model->salesFilter($from,$to,$user);

        //log_message('debug',print_r($data,true));
        
        print_r(json_encode($data,true));
        
    }
	
}
