<?php
    class Config extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model');
        $this->output->enable_profiler(TRUE);
    } 

    /*
     * Listing of matakuliah
     */
    function index($id_config = 1)
    {
        // check if the matakuliah exists before trying to edit it
        $data['config'] = $this->Config_model->get_config($id_config);
        
        if(isset($data['config']['id_config']))
        {
            
        $this->form_validation->set_rules('ukuran_file_upload','Ukuran File Upload','required');
        $this->form_validation->set_rules('tahun_anggaran','Tahun Anggaran','required');
        $this->form_validation->set_message('required','{field} harus diisi!');
   
        if($this->form_validation->run())     
            {   
                $params = array(
                'ukuran_file_upload' => $this->input->post('ukuran_file_upload'),
                'tahun_anggaran' => $this->input->post('tahun_anggaran'),
                'bulan_ini' => $this->input->post('bulan_ini'),
                'running_text' => $this->input->post('running_text'),

                'update_tgl' => date('Y-m-d H:i:s'),
                'update_oleh' => $this->session->userdata['logged_in']['user_id'],
                );
                $this->Config_model->update_config($id_config,$params);            
                redirect('config/index');
            }
            else
            {
                $data['judul'] = "Konfigurasi Aplikasi";
                $data['_view'] = 'config/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('Data config yang ingin anda edit tidak ditemukan.');

    }
    
}

?>
