<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'User_model',
            'Lap_Pemasukan_model',
            'Lap_Pengeluaran_model'
        ]);
        cek_not_login();
    }
    
    public function index() {
        $data['judul']="Dashboard";
        $data['title']="SIPERAN DAKU CV. DERWATI";

        $data['pengeluaran'] = $this->Lap_Pengeluaran_model->total_tampil();
        $data['user'] = $this->User_model->tampil_data();
        $data['pemasukan'] = $this->Lap_Pemasukan_model->grand_total();
        
        $this->load->view('templates/header',$data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
    
    public function not_found()
    {
        $data['judul'] = "404";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $this->load->view('templates/header',$data);
        $this->load->view('home/404');
        $this->load->view('templates/footer');
    }
}
