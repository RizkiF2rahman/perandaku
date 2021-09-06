<?php
class Pegawai_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('v_pegawai')->result_array();
    }

    public function no_otomatis()
    {
        $this->db->select('id_peg');
        $this->db->order_by('id_peg DESC');
        return $this->db->get('pegawai')->result_array();
    }

    public function simpan()
    {
        $data = [
            "nama_peg" => $this->input->post('nm_peg'),
            "jenis_kel" => $this->input->post('jkl'),
            "agama" => $this->input->post('agama'),
            "alamat" => $this->input->post('alamat'),
            "notelp" => $this->input->post('nt'),
            "id_ps" => $this->input->post('ps'),
        ];
        $this->db->insert('pegawai', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_peg', $id);
        $this->db->delete('pegawai');
    }

    public function get_id($id)
    {
        return $this->db->get_where('v_pegawai', ['id_peg' => $id])->row_array();
    }

    public function update()
    {
        $data = [
            "nama_peg" => $this->input->post('nm_peg'),
            "jenis_kel" => $this->input->post('jkl'),
            "agama" => $this->input->post('agama'),
            "alamat" => $this->input->post('alamat'),
            "notelp" => $this->input->post('nt'),
            "id_ps" => $this->input->post('ps'),
        ];
        $this->db->where('id_peg', $this->input->post('kd_pg'));
        $this->db->update('pegawai', $data);
    }
}
