<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Pp extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pp_model');
        if (!isset($this->session->userdata['logged_in'])) {
            header("Location:" .base_url("login"));
        } 
    } 

    /*
     * Listing of pp
     */
    function index()
    {
        $data['pp'] = $this->Pp_model->get_all_pp();

        $data['_view'] = 'pp/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new pp
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nama_pp' => $this->input->post('nama_pp'),
				'kode_pd' => $this->input->post('kode_pd'),
				'jabat_pp' => $this->input->post('jabat_pp'),
				'foto_pp' => $this->input->post('foto_pp'),
				'update_tgl' => $this->input->post('update_tgl'),
				'update_oleh' => $this->input->post('update_oleh'),
            );
            
            $pp_id = $this->Pp_model->add_pp($params);
            redirect('pp/index');
        }
        else
        {            
            $data['_view'] = 'pp/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a pp
     */
    function edit($nip_pp)
    {   
        // check if the pp exists before trying to edit it
        $data['pp'] = $this->Pp_model->get_pp($nip_pp);
        
        if(isset($data['pp']['nip_pp']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nama_pp' => $this->input->post('nama_pp'),
					'kode_pd' => $this->input->post('kode_pd'),
					'jabat_pp' => $this->input->post('jabat_pp'),
					'foto_pp' => $this->input->post('foto_pp'),
					'update_tgl' => $this->input->post('update_tgl'),
					'update_oleh' => $this->input->post('update_oleh'),
                );

                $this->Pp_model->update_pp($nip_pp,$params);            
                redirect('pp/index');
            }
            else
            {
                $data['_view'] = 'pp/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The pp you are trying to edit does not exist.');
    } 

    /*
     * Deleting pp
     */
    function remove($nip_pp)
    {
        $pp = $this->Pp_model->get_pp($nip_pp);

        // check if the pp exists before trying to delete it
        if(isset($pp['nip_pp']))
        {
            $this->Pp_model->delete_pp($nip_pp);
            redirect('pp/index');
        }
        else
            show_error('The pp you are trying to delete does not exist.');
    }
    
}