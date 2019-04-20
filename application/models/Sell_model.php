<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sell_model extends CI_Model
{
  
  
  public function __construct(){
        parent:: __construct();
    }

    public function getsellers()
    {
    }
    public function getReport($id)
    {
    }
    public function addItems($regItems)
    {
    }
    
    public function addcustomer($customer)
    {
    }
    public function getcustomer($id)
    {
    }
    public function getinvoice($id)
    {
    }
    public function updateaccessory($id,$quantity,$avail_quantity)
    {
    }
    public function updatepart($id,$quantity,$avail_quantity)
    {
    }
    public function updateSeller($data)
    {
    //echo $this->db->last_query(); exit;
    }
    /*
       Delete Item data
    */
   public function delete($id)
  {
  }
  public function salesFilter($from,$to,$user)
  {
      
        
  }
  public function getwarrenties()
    {
      
    }
  
}
