<?php
class Produk_model extends CI_Model
{
    // Tampil Data 
    function get_produk()
    {
        $this->db->select('p.*, k.nama_kategori, s.nama_status');
        $this->db->from('produk as p');
        $this->db->join('kategori as k', 'p.kategori_id = k.id_kategori', 'inner');
        $this->db->join('status as s', 'p.status_id = s.id_status', 'inner');
        $this->db->where('s.nama_status', 'Bisa Dijual');
        $this->db->order_by('p.id_produk', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    // Tampil Data API
    function get_produk_api()
    {
        $query = $this->db->get('produk');
        return $query->result_array();
    }

    // Tambah Data
    function insert_produk($data)
    {
        $this->db->insert('produk', $data);
        return $this->db->insert_id(); // Mengembalikan ID yang baru dimasukkan
    }

    // Mengambil data produk berdasarkan ID
    function get_produk_by_id($id)
    {
        $this->db->where('id_produk', $id);
        $query = $this->db->get('produk');
        return $query->row();
    }

    // Update data produk
    function update_produk($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
        return $this->db->affected_rows();
    }

    // Hapus produk berdasarkan ID
    function delete_produk($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
        return $this->db->affected_rows();
    }
}
