<?php

class menu_model extends CI_Model 
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` FROM `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";

        return $this->db->query($query)->result_array();
    }

    public function getMenubyID($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function addMenu()
    {   
        $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

        $max_id = $this->db->query("SELECT MAX(id) FROM user_menu")->result_array();

        $this->db->insert('user_access_menu', ['role_id' =>  $this->session->userdata('role_id'), 'menu_id' => $max_id[0]["MAX(id)"]]);
    }

    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu'); 
    }

    public function UpdateMenu($id)
    {
        $data = [
            "menu" => $this->input->post('menu', true)
        ];

        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
    }

    public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }

    public function updateSubMenu($id)
    {
        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];

        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
    }

    public function deleteRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }


    public function updateRole($id) 
    {
        $data = [
            "role" => $this->input->post('Role', true)
        ];

        $this->db->where('id', $id);
        $this->db->update('user_role', $data);
    }

    public function addRole()
    {
        $data = [
            'role' => $this->input->post('role')
        ];

        $this->db->insert('user_role', $data);
    }

    public function showProductList($limit, $start)
    {
        $query = $this->db->query('set @row_number = '.$start+1);
        $this->db->limit($limit, $start);
        $query = $this->db->get('produk_list');

        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $data[] = $row;
            }

            return $data;
        }
        return false;

        // return $query->result_array();
        // return $this->db->query($query)->result_array();
    }

    public function addProduk()
    {
        $data = [
            'jenis' => $this->input->post('jenis'),
            'kategori' => $this->input->post('kategori'),
            'produk' => $this->input->post('produk'),
            'harga' => $this->input->post('harga')
        ];

        $this->db->insert('produk_list', $data);
    }
    
    public function deleteProduk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('produk_list');
    }

    public function updateProduk($id)
    {
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
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

                $this->db->where('id', $id);
                $this->db->update('produk_list', $data);
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    function get_total()
    {
        //select * from mahasiswa -> dihitung CI jumlah rows
        // return $this->db->get('mahasiswa')->num_rows();

        return $this->db->count_all('produk_list');
    }

    public function addKategori()
    {
        $data = [
            'jenis' => $this->input->post('jenis'),
            'kategori' => $this->input->post('kategori')
        ];

        $this->db->insert('produk_kategori', $data);
    }

    public function deleteKategori($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('produk_kategori');
    }

    public function UpdateKategori($id)
    {
        $data = [
            'jenis' => $this->input->post('jenis', true),
            'kategori' => $this->input->post('kategori', true)
        ];

        $this->db->where('id', $id);
        $this->db->update('produk_kategori', $data);
    }

    public function getKategori($jenis) 
    {
        return $this->db->get_where('produk_kategori', ['jenis' => $jenis])->result_array();   
    }

    public function getProduk($kategori)
    {
        return $this->db->get_where('produk_list', ['kategori' => $kategori])->result_array();
    }

    public function getProdukById($id)
    {
        return $this->db->get_where('produk_list', ['id' => $id])->result_array();
    }

    function get_total_invoice()
    {
        //select * from mahasiswa -> dihitung CI jumlah rows
        // return $this->db->get('mahasiswa')->num_rows();

        return $this->db->count_all('invoice');
    }
}
?>