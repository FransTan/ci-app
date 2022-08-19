<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('invoice_model');      
    }

    public function index()
    {
      //pindah ke admin (index)
    }
    
    public function insertDataPembelian()
    {
      $this->invoice_model->insertData();

      redirect(base_url("penjualan/showSuccess"));
    }

    public function detailInvoice($id)
    {
      $data['title'] = 'Detail pesanan';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['invoice'] = $this->invoice_model->getIdInvoice($id);
      $data['source'] = $this->invoice_model->getIdPembelian($id);
      $arraydata = json_decode(json_encode($data['source']), true);
      $data['pembelian'] = $arraydata;

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/detail_invoice', $data);
      $this->load->view('templates/footer');
    }
}