<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pd_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pd by kode_pd
     */
    function get_pd($kode_pd)
    {
        return $this->db->get_where('pd',array('kode_pd'=>$kode_pd))->row_array();
    }
    
    function get_pd_box($kode_pd)
    {
      $sql = '
        SELECT
            a.kode_pd,
            a.nama_pd,
            a.alamat_pd,
            a.nip_kepala,
            b.nama_p AS nama_kepala,
            IF(b.foto_p IS NOT NULL AND b.foto_p <>"",b.foto_p,"no-pict.jpg") AS foto_kepala,
            b.hp_p AS hp_kepala,
            b.jabat_p AS jabatan_kepala,
            (
                SELECT SUM(a.pagu_giat) FROM belanja AS a 
                JOIN kegiatan AS b ON a.kode_giat = b.kode_giat
                JOIN program AS c ON b.kode_prog = c.kode_prog
                WHERE c.kode_pd = "'.$kode_pd.'"       
            ) AS total_anggaran,       
            b.jabat_p AS jabatan_kepala,
            (
                SELECT SUM(a.pagu_giat) FROM belanja AS a 
                JOIN kegiatan AS b ON a.kode_giat = b.kode_giat
                JOIN program AS c ON b.kode_prog = c.kode_prog
                JOIN pd AS d ON c.kode_pd = d.kode_pd
                WHERE c.kode_pd = "'.$kode_pd.'" AND 
                (c.kode_prog <> d.kode_prog_btl OR d.kode_prog_btl="" OR d.kode_prog_btl IS NULL)     
            ) AS total_anggaran_bl,
            (
                SELECT SUM(a.pagu_giat) FROM belanja AS a 
                JOIN kegiatan AS b ON a.kode_giat = b.kode_giat
                JOIN program AS c ON b.kode_prog = c.kode_prog
                JOIN pd AS d ON c.kode_pd = d.kode_pd
                WHERE c.kode_pd = "'.$kode_pd.'" AND 
                c.kode_prog = d.kode_prog_btl      
            ) AS total_anggaran_btl                     
        FROM pd AS a
        LEFT JOIN pejabat AS b ON a.nip_kepala = b.nip_p
        WHERE a.kode_pd = "'.$kode_pd.'"';
      $query = $this->db->query($sql);
      return $query->result()[0];
    }

    /*
     * Get all pd
     */
    function get_all_pd()
    {
        return $this->db->get('pd')->result_array();
    }
    
    /*
     * function to add new pd
     */
    function add_pd($params)
    {
        $this->db->insert('pd',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pd
     */
    function update_pd($kode_pd,$params)
    {
        $this->db->where('kode_pd',$kode_pd);
        $response = $this->db->update('pd',$params);
        if($response)
        {
            return "pd updated successfully";
        }
        else
        {
            return "Error occuring while updating pd";
        }
    }
    
    /*
     * function to delete pd
     */
    function delete_pd($kode_pd)
    {
        $response = $this->db->delete('pd',array('kode_pd'=>$kode_pd));
        if($response)
        {
            return "pd deleted successfully";
        }
        else
        {
            return "Error occuring while deleting pd";
        }
    }

    public function do_upload()
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $this->load->view('upload_success', $data);
            }
    }    
    
}
