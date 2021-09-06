<?php
class Produk_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('produk')->result_array();
    }

    public function simpan()
    {
        $data = [
            "nama_pro" => $this->input->post('np'),
            "harga" => $this->input->post('hrg')
        ];
        $this->db->insert('produk', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_pro', $id);
        $this->db->delete('produk');
    }

    public function get_id($id)
    {
        return $this->db->get_where('produk', ['id_pro' => $id])->row_array();
    }
    
    public function update()
    {
        $data = [
            "nama_pro" => $this->input->post('np'),
            "harga" => $this->input->post('hrg')
        ];
        $this->db->where('id_pro', $this->input->post('kode'));
        $this->db->update('produk', $data);
    }
}
