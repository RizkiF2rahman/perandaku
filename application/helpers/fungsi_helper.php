<?php
//melakukan pengecekan login dengan tidak login
//(membatasi hak akses user)
function cek_login()
{
    $ci =& get_instance();
    $user = $ci->session->userdata('id_user');
    if($user)
    {
        redirect('home');
    }
}

function cek_not_login()
{
    $ci =& get_instance();
    $user = $ci->session->userdata('id_user');
    if(!$user)
    {
        redirect('auth/login');
    }
}

function cek_user()
{
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->level !=1 )
    {
        redirect('home/not_found');
    }
}
