<?php
class Kategori_model extends CI_Model
{
    // Mengambil semua data kategori
    function get_all_kategori()
    {
        $this->db->order_by('nama_kategori', 'ASC'); // Mengurutkan kategori secara alfabet
        $query = $this->db->get('kategori');
        return $query->result();
    }
}
