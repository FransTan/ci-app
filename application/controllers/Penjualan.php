<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');      
    }
      
      public function index()
      {
        $data['title'] = "Penjualan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->db->get('produk_jenis')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penjualan/index', $data);
      }
      
    public function showKategori($jenis) 
    {
      $data['title'] = "Penjualan";
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $dataKategori = $this->menu_model->getKategori($jenis);
      $data['kategori'] = $dataKategori;
      
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('penjualan/kategori', $data);
    }
          
    public function showProduk($kategori) 
    {
      $data['title'] = "Penjualan";
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $dataProduk = $this->menu_model->getProduk($kategori);
      $data['produk'] = $dataProduk;
      
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('penjualan/produk', $data);
    }

    public function insertToCart($id) 
    {
      $item = $this->menu_model->getProdukById($id);

      $data = [
        'id' => $item[0]['id'],
        'qty' => 1,
        'price' => $item[0]['harga'],
        'name' => $item[0]['produk']
      ];

      $this->cart->insert($data);

      redirect('penjualan/showProduk/'.$item[0]['kategori']);
    }

    public function detailCart() 
    {
      $data['title'] = "Detail Penjualan";
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('penjualan/keranjang', $data);
      $this->load->view('templates/footer', $data);
    }

    public function deleteCart()
    {
      $this->cart->destroy();
      redirect(base_url('penjualan/detailCart/'));
    }

    public function pembayaranProduk()
    {
      $data['title'] = "Pembayaran";
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('penjualan/pembayaran', $data);
      $this->load->view('templates/footer', $data);
    }

    public function checkout()
    {
      $data = [
        'metode' => $this->input->post('metode'),
      ];

      // var_dump($data);
      var_dump($this->cart->contents());
    }

    public function showSuccess()
    {
      $data['title'] = "";
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('penjualan/success', $data);
    }

    public function deleteCartSuccess()
    {
      $this->cart->destroy();
      redirect(base_url('penjualan'));
    }
}
