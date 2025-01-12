<?php
class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('status_model');
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', 'Tidak boleh kosong');
        $this->form_validation->set_message('numeric', 'Harus angka');
    }
    // Tampil Data 
    function index()
    {
        $data['produk'] = $this->produk_model->get_produk();
        $this->load->view('produk/index', $data);
    }
    // Form Tambah Data
    function create()
    {
        $data['kategori'] = $this->kategori_model->get_all_kategori();
        $data['status'] = $this->status_model->get_all_status();
        $this->load->view('produk/create', $data);
    }

    // Proses Simpan Data tanpa validasi
    // function store()
    // {
    //     $data = [
    //         'nama_produk' => $this->input->post('nama_produk'),
    //         'harga' => $this->input->post('harga'),
    //         'kategori_id' => $this->input->post('kategori_id'),
    //         'status_id' => $this->input->post('status_id'),
    //     ];

    //     $this->produk_model->insert_produk($data);
    //     redirect('produk');
    // }

    // Proses Simpan Data
    function store()
    {
        // Validasi input
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form tambah
            $data['kategori'] = $this->kategori_model->get_all_kategori();
            $data['status'] = $this->status_model->get_all_status();
            $this->load->view('produk/create', $data);
        } else {
            // Jika validasi berhasil
            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'kategori_id' => $this->input->post('kategori_id'),
                'status_id' => $this->input->post('status_id'),
            ];

            $this->produk_model->insert_produk($data);
            redirect('produk');
        }
    }

    // Form Edit Data
    function edit($id)
    {
        $data['produk'] = $this->produk_model->get_produk_by_id($id);
        $data['kategori'] = $this->kategori_model->get_all_kategori();
        $data['status'] = $this->status_model->get_all_status();
        $this->load->view('produk/edit', $data);
    }

    // Proses Update Data tanpa validasi
    // function update($id)
    // {
    //     $data = [
    //         'nama_produk' => $this->input->post('nama_produk'),
    //         'harga' => $this->input->post('harga'),
    //         'kategori_id' => $this->input->post('kategori_id'),
    //         'status_id' => $this->input->post('status_id'),
    //     ];

    //     $this->produk_model->update_produk($id, $data);
    //     redirect('produk');
    // }

    // Proses Update Data
    function update($id)
    {
        // Validasi input
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form edit
            $data['produk'] = $this->produk_model->get_produk_by_id($id);
            $data['kategori'] = $this->kategori_model->get_all_kategori();
            $data['status'] = $this->status_model->get_all_status();
            $this->load->view('produk/edit', $data);
        } else {
            // Jika validasi berhasil
            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'kategori_id' => $this->input->post('kategori_id'),
                'status_id' => $this->input->post('status_id'),
            ];

            $this->produk_model->update_produk($id, $data);
            redirect('produk');
        }
    }

    // Proses Hapus Data
    function delete($id)
    {
        $this->produk_model->delete_produk($id);
        redirect('produk');
    }
}
