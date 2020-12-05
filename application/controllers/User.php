<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index()
    {
        $data['judul'] = "List Pasien";
        $data['users'] = $this->User_model->getAllUser();
        if ($this->input->post('keyword')) {
            $data['users'] = $this->User_model->cariUser();
        }
        $this->load->view('template/header', $data);
        $this->load->view('klinik/user', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $this->User_model->hapusUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('user');
    }

    public function getEdit()
    {
        echo json_encode($this->User_model->getUserById($_POST['id']));
    }

    public function edit()
    {
        $data['judul'] = "Data User";
        $id = $this->input->post('id_user', true);
        $username = $this->input->post('username', true);
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $this->User_model->editUser($id, $username, $email, $password);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('user');
    }
}
