<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        cek_not_login();
    }

    public function index()
    {
        $data['judul'] = "User";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['user'] = $this->User_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function ubah_password()
    {
        $data['judul'] = "Ubah Password";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['user'] = $this->User_model->tampil_data();

        $this->form_validation->set_rules(
            'pass1',
            'password',
            'required|trim|min_length[5]|matches[pass2]',
            [
                'min_length' => "input password minimal 5 digit",
                'matches' => "password tidak sama"
            ]
        );

        $this->form_validation->set_rules(
            'pass2',
            'password',
            'required|trim|matches[pass1]',
            [
                'matches' => "password tidak sama"
            ]
        );

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('user/ubah_password', $data);
            $this->load->view('templates/footer');
        } else {
            $this->User_model->ubah_pass();
            $pesan = "Paassword Berhasil Di Update";
            $url = base_url('user/index');
            echo "<script>
                    alert('$pesan');
                    location = '$url';
                </script>";
        }
    }

    public function tambah()
    {
        $data['judul'] = "User";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $this->form_validation->set_rules('nu', 'Nama User', 'required|trim');
        $this->form_validation->set_rules('un', 'Username', 'required|trim|is_unique[user.username]', ['is_unique' => "Username sudah ada"]);
        $this->form_validation->set_rules('level', 'Hak Akses', 'required|trim');

        $this->form_validation->set_rules(
            'pass1',
            'password',
            'required|trim|min_length[5]|matches[pass2]',
            [
                'min_length' => "input password minimal 5 digit",
                'matches' => "password tidak sama"
            ]
        );

        $this->form_validation->set_rules(
            'pass2',
            'password',
            'required|trim|matches[pass1]',
            [
                'matches' => "password tidak sama"
            ]
        );

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('user/tambah');
            $this->load->view('templates/footer');
        } else {

            $upload_foto = $_FILES['foto'];
            if ($upload_foto) {
                $confiq['upload_path'] = './assets/dist/foto/'; //letak lokasi simpan file atau foto
                $confiq['allowed_types'] = 'jpg|png|jpeg'; // type atau format file
                $confiq['max_size'] = '5048'; // batas maksimal file yang di upload 5MB
                $confiq['remove_space'] = TRUE;
                $confiq['overwrite'] = TRUE;

                $this->upload->initialize($confiq);
                if ($this->upload->do_upload('foto')) {
                    $data_image = $this->upload->data('file_name');
                    $location = base_url() . '/assets/dist/foto/';
                    $pict = $data_image;

                    $this->User_model->simpan($pict);
                    $pesan = "Data Berhasil di Simpan.";
                    $url = base_url('user');
                    echo "<script>
                    alert('$pesan');
                    location = '$url';
                    </script>";
                } else {
                    $pict = 'default.png';
                    $this->User_model->simpan($pict);
                    $pesan = "Data Berhasil di Simpan.";
                    $url = base_url('user/index');
                    echo "<script>
                alert('$pesan');
                location = '$url';
                </script>";
                }
            }
        }
    }

    public function hapus()
    {
        $id_user = $this->input->post('us');
        $this->_deleteimage($id_user);
        $this->User_model->hapus($id_user);

        $pesan = "Data Berhasil di Hapus.";
        $url = base_url('user');
        echo "<script>
            alert('$pesan');
            location = '$url';
        </script>";
    }

    public function ubah($id_user = '')
    {
        $data['judul'] = "User";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['ubah_user'] = $this->User_model->get_id($id_user);

        $this->form_validation->set_rules('nu', 'Nama User', 'required|trim');
        $this->form_validation->set_rules('un', 'Username', 'required|trim');
        $this->form_validation->set_rules('level', 'Hak Akses', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('user/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_foto = $_FILES['foto']['name'];
            if ($upload_foto) {
                $confiq['upload_path'] = './assets/dist/foto/'; //letak lokasi simpan file atau foto
                $confiq['allowed_types'] = 'jpg|png|jpeg'; // type atau format file
                $confiq['max_size'] = '5048'; // batas maksimal file yang di upload 5MB
                $confiq['remove_space'] = TRUE;
                $confiq['overwrite'] = TRUE;

                $this->upload->initialize($confiq);
                if ($this->upload->do_upload('foto')) {

                    $id_user = $this->input->post('us');
                    $this->_deleteimage($id_user);

                    $pict = $this->upload->data('file_name');
                    $this->User_model->ubah($pict);
                    $pesan = "Data Berhasil di Update.";
                    $url = base_url('user');
                    echo "<script>
                            alert('$pesan');
                            location = '$url';
                        </script>";
                } else {
                    $pesan = "Data tidak dapat diupdate";
                    $url = base_url('user');
                    echo "<script>
                        alert('$pesan');
                        location = '$url';
                    </script>";
                }
            } else {
                $pict = $this->input->post('image');
                $this->User_model->ubah($pict);
                $pesan = "Data Berhasil di Simpan.";
                $url = base_url('user');
                echo "<script>
                        alert('$pesan');
                        location = '$url';
                    </script>";
            }
        }
    }

    public function _deleteimage($id)
    {

        $user = $this->User_model->get_id($id);
        if ($user['foto'] != "default.jpg") {
            $filename = explode(".", $user['foto'])[0];
            return array_map('unlink', glob(FCPATH . "assets/dist/foto/$filename.*"));
        }
    }
}
