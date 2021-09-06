<?php
class Kategori_model extends CI_Model{
    public function tampil_data(){
        return $this->db->get('kategori')->result_array();
    }

    public function simpan(){
        $data=[
            "kategori"=> $this->input->post('kt')
        ];
        $this->db->insert('kategori',$data);
    }

    public function hapus($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('kategori');
    }

    public function get_id($id)
    {
        return $this->db->get_where('kategori',['id' => $id])->row_array();
    }

    public function update()
    {
        $data=[
            "kategori"=> $this->input->post('kt')
        ];
        $this->db->where('id',$this->input->post('kode'));
        $this->db->update('kategori',$data);
    }
}