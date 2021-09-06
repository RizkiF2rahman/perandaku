<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posisi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Posisi_model');
        cek_not_login();
    }

    public function index()
    {
        $data['judul'] = "Posisi";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['posisi'] = $this->Posisi_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('posisi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Posisi";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $this->form_validation->set_rules(
            'np',
            'Nama Posisi',
            'required|trim|is_unique[posisi.nama_pos]',
            ['is_unique' => "Nama Posisi Sudah Ada"]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('posisi/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Posisi_model->simpan();
            redirect('posisi');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('kd');
        $this->Posisi_model->hapus($id);
        redirect('posisi');
    }

    public function ubah($id)
    {
        $data['judul'] = "Posisi";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['ubah_posisi'] = $this->Posisi_model->get_id($id);

        $this->form_validation->set_rules(
            'np',
            'Nama Posisi',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('posisi/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Posisi_model->ubah();
            redirect('posisi');
        }
    }
}
