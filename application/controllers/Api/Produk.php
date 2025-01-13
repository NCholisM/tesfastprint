<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        $this->load->model('Status_model');
    }

    private function output_json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    // GET: /api/produk
    public function index()
    {
        $produk = $this->Produk_model->get_produk_api();
        $this->output_json(['status' => 'success', 'data' => $produk]);
    }

    // GET: /api/produk/{id}
    public function view($id)
    {
        $produk = $this->Produk_model->get_produk_by_id($id);
        if ($produk) {
            $this->output_json(['status' => 'success', 'data' => $produk]);
        } else {
            $this->output_json(['status' => 'error', 'message' => 'Produk not found']);
        }
    }

    // POST: /api/produk
    public function create()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['nama_produk']) || !isset($data['harga']) || !isset($data['kategori_id']) || !isset($data['status_id'])) {
            $this->output_json(['status' => 'error', 'message' => 'Invalid input']);
            return;
        }

        $insert_id = $this->Produk_model->insert_produk($data);
        if ($insert_id) {
            $this->output_json(['status' => 'success', 'message' => 'Produk created successfully']);
        } else {
            $this->output_json(['status' => 'error', 'message' => 'Failed to create produk']);
        }
    }

    // PUT: /api/produk/{id}
    public function update($id)
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['nama_produk']) || !isset($data['harga']) || !isset($data['kategori_id']) || !isset($data['status_id'])) {
            $this->output_json(['status' => 'error', 'message' => 'Invalid input']);
            return;
        }

        $updated = $this->Produk_model->update_produk($id, $data);
        if ($updated) {
            $this->output_json(['status' => 'success', 'message' => 'Produk updated successfully']);
        } else {
            $this->output_json(['status' => 'error', 'message' => 'Failed to update produk']);
        }
    }

    // DELETE: /api/produk/{id}
    public function delete($id)
    {
        $deleted = $this->Produk_model->delete_produk($id);
        if ($deleted) {
            $this->output_json(['status' => 'success', 'message' => 'Produk deleted successfully']);
        } else {
            $this->output_json(['status' => 'error', 'message' => 'Failed to delete produk']);
        }
    }
}
