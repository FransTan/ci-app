<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('menu_model');
    $this->load->helper('url');
  }

  public function index ()
  {
    //load library pagination
    $this->load->library('pagination');
    $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
    $total_record = $this->menu_model->get_total();
    $limit_per_page = 3;

    //siapakan konfigurasi untuk pagination
    if ($total_record > 0){

      $data['produk'] = $this->menu_model->showProductList($limit_per_page, $page);
      $config['base_url'] = base_url() . "produk";
      $config['total_rows'] = $total_record;
      $config['per_page'] = $limit_per_page;
      $config['uri_segment'] = 2;


      // add boostrap class and styles
      $config['full_tag_open'] = '<ul class="pagination justify-content-end">';
      $config['full_tag_close'] = '</ul>';
      $config['first_link'] = 'First';
      $config['last_link'] = 'Last';
      $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
      $config['first_tag_close'] = '</span></li>';
      $config['prev_link'] = '&laquo';
      $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
      $config['prev_tag_close'] = '</span></li>';
      $config['next_link'] = '&raquo';
      $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
      $config['next_tag_close'] = '</span></li>';
      $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
      $config['last_tag_close'] = '</span></li>';
      $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close'] = '</span></li>';

      $this->pagination->initialize($config);
      $data["links"] = $this->pagination->create_links();
    }

    //tampilkan data
    $data['start'] = $this->uri->segment(2);
    $data['title'] = "Produk";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kategori'] = $this->db->get('produk_kategori')->result_array();
    $data['jenis'] = $this->db->get('produk_jenis')->result_array();

    $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');

    if ($this->form_validation->run() == false) {
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('produk/index', $data);
    $this->load->view('templates/footer');
    } else {
      // cek jika ada gambar yang akan diupload
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '5256';
        $config['upload_path'] = './assets/img/produk';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $data = [
            'image' => $this->upload->data('file_name'),
            'jenis' => $this->input->post('jenis'),
            'kategori' => $this->input->post('kategori'),
            'produk' => $this->input->post('produk'),
            'harga' => $this->input->post('harga')
          ];
          $this->db->insert('produk_list', $data);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->session->set_flashdata('message', '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              Produk Baru Berhasil Ditambahkan!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
      ');

      redirect('produk');
    }
  }

  public function edit($id)
  {
    $this->menu_model->updateProduk($id);

    $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Produk Berhasil Dirubah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ');

    redirect('produk');
  }

  public function delete($id)
  {
    $this->menu_model->deleteProduk($id);
    $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Produk Berhasil Dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ');
    redirect('produk');
  }

  public function kategori()
  {
    $data['title'] = 'Kategori';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['jenis'] = $this->db->get('produk_jenis')->result_array();
    $data['kategori'] = $this->db->get('produk_kategori')->result_array();

    $this->form_validation->set_rules('kategori', 'kategori', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('produk/kategori', $data);
      $this->load->view('templates/footer');
    } else {
      $this->menu_model->addKategori();
      $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Kategori Baru Berhasil Ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');

      redirect('produk/kategori');
    }
  }

  public function deleteKategori($id)
  {
    $this->menu_model->deleteKategori($id);
    $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Kategori Produk Berhasil Dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ');
    redirect('produk/kategori');
  }

  public function updateKategori($id)
  {
    $this->menu_model->UpdateKategori($id);

    $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Kategori Produk Berhasil Diubah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ');

    redirect('produk/kategori');
  }
}