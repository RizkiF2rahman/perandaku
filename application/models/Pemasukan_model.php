<?php
class Pemasukan_model extends CI_Model
{
    public function simpan_keranjang()
    {
        $harga = $this->input->post('harga');
        $jumlah = $this->input->post('jumlah');
        $subtotal = $harga * $jumlah;

        $data = [
            "id_pd" => $this->input->post('pro'),
            "nama_pd" => $this->input->post('nm_pro'),
            "harga" => $this->input->post('harga'),
            "jumlah" => $this->input->post('jumlah'),
            "user_id" => $this->input->post('user'),
            "subtotal" => $subtotal
        ];
        $this->db->insert('keranjang_pem', $data);
    }

    public function tampil_keranjang($id)
    {
        return $this->db->get_where('keranjang_pem', ['user_id' => $id])->result_array();
    }

    public function no_otomatis()
    {
        $this->db->select('nofaktur_pen');
        $this->db->order_by('nofaktur_pen DESC');
        return $this->db->get('pemasukan')->result_array();
    }

    public function hapus_keranjang($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('keranjang_pem');
    }

    public function tampil_total($id)
    {
        $this->db->select('SUM(subtotal) as total');
        return $this->db->get_where('keranjang_pem', ['user_id' => $id])->row()->total;
    }

    public function simpan()
    {
        $data = [
            "nofaktur_pen" => $this->input->post('nofaktur'),
            "id_cs" => $this->input->post('cs'),
            "id_kategori" => $this->input->post('kat'),
            "uraian" => $this->input->post('uraian') == '' ? "Tidak Ada Catatan" : $this->input->post('uraian'),
            "tanggal" => $this->input->post('tgl'),
            "total_bayar" => $this->input->post('total'),
            "id_bayar" => $this->input->post('bay'),
        ];
        $this->db->insert('pemasukan', $data);
    }

    public function hapus_id()
    {
        $id = $this->fungsi->user_login()->id_user;
        $this->db->where('user_id', $id);
        $this->db->delete('keranjang_pem');
    }

    public function tampil_data()
    {
        return $this->db->get('v_masuk')->result_array();
    }

    public function get_pemasukan($id)
    {
        return $this->db->get_where('v_masuk', ['nofaktur_pen' => $id])->row_array();
    }

    public function get_detail($id)
    {
        return $this->db->get_where('v_detail_pemasukan', ['nofaktur_pem' => $id])->result_array();
    }

    public function hapus_pemasukan($id)
    {
        $this->db->where('nofaktur_pen', $id);
        $this->db->delete('pemasukan');
    }
    
    public function hapus_detail($id)
    {
        $this->db->where('nofaktur_pem', $id);
        $this->db->delete('detail_pemasukan');
    }
}
