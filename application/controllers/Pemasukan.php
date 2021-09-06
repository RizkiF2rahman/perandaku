<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Pembayaran_model',
            'Pemasukan_model',
            'Kategori_model',
            'Produk_model',
            'Customer_model'
        ]);
        cek_not_login();
    }

    public function index()
    {
        $data['judul'] = "PEMASUKAN";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $id = $this->fungsi->user_login()->id_user;
        $data['kategori'] = $this->Kategori_model->tampil_data();
        $data['produk'] = $this->Produk_model->tampil_data();
        $data['customer'] = $this->Customer_model->tampil_data();
        $data['pembayaran'] = $this->Pembayaran_model->tampil_data();
        $data['keranjang'] = $this->Pemasukan_model->tampil_keranjang($id);
        $data['total'] = $this->Pemasukan_model->tampil_total($id);

        $tampil = $this->Pemasukan_model->no_otomatis();
        if (empty($tampil[0]['nofaktur_pen'])) {
            $no = date('dmY') . "000001";
        } else {
            $a = date('dmY');
            $urut = $tampil[0]['nofaktur_pen'];
            $no_1 = substr($urut, 8, 6);
            $hsl_1 = ((int) $no_1) + 1;
            $hsl_2 = sprintf('%06s', $hsl_1);
            $no = $a . $hsl_2;
        }
        $data['nofaktur'] = $no;

        $this->load->view('templates/header', $data);
        $this->load->view('pemasukan/index', $data);
        $this->load->view('templates/footer');
    }

    public function simpan_customer()
    {
        $this->Customer_model->simpan();
        redirect('pemasukan');
    }

    public function tambah_keranjang()
    {
        if ($this->input->post('pro') == '') {
            $pesan = "Data Masih Kosong.! Silahkan diisi.";
            $url = base_url('pemasukan');
            echo "<script>
                alert('$pesan');
                location = '$url';
            </script>";
        } else {
            $this->Pemasukan_model->simpan_keranjang();
            redirect('pemasukan');
        }
    }

    public function hapus_keranjang($id)
    {
        $this->Pemasukan_model->hapus_keranjang($id);
        redirect('pemasukan');
    }

    public function simpan()
    {
        if ($this->input->post('kt') == '') {
            $pesan = "Silahkan Pilih Kategori Terlebih Dahulu";
            $url = base_url('pemasukan');
            echo "<script>
                alert('$pesan');
                location = '$url';
            </script>";
        } else if ($this->input->post('bay') == '') {
            $pesan = "Silahkan Pilih Metode Pembayaran Terlebih Dahulu";
            $url = base_url('pemasukan');
            echo "<script>
                alert('$pesan');
                location = '$url';
            </script>";
        } else {
            $result = array();
            foreach ($_POST['no_faktur'] as $key => $val) {
                $result[] = array(
                    'nofaktur_pem' => $_POST['no_faktur'][$key],
                    'kd_produk' => $_POST['pro'][$key],
                    'harga' => $_POST['harga'][$key],
                    'jumlah' => $_POST['jumlah'][$key],
                    'subtotal' => $_POST['subtotal'][$key],
                );
            }
        }
        $this->db->insert_batch('detail_pemasukan', $result);
        $this->Pemasukan_model->simpan();
        $pesan = "Transaksi Berhasil Simpan.";
        $url = base_url('pemasukan');
        echo "<script>
                alert('$pesan');
                location = '$url';
            </script>";
        $this->Pemasukan_model->hapus_id();
    }

    public function data_pemasukan()
    {
        $data['judul'] = "Detail Data Pemasukan";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['data_pemasukan'] = $this->Pemasukan_model->tampil_data();
        $this->load->view('templates/header', $data);
        $this->load->view('pemasukan/data_pemasukan', $data);
        $this->load->view('templates/footer');
    }

    public function hapus()
    {
        $id = $this->input->post('kd');
        $this->Pemasukan_model->hapus_pemasukan($id);
        $this->Pemasukan_model->hapus_detail($id);
        redirect('pemasukan/data_pemasukan');
    }

    public function cetak($id)
    {
        $data['cetak'] = $this->Pemasukan_model->get_pemasukan($id);
        $data['detail'] = $this->Pemasukan_model->get_detail($id);
        $this->load->view('pemasukan/cetak_pemasukan', $data);
    }
}
