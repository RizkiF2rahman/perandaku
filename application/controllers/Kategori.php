<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        cek_not_login();
    }

    public function index()
    {
        $data['judul'] = "Kategori Pembayaran";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['kategori'] = $this->Kategori_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Kategori Pembayaran";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $this->form_validation->set_rules(
            'kt',
            'Nama Kategori',
            'required|trim|is_unique[kategori.kategori]',
            ['is_unique' => "Nama Kategori Sudah Ada"]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kategori/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Kategori_model->simpan();
            redirect('kategori');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('kd');
        $this->Kategori_model->hapus($id);
        redirect('kategori');
    }

    public function ubah($id)
    {
        $data['judul'] = "Kategori Pembayaran";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['ubah_kategori'] = $this->Kategori_model->get_id($id);

        $this->form_validation->set_rules(
            'kt',
            'Nama Kategori',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kategori/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kategori_model->update();
            redirect('kategori');
        }
    }
}
