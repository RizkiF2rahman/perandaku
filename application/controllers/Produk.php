<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('Produk_model');
        cek_not_login();
    }

    public function index()
    {
        $data['judul'] = "Produk";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['produk'] = $this->Produk_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Produk";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $this->form_validation->set_rules('np', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('hrg', 'Harga', 'required|trim|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('produk/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Produk_model->simpan();
            redirect('produk');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('kode');
        $this->Produk_model->hapus($id);
        redirect('produk');
    }

    public function ubah($id)
    {
        $data['judul'] = "produk";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['ubah_produk'] = $this->Produk_model->get_id($id);

        $this->form_validation->set_rules('np', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('hrg', 'Harga', 'required|trim|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('produk/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Produk_model->update();
            redirect('produk');
        }
    }
}
