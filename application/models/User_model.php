<?php
class User_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('user')->result_array();
    }

    public function simpan($pict)
    {
        $data =
            [
                "nama_user" => $this->input->post('nu'),
                "username" => $this->input->post('un'),
                "password" => sha1($this->input->post('pass1')),
                "level" => $this->input->post('level'),
                "foto" => $pict
            ];
        $this->db->insert('user', $data);
    }

    public function hapus($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }

    public function get_id($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }

    public function ubah($pict)
    {
        $data =
            [
                "nama_user" => $this->input->post('nu'),
                "username" => $this->input->post('un'),
                "level" => $this->input->post('level'),
                "foto" => $pict
            ];

        $this->db->where('id_user', $this->input->post('kode'));
        $this->db->update('user', $data);
    }

    public function ubah_pass()
    {
        $data =
            [
                "password" => sha1($this->input->post('pass1')),
            ];
        $this->db->where('id_user', $this->input->post('us'));
        $this->db->update('user', $data);
    }

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['user_name']);
        $this->db->where('password', sha1($post['pass']));
        return $this->db->get();
    }

    public function get($id)
    //1 fungsi untuk menampilkan semua data
    //dan menampilkan data berdasrakan id (satu data)
    {
        $this->db->select('*');
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        return $this->db->get();
    }
}
