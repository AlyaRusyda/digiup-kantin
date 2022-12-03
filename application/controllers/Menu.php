<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Base_Controller.php';

class Menu extends Base_Controller
{

    //field tabel
    var $data = [
        'nama_menu' => '',
        'deskripsi' => '',
        'harga' => '',
        'stok' => '',
        'gambar' => '',
        'id_kantin' => ''
    ];

    //nama model
    var $context = 'menu';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kantin_model', 'kantin');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }

    function form()
    {
        $id = $this->uri->segment(3);
        if ($id) {
            $this->data = $this->menu->find_by_id($id);
        }
        $this->data['kantins'] = $this->kantin->find_all();
        $this->load->view('menu/form', $this->data);
    }

    function save()
    {
        $id = $this->input->post('id');
        $file_name = $this->input->post('gambar');
        $this->form_validation->set_rules('nama_menu', 'nama_menu', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('stok', 'stok', 'required');
        $this->data = [
            'nama_menu' => $this->input->post('nama_menu'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'id_kantin' => $this->input->post('id_kantin')
        ];

        if ($_FILES['gambar']['name'] != "") {
            $config = array(
                'upload_path' => "./assets/uploads/",
                'allowed_types' => "*",
                'remove_space' => TRUE,
                'overwrite' => TRUE,
                'file_name' => "gambar_" . date('YmdHis'),
                'max_size' => "2048000"
            );
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
            } else {
                log_message('ERROR', 'error');
            }
        }
        $this->data['gambar'] = $file_name;
        if ($this->form_validation->run() == FALSE) {
            $this->form();
        } else {
            if ($id == '') {
                $this->menu->insert($this->data);
            } else {
                $this->menu->update($id, $this->data);
            }
            redirect(base_url('menu'));
        }
    }
}
