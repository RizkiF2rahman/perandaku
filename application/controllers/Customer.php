<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('Customer_model');
        cek_not_login();
    }

    public function index()
    {
        $data['judul'] = "Customer";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['customer']=$this->Customer_model->tampil_data();

        $this->load->view('templates/header',$data);
        $this->load->view('customer/index',$data);
        $this->load->view('templates/footer');
    }
    
    public function tambah()
    {
        $data['judul'] = "Customer";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";
        
        $this->form_validation->set_rules('na','Nama Customer','required|trim|is_unique[customer.nama]',
            ['is_unique' => "Nama Customer Sudah Ada"]
        );
        $this->form_validation->set_rules('nt','No Telp','required|trim|numeric');
        $this->form_validation->set_rules('al','Alamat Customer','required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('customer/tambah');
            $this->load->view('templates/footer');
        }else {
            $this->Customer_model->simpan();
            redirect('customer');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('ni');
        $this->Customer_model->hapus($id);
        redirect('customer');
    }

    public function ubah($id)
    {
        $data['judul'] = "Customer";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['ubah_customer'] = $this->Customer_model->get_id($id);

        $this->form_validation->set_rules('na','Nama','required|trim');
        $this->form_validation->set_rules('nt','No Telp','required|trim');
        $this->form_validation->set_rules('al','Alamat','required|trim');
            
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('customer/ubah',$data);
            $this->load->view('templates/footer');
        }else {
            $this->Customer_model->update();
            $pesan="Data Berhasil Di Update.";
        $url = base_url('customer');
        echo "<script>
            alert('$pesan');
            location = '$url';
        </script>";
        }
    }
}