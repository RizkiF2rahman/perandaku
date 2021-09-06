<?php
Class Fungsi{

    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('User_model');
        $id = $this->ci->session->userdata('id_user');
        $user = $this->ci->User_model->get($id)->row();
        return $user;
    }
    
}