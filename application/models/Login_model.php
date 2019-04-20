<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{
	
	
	public function __construct(){
        parent:: __construct();
    }

    public function login($unm,$pass)
    {
      $this->db->select('*');
      $this->db->from('tbl_admin');
      $this->db->where('email',$unm);
      $this->db->where('password',$pass);
      $this->db->where('delete_status',0);
      $query=$this->db->get();
    return $query->row();
    }
    public function getCompany($id)
    {
      $this->db->select('u.company');
      $this->db->from('course_batch cb');
      $this->db->join('tbl_franchisee tf','tf.id=cb.branch_id');
      $this->db->join('users u','u.id=tf.user_id');
      $this->db->where('cb.batch_id',$id);
      $this->db->order_by('cb.id','desc');
      $query=$this->db->get();
      return $query->result();
    //echo $this->db->last_query(); exit;
    }

    /*
        Add Item data in table
    */
    public function addBatch($batch)
    {

      /*echo "<pre>";
      print_r($batch);exit();*/

    	$sql="INSERT INTO `batch`(`branch_id`,`batch_name`,`short_name`) VALUES (?,?,?)";
       if($this->db->query($sql,$batch)){
           return $this->db->insert_id();
       }
       return false;

    }
  public function editBatch($batch)
  {

    $sql="UPDATE batch set batch_name = ?,short_name=?  WHERE id = ? ";
        if($this->db->query($sql,$batch)) {
         /*echo "string";
         echo $this->db->last_query(); exit;*/
             return true;
         } //echo "123123";
          return FALSE;
  }
  /*
       Delete Item data
    */
  public function deleteItem($del)
  {

    $sql="UPDATE batch set delete_status = ?  WHERE id = ? ";
        if($this->db->query($sql,$del)) {
         
             return true;
         }
          return FALSE;
  }
}
