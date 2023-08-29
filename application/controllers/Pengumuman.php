<?php
    class Pengumuman extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_model');
        if (!isset($this->session->userdata['logged_in'])) {
            header("Location:" .base_url("login"));
        }         
        //$this->output->enable_profiler(TRUE);
    } 

    /*
     * Listing of matakuliah
     */
    function index()
    {
        $data['pengumuman'] = $this->Pengumuman_model->get_all_pengumuman();
        $data['judul'] = "Pengumuman";        
        $data['_view'] = 'pengumuman/index';
        $this->load->view('layouts/main',$data);

    }

    /*
     * Adding a new pengumuman
     */
    function add()
    {           
        //$this->load->library('form_validation');
		$this->form_validation->set_rules('judul','Judul Pengumuman','required');
		$this->form_validation->set_message('required','{field} harus diisi!');

        if($this->form_validation->run())     
        {   
            $params = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),

                'update_tgl' => date('Y-m-d H:i:s'),
                'update_oleh' => $this->session->userdata['logged_in']['user_id'],
            );            
            $pengumuman_id = $this->Pengumuman_model->add_pengumuman($params);

            // write log
            $params = array(
                'kategori' => "1",
                'aktifitas' => "Data Pengumuman yang baru telah ditambahkan ke database",
                'keterangan' => 'Judul Pengumuman : '.$this->input->post('judul').'<br>'.'Isi Pengumuman : '.$this->input->post('isi').'<br>'.'',
                'waktu' => date('Y-m-d H:i:s'),
                'username' => $this->session->userdata['logged_in']['user_id'],
                'ip_address' => $_SERVER['REMOTE_ADDR'],
            );            
            $this->Pengumuman_model->add_log($params);
            
            redirect('pengumuman/index');
        }
        else
        {            
            $data['judul'] = "Pengumuman";
            $data['_view'] = 'pengumuman/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Viewing a pengumuman
     */
    function view($id_pengumuman)
    {   
        // check if the pengumuman exists before trying to view it
        $data['pengumuman'] = $this->Pengumuman_model->get_pengumuman($id_pengumuman);
        
        if(isset($data['pengumuman']['id_pengumuman']))
        {
            $data['judul'] = "Pengumuman";
            $data['_view'] = 'pengumuman/view';
            $this->load->view('layouts/main',$data);
        }
        else
            show_error('Data pengumuman yang ingin anda tampilkan tidak ditemukan.');
    }
    
    /*
     * Editing a pengumuman
     */
    function edit($id_pengumuman)
    {   
        // check if the matakuliah exists before trying to edit it
        $data['pengumuman'] = $this->Pengumuman_model->get_pengumuman($id_pengumuman);
        
        if(isset($data['pengumuman']['id_pengumuman']))
        {
            
		$this->form_validation->set_rules('judul','Judul Pengumuman','required');
		$this->form_validation->set_message('required','{field} harus diisi!');
   
        if($this->form_validation->run())     
            {   
                $params = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),

                'update_tgl' => date('Y-m-d H:i:s'),
                'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                );
                $this->Pengumuman_model->update_pengumuman($id_pengumuman,$params);            

                // write log
                $params = array(
                    'kategori' => "1",
                    'aktifitas' => "Data Pengumuman telah diedit",
                    'keterangan' => "ID: $id_pengumuman",
                    'waktu' => date('Y-m-d H:i:s'),
                    'username' => $this->session->userdata['logged_in']['user_id'],
                    'ip_address' => $_SERVER['REMOTE_ADDR'],
                );            
                $this->Pengumuman_model->add_log($params);

                redirect('pengumuman/index');
            }
            else
            {
                $data['judul'] = "Pengumuman";
                $data['_view'] = 'pengumuman/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('Data pengumuman yang ingin anda edit tidak ditemukan.');
    } 

    /*
     * Deleting matakuliah
     */
    function remove($id_pengumuman)
    {
        $pengumuman = $this->Pengumuman_model->get_pengumuman($id_pengumuman);

        // check if the pengumuman exists before trying to delete it
        if(isset($pengumuman['id_pengumuman']))
        {
            $this->Pengumuman_model->delete_pengumuman($pengumuman['id_pengumuman']);
            // write log
            $params = array(
                'kategori' => "1",
                'aktifitas' => "Data Pengumuman telah dihapus",
                'keterangan' => "ID: $id_pengumuman",
                'waktu' => date('Y-m-d H:i:s'),
                'username' => $this->session->userdata['logged_in']['user_id'],
                'ip_address' => $_SERVER['REMOTE_ADDR'],
            );            
            $this->Pengumuman_model->add_log($params);
            redirect('pengumuman/index');
        }
        else
            show_error('Data pengumuman yang ingin anda hapus tidak ditemukan.');
    }
    
}

?>
