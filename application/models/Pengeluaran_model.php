<?php
class Pengeluaran_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('v_keluar')->result_array();
    }

    public function no_otomatis()
    {
        $this->db->select('nofaktur_pg');
        $this->db->order_by('nofaktur_pg DESC');
        return $this->db->get('pengeluaran')->result_array();
    }

    public function simpan()
    {
        $data = [
            "nofaktur_pg" => $this->input->post('nofaktur'),
            "id_kategori" => $this->input->post('kt'),
            "uraian" => $this->input->post('uraian') == '' ? "Tidak Ada Catatan" : $this->input->post('uraian'),
            "tanggal" => $this->input->post('tgl'),
            "id_bayar" => $this->input->post('bay'),
            "total_bayar" => $this->input->post('total'),
        ];
        $this->db->insert('pengeluaran', $data);
    }

    public function hapus($id)
    {
        $this->db->where('nofaktur_pg', $id);
        $this->db->delete('pengeluaran');
    }

    public function get_id($id)
    {
        return $this->db->get_where('v_keluar', ['nofaktur_pg' => $id])->row_array();
    }

    public function tampil_total()
    {
        $this->db->select('SUM(total_bayar) as subtotal');
        return $this->db->get_where('pengeluaran')->row()->subtotal;
    }

    public function update()
    {
        $data = [
            "id_kategori" => $this->input->post('kt'),
            "uraian" => $this->input->post('uraian') == '' ? "Tidak Ada Catatan" : $this->input->post('uraian'),
            "tanggal" => $this->input->post('tgl'),
            "total_bayar" => $this->input->post('total'),
            "id_bayar" => $this->input->post('bay'),
        ];
        $this->db->where('nofaktur_pg', $this->input->post('kd_pg'));
        $this->db->update('pengeluaran', $data);
    }
}
