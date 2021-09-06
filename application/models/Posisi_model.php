<?php
class Posisi_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('posisi')->result_array();
    }

    public function simpan()
    {
        $data = [
            "nama_pos" => $this->input->post('np')
        ];
        $this->db->insert('posisi', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_pos', $id);
        $this->db->delete('posisi');
    }

    public function get_id($id)
    {
        return $this->db->get_where('posisi', ['id_pos' => $id])->row_array();
    }

    public function ubah()
    {
        $data = [
            "nama_pos" => $this->input->post('np')
        ];
        $this->db->where('id_pos', $this->input->post('kode'));
        $this->db->update('posisi', $data);
    }
}
