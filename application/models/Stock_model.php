<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stock_model extends CI_Model
{
	
	
	public function __construct(){
        parent:: __construct();
    }

    public function getPhones()
    {
      $this->db->select('*');
      $this->db->from('phone');
      $this->db->where('delete_status',0);
      $this->db->where('assign',0);
      $query=$this->db->get();
    return $query->result();
    }
    public function getAccessories()
    {
      $this->db->select('*');
      $this->db->from('accessory');
      $this->db->where('delete_status',0);
      $query=$this->db->get();
    return $query->result();
    }
    public function getParts()
    {
      $this->db->select('*');
      $this->db->from('part');
      $this->db->where('delete_status',0);
      $query=$this->db->get();
      return $query->result();
    }
    public function add($phone_array)
    {
      if($this->db->insert('phone',$phone_array)){
           return true;
       }
       return false;
    }
    public function addaccessory($phone_array)
    {
      if($this->db->insert('accessory',$phone_array)){
           return true;
       }
       return false;
    }
    public function addpart($phone_array)
    {
      if($this->db->insert('part',$phone_array)){
           return true;
       }
       return false;
    }
    public function getphone($id)
    {
      $this->db->select('*');
      $this->db->from('phone');
      $this->db->where('id',$id);
      $query=$this->db->get();
    	return $query->row();
    }
    public function getaccessory($id)
    {
      $this->db->select('*');
      $this->db->from('accessory');
      $this->db->where('id',$id);
      $query=$this->db->get();
    	return $query->row();
    }
    public function getpart($id)
    {
      $this->db->select('*');
      $this->db->from('part');
      $this->db->where('id',$id);
      $query=$this->db->get();
    	return $query->row();
    }
    public function update($phone_array)
    {
    	$this->db->where('id',$phone_array['id']);
      if($this->db->update('phone',$phone_array)){
           return true;
       }
       return false;
    }
    public function updateaccessory($phone_array)
    {
    	$this->db->where('id',$phone_array['id']);
      if($this->db->update('accessory',$phone_array)){
           return true;
       }
       return false;
    }
    
    public function updatepart($phone_array)
    {
    	$this->db->where('id',$phone_array['id']);
      if($this->db->update('part',$phone_array)){
           return true;
       }
       return false;
    }
   public function deletephone($id)
  {

    $sql="UPDATE phone set delete_status = 1  WHERE id ='".$id."'";
        if($this->db->query($sql)) {
         
             return true;
         }
          return FALSE;
  }
  public function deleteaccessory($id)
  {

    $sql="UPDATE accessory set delete_status = 1  WHERE id ='".$id."'";
        if($this->db->query($sql)) {
         
             return true;
         }
          return FALSE;
  }
  public function deletepart($id)
  {

    $sql="UPDATE part set delete_status = 1  WHERE id ='".$id."'";
        if($this->db->query($sql)) {
         
             return true;
         }
          return FALSE;
  }
  public function assignphone($id)
  {

    $sql="UPDATE phone set assign = 1  WHERE id ='".$id."'";
        if($this->db->query($sql)) {
         
             return true;
         }
          return FALSE;
  }
  public function assignrphone($id)
  {

    $sql="UPDATE buyphone set assign = 1  WHERE id ='".$id."'";
        if($this->db->query($sql)) {
         
             return true;
         }
          return FALSE;
  }

 }
