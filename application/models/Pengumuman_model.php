<?php
class Pengumuman_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pengumuman by id_pengumuman
     */
    function get_pengumuman($id_pengumuman)
    {
        return $this->db->get_where('pengumuman',array('id_pengumuman'=>$id_pengumuman))->row_array();
    }
        
    /*
     * Get all pengumuman
     */
    function get_all_pengumuman()
    {
        $this->db->order_by('update_tgl', 'desc');

        return $this->db->get('pengumuman')->result_array();
    }
     
    function get_recent_pengumuman()
    {
        $this->db->order_by('update_tgl', 'desc');
        $this->db->limit(5);
        return $this->db->get('pengumuman')->result_array();
    }

    /*
     * function to add new pengumuman
     */
    function add_pengumuman($params)
    {
        $this->db->insert('pengumuman',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pengumuman
     */
    function update_pengumuman($id_pengumuman,$params)
    {
        $this->db->where('id_pengumuman',$id_pengumuman);
        return $this->db->update('pengumuman',$params);
    }
    
    /*
     * function to delete pengumuman
     */
    function delete_pengumuman($id_pengumuman)
    {
        return $this->db->delete('pengumuman',array('id_pengumuman'=>$id_pengumuman));
    }

    /*
     * function to add new log entry 
     */
    function add_log($params)
    {
        $this->db->insert('log_aktifitas',$params);
        return $this->db->insert_id();
    }    
}
?>
