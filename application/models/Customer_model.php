<?php

class Customer_model extends CI_Model
{
    
    public function tampil_data()
    {
        return $this->db->get('customer')->result_array();
    }

    public function simpan()
    {
        $data = [
            "nama" => $this->input->post('na'),
            "no_telp" => $this->input->post('nt'),
            "alamat" => $this->input->post('al'),
        ];

        $this->db->insert('customer', $data);
    }
    public function hapus($id_customer)
    {
        $this->db->where('id_customer', $id_customer);
        $this->db->delete('customer');
    }

    public function get_id($id_customer)
    {
        return $this->db->get_where('customer', ['id_customer' => $id_customer])->row_array();
    }

    public function update()
    {
        $data = [
            "nama" => $this->input->post('na'),
            "no_telp" => $this->input->post('nt'),
            "alamat" => $this->input->post('al'),
        ];
        $this->db->where('id_customer', $this->input->post('kode'));
        $this->db->update('customer', $data);
    }
}
