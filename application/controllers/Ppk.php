<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Ppk extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ppk_model');
        if (!isset($this->session->userdata['logged_in'])) {
            header("Location:" .base_url("login"));
        }         
    } 

    /*
     * Listing of ppk
     */
    function index()
    {
        $data['ppk'] = $this->Ppk_model->get_all_ppk();

        $data['_view'] = 'ppk/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new ppk
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nama_ppk' => $this->input->post('nama_ppk'),
				'kode_pd' => $this->input->post('kode_pd'),
				'jabat_ppk' => $this->input->post('jabat_ppk'),
				'foto_ppk' => $this->input->post('foto_ppk'),
				'update_tgl' => $this->input->post('update_tgl'),
				'update_oleh' => $this->input->post('update_oleh'),
            );
            
            $ppk_id = $this->Ppk_model->add_ppk($params);
            redirect('ppk/index');
        }
        else
        {            
            $data['_view'] = 'ppk/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a ppk
     */
    function edit($nip_ppk)
    {   
        // check if the ppk exists before trying to edit it
        $data['ppk'] = $this->Ppk_model->get_ppk($nip_ppk);
        
        if(isset($data['ppk']['nip_ppk']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nama_ppk' => $this->input->post('nama_ppk'),
					'kode_pd' => $this->input->post('kode_pd'),
					'jabat_ppk' => $this->input->post('jabat_ppk'),
					'foto_ppk' => $this->input->post('foto_ppk'),
					'update_tgl' => $this->input->post('update_tgl'),
					'update_oleh' => $this->input->post('update_oleh'),
                );

                $this->Ppk_model->update_ppk($nip_ppk,$params);            
                redirect('ppk/index');
            }
            else
            {
                $data['_view'] = 'ppk/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The ppk you are trying to edit does not exist.');
    } 

    /*
     * Deleting ppk
     */
    function remove($nip_ppk)
    {
        $ppk = $this->Ppk_model->get_ppk($nip_ppk);

        // check if the ppk exists before trying to delete it
        if(isset($ppk['nip_ppk']))
        {
            $this->Ppk_model->delete_ppk($nip_ppk);
            redirect('ppk/index');
        }
        else
            show_error('The ppk you are trying to delete does not exist.');
    }
    
}