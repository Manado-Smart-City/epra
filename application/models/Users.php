<?php
class Users extends CI_Model {
  function __construct()
  {
      parent::__construct();
  }

		// Insert registration data in database
		public function registration_insert($data) {
			// Query to check whether username already exist or not
			$condition = "user_id =" . "'" . $data['user_id'] . "'";
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 0) {
				// Query to insert data in database
				$this->db->insert('users', $data);
				if ($this->db->affected_rows() > 0) {
					return true;
				}
			} else {
				return false;
			}
		}

    // Read data using username and password
    public function login($data) {
      $condition = "user_id =" . $data['user_id'] . " AND " . "user_password = " . $data['user_password'] . " AND user_status = 'Aktif'" ;
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() == 1) {
        return true;
      } else {
        return false;
      }
    }

    // Read data from database to show data in admin page
    public function read_user_information($user_id) {
      $condition = "user_id =" . $user_id;
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where($condition);
      $this->db->limit(1);
      $this->db->join('pd', 'pd.kode_pd = users.user_pd');      
      $query = $this->db->get();
      if ($query->num_rows() == 1) {
        return $query->result();
      } else {
        return false;
      }
    }

    public function check_user_password($user_id,$user_password) {
      $condition = "user_id =" . "'" . $user_id . "'";
      $condition = "user_password =" . "'" . $user_password . "'";
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() == 1) {
        return $query->result();
      } else {
        return false;
      }
    }


    // Update data
    public function update_user_data($user_id,$data) {
      $condition = "user_id =" . "'" . $user_id . "'";
      $this->db->where($condition);
      $this->db->update('users',$data);
      if ($this->db->affected_rows() == 1) {
        return TRUE;
      } else {
        return FALSE;
      }
    }

    // remove record
    public function removedata($user_id) {
      $condition = "user_id =" . "'" . $user_id . "'";
      $this->db->where($condition);
      $this->db->delete('users');
      if ($this->db->affected_rows() > 0) {
        return TRUE;
      } else {
        return FALSE;
      }
    }

    // ambil satu record
    public function getdata($user_id) {
      $condition = 'user_id = "' .$user_id.'"';
      $this->db->where($condition);
      $this->db->select('*');
      $query = $this->db->get("users");
      return $query->result();
    }

    // ambil semua record
    public function listdata($offset) {
      $this->db->select('*');
      $query = $this->db->get("users", 10, $offset);
      return $query->result();
    }

    // jumlah data
    public function totaldata() {
      $this->db->from('users');
      $total = $this->db->count_all_results();
      return $total;
    }

}
?>
