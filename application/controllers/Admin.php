<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('menu_model');
        $this->load->model('invoice_model');
        $this->load->helper('url');   
    }

    public function index()
    {
        //load library pagination
        $this->load->library('pagination');
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $total_record = $this->menu_model->get_total_invoice();
        $limit_per_page = 7;

        if ($total_record > 0) {

            $data['invoice'] = $this->invoice_model->showData($limit_per_page, $page);
            $config['base_url'] = base_url() . "admin";
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
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu_model->addRole();
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                New Role successfull added!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');

            redirect('admin/role');
        }
    }

    public function delete($id)
    {
        $this->menu_model->deleteRole($id);
        $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Role has been deleted!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ');
        redirect('admin/role');
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
    
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function roleupdate($id)
    {
        $this->menu_model->updateRole($id);

        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                User role successfully updated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ');

        redirect('admin/role');
    }

    public function roleadd()
    {   
        $this->menu_model->addRole();
    }
}
