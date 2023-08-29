<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Load database
		$this->load->model('Users');
		$this->load->model('Config_model');
	}
	// Show login page
	public function index() {
		$this->load->view('login');
	}
  // ===============================================================================================================
	// Check for user login process
	public function user_login_process() {
		$this->form_validation->set_rules('user_id', 'UserID', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required|alpha_numeric|md5');
		if ($this->form_validation->run()) {
			$data = array(
				'user_id' => $this->db->escape($this->input->post('user_id')),
				'user_password' => $this->db->escape($this->input->post('user_password'))
			);
			$result = $this->Users->login($data);
			// jika pasangan userid dan password benar
			if ($result == TRUE) {
				$user_id = $this->db->escape($this->input->post('user_id'));
				$result = $this->Users->read_user_information($user_id);
				$config = $this->Config_model->get_config(1);
				if ($result != false) {
					// Update database
					$data_user = array(
						'last_login' => date('Y-m-d H:i:s'),
						'login_from' => $_SERVER['REMOTE_ADDR']
					);
					$this->Users->update_user_data($result[0]->user_id,$data_user);
					// Add user data in session
					$session_data = array(
						'user_id' => $result[0]->user_id,
						'user_name' => $result[0]->user_name,
						'user_email' => $result[0]->user_email,
						'user_role' => $result[0]->user_role,
						'user_photo' => $result[0]->user_photo,
						'user_pd' => $result[0]->user_pd,
						'user_nama_pd' => $result[0]->nama_pd,
						'user_kode_prog_btl' => $result[0]->kode_prog_btl,
						'user_kode_giat_btl' => $result[0]->kode_giat_btl,
						'ukuran_file_upload' => $config["ukuran_file_upload"],
						'tahun_anggaran' => $config["tahun_anggaran"],				
						'bulan_ini' => $config["bulan_ini"],				
						'tahun_ini' => $config["tahun_ini"],												
					);
					$this->session->set_userdata('logged_in', $session_data);
					//$this->load->view('home');
					header("Location:" .base_url("beranda"));
				}			
			} 
		}
		$data = array(
			'message_display' => 'Salah UserID atau Password!'
		);
		//$this->load->view('beranda', $data);
		header("Location:" .base_url("beranda"));
	}
	// ===============================================================================================================
	// Logout from admin page
	public function logout() {
		// Removing session data
		$sess_array = array(
			'user_id' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Anda telah Logout dari sistem. Terimakasih.';
		//$this->load->view('beranda', $data);
		header("Location:" .base_url("beranda"));
	}


}
