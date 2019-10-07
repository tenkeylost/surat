<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Mdl');
    // $this->load->library('tcpdf');
  }

  function index()
  {
    $data = array();
    if ($this->session->userdata('isUserLoggedIn')) {
      $data['titel']    = 'Arsip Surat BNN Blitar';
      $data['masuk']    = $this->Mdl->total('surat_masuk');
      $data['keluar']   = $this->Mdl->total('surat_keluar');
      $data['perintah'] = $this->Mdl->total('surat_perintah');
      $data['users']    = $this->Mdl->total('users');
      $data['pegawai']  = $this->Mdl->total('pegawai');
      $data['user']     = $this->Mdl->getRows(array('id_users' => $this->session->userdata('userId')));

      $this->load->view('part/_head', $data);
      $this->load->view('part/_nav');
      $this->load->view('welcome_message');
      $this->load->view('part/_foot');
    } else {
      redirect('login');
    }
  }

  function login()
  {
    $data['titel']  = 'Arsip Surat BNN Blitar';
    $this->load->view('part/_head', $data);
    $this->load->view('part/_login');
    $this->load->view('part/_foot');
  }

  function proses_login()
  {
    if ($this->session->userdata('isUserLoggedIn')) {
      redirect('/');
    } else {
      $data      = array();

      if ($this->session->userdata('success_msg')) {
        $data['success_msg'] = $this->session->userdata('success_msg');
        $this->session->unset_userdata('success_msg');
      }

      if ($this->session->userdata('error_msg')) {
        $data['error_msg'] = $this->session->userdata('error_msg');
        $this->session->unset_userdata('error_msg');
      }

      if ($this->input->post('loginSubmit')) {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == true) {
          $con['returnType'] = 'single';
          $con['conditions'] = array(
            'username'  => $this->input->post('username'),
            'password'  => md5($this->input->post('password'))
          );
          $checkLogin = $this->Mdl->getRows($con);

          if ($checkLogin) {
            $this->session->set_userdata('isUserLoggedIn', TRUE);
            $this->session->set_userdata('userId', $checkLogin['id_users']);
            $this->session->set_userdata('userlvl', $checkLogin['status']);
            redirect('/', $data);
          } else {
            $data['error_msg'] = 'Username atau password salah, silahkan ulangi kembali.';
          }
        }
      }

      redirect('/', $data);
    }
  }

  function logout()
  {
    $this->session->unset_userdata('isUserLoggedIn');
    $this->session->unset_userdata('userId');
    $this->session->sess_destroy();
    redirect('login');
  }
}

/* End of file Login.php */
