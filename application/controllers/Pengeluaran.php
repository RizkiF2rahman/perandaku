<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Pembayaran_model',
            'Pengeluaran_model',
            'Kategori_model',
        ]);
        cek_not_login();
    }

    public function index()
    {
        $data['judul'] = "Pengeluaran";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['pengeluaran'] = $this->Pengeluaran_model->tampil_data();
        $data['subtotal'] = $this->Pengeluaran_model->tampil_total();

        $this->load->view('templates/header', $data);
        $this->load->view('pengeluaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Pengeluaran";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['kategori'] = $this->Kategori_model->tampil_data();
        $data['pembayaran'] = $this->Pembayaran_model->tampil_data();

        $tampil = $this->Pengeluaran_model->no_otomatis();
        if (empty($tampil[0]['nofaktur_pg'])) {
            $no = date('dmY') . "000001";
        } else {
            $a = date('dmY');
            $urut = $tampil[0]['nofaktur_pg'];
            $no_1 = substr($urut, 8, 6);
            $hsl_1 = ((int) $no_1) + 1;
            $hsl_2 = sprintf('%06s', $hsl_1);
            $no = $a . $hsl_2;
        }
        $data['nofaktur'] = $no;

        $this->form_validation->set_rules('kt', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('bay', 'Metode Pembayaran', 'required|trim');
        $this->form_validation->set_rules('total', 'Total Pembayaran', 'required|trim|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pengeluaran/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pengeluaran_model->simpan();
            $pesan = "Data Berhasil Di Simpan.";
            $url = base_url('pengeluaran');
            echo "<script>
            alert('$pesan');
            location = '$url';
        </script>";
        }
    }

    public function hapus()
    {
        $id = $this->input->post('kd');
        $this->Pengeluaran_model->hapus($id);
        redirect('pengeluaran');
    }

    public function ubah($id)
    {
        $data['judul'] = "Pengeluaran";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['ubah_keluar'] = $this->Pengeluaran_model->get_id($id);
        $data['kategori'] = $this->Kategori_model->tampil_data();
        $data['pembayaran'] = $this->Pembayaran_model->tampil_data();

        $this->form_validation->set_rules('kt', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('bay', 'Metode Pembayaran', 'required|trim');
        $this->form_validation->set_rules('total', 'Total Pembayaran', 'required|trim|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pengeluaran/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pengeluaran_model->update();
            $pesan = "Data Berhasil Di Update.";
            $url = base_url('pengeluaran');
            echo "<script>
            alert('$pesan');
            location = '$url';
        </script>";
        }
    }

}
