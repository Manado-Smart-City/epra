<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get user by user_id
     */
    function get_user($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('pd', 'pd.kode_pd = users.user_pd');
        $this->db->where(array('user_id'=>$user_id));
        return $this->db->get()->row_array();
        //return $this->db->get_where('users',array('user_id'=>$user_id))->row_array();
    }

    /*
     * Get all user
     */
    function get_all_user()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('pd', 'pd.kode_pd = users.user_pd');
        return $this->db->get()->result_array();
    }

    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('users',$params);
        return $this->db->insert_id();
    }

    /*
     * function to uuserate user
     */
    function update_user($user_id,$params)
    {
        $this->db->where('user_id',$user_id);
        $response = $this->db->update('users',$params);
        if($response)
        {
            return "user updated successfully";
        }
        else
        {
            return "Error occuring while updated user";
        }
    }

    /*
     * function to delete user
     */
    function delete_user($user_id)
    {
        $response = $this->db->delete('users',array('user_id'=>$user_id));
        if($response)
        {
            return "user deleted successfully";
        }
        else
        {
            return "Error occuring while deleting user";
        }
    }

    function check_duplicate($user_id)
    {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where(array('user_id'=>$user_id));
      $query = $this->db->get();
      $count_row = $query->num_rows();
      if ($count_row > 0) {
          return FALSE;
       } else {
          return TRUE;
       }
    }

}
