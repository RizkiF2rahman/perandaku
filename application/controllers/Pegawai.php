<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model(['Pegawai_model', 'Posisi_model']);
        cek_not_login();
    }

    public function index()
    {
        $data['judul'] = "Pegawai";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['pegawai'] = $this->Pegawai_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Pegawai";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['posisi'] = $this->Posisi_model->tampil_data();

        $this->form_validation->set_rules(
            'nm_peg',
            'Nama Pegawai',
            'required|trim|is_unique[pegawai.nama_peg]',
            ['is_unique' => "Nama Pegawai Sudah Ada"]
        );

        $this->form_validation->set_rules('jkl', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nt','No Telfon','required|trim|numeric|max_length[13]',
            [
                'max_length' => "Input No Telfon Maksimal 13 digit"
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pegawai/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pegawai_model->simpan();
            redirect('pegawai');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('kd_peg');
        $this->Pegawai_model->hapus($id);
        redirect('pegawai');
    }

    public function ubah($id)
    {
        $data['judul'] = "Pegawai";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['ubah_peg'] = $this->Pegawai_model->get_id($id);
        $data['posisi'] = $this->Posisi_model->tampil_data();

        $this->form_validation->set_rules('nm_peg','Nama Pegawai','required|trim');
        $this->form_validation->set_rules('jkl', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nt','No Telfon','required|trim|numeric|max_length[13]',
            [
                'max_length' => "Input No Telfon Maksimal 13 digit"
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pegawai/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pegawai_model->update();
            redirect('pegawai');
        }
    }
}
