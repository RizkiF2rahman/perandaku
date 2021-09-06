<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login()
    {
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        cek_login();
        $this->load->view('login');
    }

    public function proses()
    {
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $post = $this->input->post(null, TRUE);
        if(isset($post['login']))
        {
            $this->load->model('User_model');
            $query = $this->User_model->login($post);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                //echo "$row->nama_user";
                $params=array(
                    'id_user' => $row->id_user,
                    'level' => $row->level  
                );
                $this->session->set_userdata($params);
                redirect('home');
            }else{
                redirect('auth/login');
            }
        }
    }

    public function logout()
    {
        $params = array('id_user','level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }

}
