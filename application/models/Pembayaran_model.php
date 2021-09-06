<?php
class Pembayaran_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('pembayaran')->result_array();
    }

    public function simpan()
    {
        $data = [
            "transaksi" => $this->input->post('tr')
        ];
        $this->db->insert('pembayaran', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_pembayaran', $id);
        $this->db->delete('pembayaran');
    }

    public function get_id($id)
    {
        return $this->db->get_where('pembayaran', ['id_pembayaran' => $id])->row_array();
    }

    public function update()
    {
        $data = [
            "transaksi" => $this->input->post('tr')
        ];
        $this->db->where('id_pembayaran', $this->input->post('kode'));
        $this->db->update('pembayaran', $data);
    }
}
