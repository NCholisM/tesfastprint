<?php
class Status_model extends CI_Model
{
    // Mengambil semua data status
    function get_all_status()
    {
        $this->db->order_by('nama_status', 'ASC'); // Mengurutkan status secara alfabet
        $query = $this->db->get('status');
        return $query->result();
    }
}
