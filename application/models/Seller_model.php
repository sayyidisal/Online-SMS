<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Seller_model extends CI_Model
{
	
	
	public function __construct(){
        parent:: __construct();
    }

    public function getsellers()
    {
      $this->db->select('*');
      $this->db->from('tbl_admin');
      $this->db->where('role','seller');
      $this->db->where('delete_status',0);
      $query=$this->db->get();
    return $query->result();
    }
    public function gettac()
    {
      $this->db->select('*');
      $this->db->from('tac');
      $this->db->where('id','1');
      $query=$this->db->get();
    return $query->row();
    }
    public function addtac($data)
    {
      $this->db->where('id','1');
      if($this->db->update('tac',$data)){
           return true;
       }
       return false;
    //echo $this->db->last_query(); exit;
    }
    public function addSeller($data)
    {
      if($this->db->insert('tbl_admin',$data)){
           return true;
       }
       return false;
    //echo $this->db->last_query(); exit;
    }
    public function getseller($id)
    {
      $this->db->select('*');
      $this->db->from('tbl_admin');
      $this->db->where('admin_id',$id);
      $this->db->where('delete_status',0);
      $query=$this->db->get();
      return $query->row();
    }
    public function updateSeller($data)
    {
      $this->db->where('admin_id',$data['admin_id']);
      if($this->db->update('tbl_admin',$data)){
           return true;
       }
       return false;
    //echo $this->db->last_query(); exit;
    }
    /*
       Delete Item data
    */
  public function delete($id)
  {

    $sql="UPDATE tbl_admin set delete_status = 1  WHERE admin_id ='".$id."'";
        if($this->db->query($sql)) {
         
             return true;
         }
          return FALSE;
  }
  
}
