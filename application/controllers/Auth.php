<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Auth_model');
  }

  public function index()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $data['judul'] = "Halaman Login";
      $this->load->view('auth/login', $data);
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $username = $this->input->post('username');
    $pass = $this->input->post('password');
    $nama = $this->input->post('nama_user');
    $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

    if ($user) {
      if (password_verify($pass, $user['password'])) {
        $data = [
          'username' => $user['username'],
          'nama_user' => $user['nama_user'],
          'role_id' => $user['role_id']
        ];
        $this->session->set_userdata($data);
        if ($user['role_id'] == 1) {
          $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Welcome back,</strong> ' . $data['nama_user'] . '<strong> !</strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>'
          );
          redirect('admin');
        } else {
          redirect('home');
        }
      } else {
        $this->session->set_flashdata(
          'pesan',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Password</strong> tidak tepat!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>'
        );
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Username</strong> tidak ada.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>'
      );
      redirect('auth');
    }
  }

  public function lupa_password()
  {
    $data['judul'] = "Auth | Form Validation";
    $this->load->view('auth/lupa_password', $data);
  }

  public function cek_username()
  {
    $user = $this->input->post('username', true);
    $cek = $this->Auth_model->cek_username($user);
    if ($cek == 1) {
      redirect(base_url('auth/reset_password?usr=' . $user));
    } else {
      $this->session->set_flashdata(
        'username',
        '<div class="alert alert-info alert-dismissible fade show" role="alert">Username <strong> ' . $user . ' </strong>, tidak ditemukan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>'
      );
      redirect(base_url('auth/lupa_password'));
    }
  }

  public function reset_password()
  {
    if (empty($this->input->get('usr', true))) {
      redirect(base_url('auth/lupa_password'));
    } else {
      $data['usr'] = $this->input->get('usr', true);
      $data['judul'] = "Auth | Reset Password";
      $this->load->view('auth/reset_password', $data);
    }
  }

  public function simpan_password()
  {
    $data['user'] = $this->input->post('username', true);
    $data['pass1'] = $this->input->post('password', true);
    $data['pass2'] = $this->input->post('password2', true);
    if ($data['pass1'] != $data['pass2']) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">Password baru dan konfirmasi password tidak sama.</div>');
      redirect(base_url('auth/reset_password?usr=' . $data['user']));
    } else if (strlen($data['pass1']) < 4) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">Password minimal 4 karakter.</div>');
      redirect(base_url('auth/reset_password?usr=' . $data['user']));
    } else {
      $data['pass_hash'] = password_hash($data['pass1'], PASSWORD_DEFAULT);
      $this->Auth_model->simpan_password($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">Password berhasil direset. Silahkan coba login kembali.</div>');
      redirect(base_url('auth'));
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-info alert-dismissible fade show" role="alert">Berhasil keluar.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>'
    );
    redirect('auth');
  }

  public function blocked()
  {
    $data['judul'] = "Block Access";
    $this->load->view('auth/blocked', $data);
  }
}
