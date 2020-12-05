<?php

class User_model extends CI_model
{
    public function getAllUser()
    {
        return $this->db->get('users')->result_array();
    }

    public function hapusUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('users');
    }

    public function getUserById($id)
    {
        return $this->db->get_where('users', ['id_user' => $id])->row_array();
    }

    public function editUser($id, $username, $email, $password)
    {
        $edit = $this->db->query("UPDATE users SET username='$username', email='$email', password='$password' WHERE id_user='$id'");
        return $edit;
    }

    public function cariUser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('username', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('users')->result_array();
    }
}
