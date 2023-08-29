<?php
class Config_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get config by id_config
     */
    function get_config($id_config)
    {
        return $this->db->get_where('config',array('id_config'=>$id_config))->row_array();
    }
        
    /*
     * Get all config
     */
    function get_all_config()
    {
        $this->db->order_by('update_tgl', 'desc');

        return $this->db->get('config')->result_array();
    }
        
    /*
     * function to add new config
     */
    function add_config($params)
    {
        $this->db->insert('config',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update config
     */
    function update_config($id_config,$params)
    {
        $this->db->where('id_config',$id_config);
        return $this->db->update('config',$params);
    }
    
    /*
     * function to delete config
     */
    function delete_config($id_config)
    {
        return $this->db->delete('config',array('id_config'=>$id_config));
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
