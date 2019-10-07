<?php defined('BASEPATH') or exit('No direct script access allowed');

class Surat_masuk extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Mdl');
    // $this->load->library('tcpdf');
  }

  public function index()
  {
    $data = array();
    if ($this->session->userdata('isUserLoggedIn')) {
      $data['titel']    = 'Surat masuk';
      $data['masuk']    = $this->Mdl->total('surat_masuk');
      $data['keluar']   = $this->Mdl->total('surat_keluar');
      $data['perintah'] = $this->Mdl->total('surat_perintah');
      $data['users']    = $this->Mdl->total('users');
      $data['pegawai']  = $this->Mdl->total('pegawai');
      $data['user']     = $this->Mdl->getRows(array('id_users' => $this->session->userdata('userId')));
      $data['surat']    = $this->Mdl->lihat('surat_masuk');

      $this->load->view('part/_head', $data);
      $this->load->view('part/_nav');
      $this->load->view('surat_masuk/home');
      $this->load->view('part/_foot');
    } else {
      redirect('login');
    }
  }

  function detail()
  {
    $data = array();
    if ($this->session->userdata('isUserLoggedIn')) {
      $data['titel']        = 'Detail surat masuk';
      $data['masuk']    = $this->Mdl->total('surat_masuk');
      $data['keluar']   = $this->Mdl->total('surat_keluar');
      $data['perintah'] = $this->Mdl->total('surat_perintah');
      $data['users']    = $this->Mdl->total('users');
      $data['pegawai']  = $this->Mdl->total('pegawai');
      $data['user']         = $this->Mdl->getRows(array('id_users' => $this->session->userdata('userId')));
      $data['detail_surat'] = $this->Mdl->detail($this->uri->segment(2));

      $this->load->view('komponen/nav', $data);
      $this->load->view('surat_masuk/detail', $data);
      $this->load->view('komponen/foot', $data);
    } else {
      redirect('login');
    }
  }

  function form_input()
  {
    $data = array();
    if ($this->session->userdata('isUserLoggedIn')) {
      $cek    = $this->Mdl->agenda('surat_masuk', 'no_agenda_sm')->row();
      $akhir  = $cek->no_agenda_sm;

      if (date('m-d') == '01-01') {
        $agenda = '01';
      } else {
        $agenda = $akhir[0] + 1;
      }

      $data['no_agenda']  = $agenda;
      $data['titel']      = 'Input surat masuk';
      $data['masuk']    = $this->Mdl->total('surat_masuk');
      $data['keluar']   = $this->Mdl->total('surat_keluar');
      $data['perintah'] = $this->Mdl->total('surat_perintah');
      $data['users']    = $this->Mdl->total('users');
      $data['pegawai']  = $this->Mdl->total('pegawai');
      $data['user']       = $this->Mdl->getRows(array('id_users' => $this->session->userdata('userId')));

      $this->load->view('part/_head', $data);
      $this->load->view('part/_nav');
      $this->load->view('surat_masuk/form');
      $this->load->view('part/_foot');
    } else {
      redirect('login');
    }
  }

  function input()
  {
    $nmfile                   = "SRT_" . time();
    $config['upload_path']    = './assets/uploads/surat_masuk/';
    $config['allowed_types']  = 'pdf|jpg|jpeg|png';
    $config['max_size']       = '10072';
    $config['max_width']      = '5000';
    $config['file_name']      = $nmfile;

    $this->upload->initialize($config);

    if ($_FILES['filefoto']['name']) {
      if ($this->upload->do_upload('filefoto')) {
        $gbr  = $this->upload->data();
        $data = array(
          'upload_sm'           => $gbr['file_name'],
          'file_tipe_sm'        => $gbr['file_type'],
          'no_sm'               => $this->input->post('no_sm'),
          'no_agenda_sm'        => $this->input->post('no_agenda_sm'),
          'tahun_sm'            => $this->input->post('tahun_sm'),
          'tgl_sm'              => $this->input->post('tgl_sm'),
          'tgl_masuk'           => $this->input->post('tgl_masuk'),
          'perihal_sm'          => $this->input->post('perihal_sm'),
          'tgl_acara'           => $this->input->post('tgl_acara'),
          'tmpt_acara'          => $this->input->post('tmpt_acara'),
          'dari'                => $this->input->post('dari'),
          'tgl_disposisi'       => $this->input->post('tgl_disposisi'),
          'isi_disposisi'       => $this->input->post('isi_disposisi'),
          'tujuan_disposisi'    => $this->input->post('tujuan_disposisi'),
          'diterima'            => $this->input->post('diterima'),
          'upload_disposisi'    => $this->input->post('upload_disposisi'),
          'file_tipe_disposisi' => $this->input->post('file_tipe_disposisi')
        );

        $this->Mdl->insert_data($data, 'surat_masuk');

        $config2['image_library']   = 'gd2';
        $config2['source_image']    = $this->upload->upload_path . $this->upload->file_name;
        $config2['new_image']       = './assets/hasil_resize/';
        $config2['maintain_ratio']  = TRUE;
        $config2['width']           = '150';
        $config2['height']          = '150';

        $this->load->library('image_lib', $config2);

        if (!$this->image_lib->resize()) {
          $this->session->set_flashdata("pesan", "");
          redirect('input-surat-masuk');
        } else {
          $this->session->set_flashdata("pesan", "");
          redirect('surat-masuk');
        }
      }
    }
  }

  function form_update()
  {
    $data = array();
    if ($this->session->userdata('isUserLoggedIn')) {
      $data['titel']  = 'Surat Masuk';
      $data['user']   = $this->Mdl->getRows(array('id_users' => $this->session->userdata('userId')));
      $id             = $this->uri->segment(2);
      $data['dataku'] = $this->Mdl->form_update('surat_masuk', 'id_sm', $id);

      $this->load->view('komponen/nav', $data);
      $this->load->view('surat_masuk/form_update', $data);
      $this->load->view('komponen/foot', $data);
    } else {
      redirect('login');
    }
  }

  function update()
  {
    $id                   = $_POST['id_sm'];
    $data['id_sm']        = $_POST['id_sm'];
    $data['no_sm']        = $_POST['no_sm'];
    $data['no_agenda_sm'] = $_POST['no_agenda_sm'];
    $data['tahun_sm']     = $_POST['tahun_sm'];
    $data['tgl_sm']       = $_POST['tgl_sm'];
    $data['tgl_masuk']    = $_POST['tgl_masuk'];
    $data['perihal_sm']   = $_POST['perihal_sm'];
    $data['tgl_acara']    = $_POST['tgl_acara'];
    $data['tmpt_acara']   = $_POST['tmpt_acara'];
    $data['dari']         = $_POST['dari'];

    $this->Mdl->update('surat_masuk', $data, 'id_sm', $id);
    redirect('surat-masuk');
  }

  function form_update_lampiran()
  {
    $data = array();
    if ($this->session->userdata('isUserLoggedIn')) {
      $data['titel']  = 'Surat Masuk';
      $data['user']   = $this->Mdl->getRows(array('id_users' => $this->session->userdata('userId')));
      $id             = $this->uri->segment(2);
      $data['dataku'] = $this->Mdl->form_update('surat_masuk', 'id_sm', $id);

      $this->load->view('komponen/nav', $data);
      $this->load->view('surat_masuk/lampiran_sm', $data);
      $this->load->view('komponen/foot', $data);
    } else {
      redirect('login');
    }
  }

  function update_lampiran()
  {
    $nmfile                   = "SRT_" . time();
    $config['upload_path']    = './assets/uploads/surat_masuk/';
    $config['allowed_types']  = 'pdf|jpg|png|jpeg|bmp';
    $config['max_size']       = '10072';
    $config['max_width']      = '5000';
    $config['file_name']      = $nmfile;

    $this->upload->initialize($config);

    if ($_FILES['filefoto']['name']) {
      if ($this->upload->do_upload('filefoto')) {
        unlink('./assets/uploads/surat_masuk/' . $this->input->post('upload_sm'));
        $gbr  = $this->upload->data();
        $id   = $this->input->post('id_sm');
        $data = array(
          'id_sm'         => $this->input->post('id_sm'),
          'upload_sm'     => $gbr['file_name'],
          'file_tipe_sm'  => $gbr['file_type']
        );

        $this->Mdl->update('surat_masuk', $data, 'id_sm', $id);


        $config2['image_library']   = 'gd2';
        $config2['source_image']    = $this->upload->upload_path . $this->upload->file_name;
        $config2['new_image']       = './assets/hasil_resize/';
        $config2['maintain_ratio']  = TRUE;
        $config2['width']           = '150';
        $config2['height']          = '150';

        $this->load->library('image_lib', $config2);

        if (!$this->image_lib->resize()) {
          $this->session->set_flashdata("pesan", "");
          redirect('edit-lampiran-surat-masuk');
        } else {
          $this->session->set_flashdata("pesan", "");
          redirect('surat-masuk');
        }
      }
    }
  }

  function delete()
  {
    $id = $this->uri->segment(2);
    $this->Mdl->delete('surat_masuk', 'id_sm', $id);
    redirect('surat-masuk');
  }

  function form_disposisi()
  {
    $data = array();
    if ($this->session->userdata('isUserLoggedIn')) {
      $data['titel']  = 'Disposisi';
      $data['user']   = $this->Mdl->getRows(array('id_users' => $this->session->userdata('userId')));
      $id             = $this->uri->segment(2);
      $data['dataku'] = $this->Mdl->form_update('surat_masuk', 'id_sm', $id);

      $this->load->view('komponen/nav', $data);
      $this->load->view('surat_masuk/form_disposisi', $data);
      $this->load->view('komponen/foot', $data);
    } else {
      redirect('login');
    }
  }

  function update_disposisi()
  {
    $nmfile                   = "SRT_" . time();
    $config['upload_path']    = './assets/uploads/surat_masuk/';
    $config['allowed_types']  = 'pdf|jpg|png|jpeg|bmp';
    $config['max_size']       = '10072';
    $config['max_width']      = '5000';
    $config['file_name']      = $nmfile;

    $this->upload->initialize($config);

    if ($_FILES['filefoto']['name']) {
      if ($this->upload->do_upload('filefoto')) {
        $gbr  = $this->upload->data();
        $id   = $this->input->post('id_sm');
        $data = array(
          'id_sm'               => $this->input->post('id_sm'),
          'upload_disposisi'    => $gbr['file_name'],
          'file_tipe_disposisi' => $gbr['file_type'],
          'id_sm'               => $this->input->post('id_sm'),
          'tgl_disposisi'       => $this->input->post('tgl_disposisi'),
          'isi_disposisi'       => $this->input->post('isi_disposisi'),
          'tujuan_disposisi'    => $this->input->post('tujuan_disposisi'),
          'diterima'            => $this->input->post('diterima')
        );
        $this->Mdl->update('surat_masuk', $data, 'id_sm', $id);

        $config2['image_library']   = 'gd2';
        $config2['source_image']    = $this->upload->upload_path . $this->upload->file_name;
        $config2['new_image']       = './assets/hasil_resize/';
        $config2['maintain_ratio']  = TRUE;
        $config2['width']           = '150';
        $config2['height']          = '150';

        $this->load->library('image_lib', $config2);

        if (!$this->image_lib->resize()) {
          $this->session->set_flashdata("pesan", "");
          redirect('disposisi-surat-masuk');
        } else {
          $this->session->set_flashdata("pesan", "");
          redirect('surat-masuk');
        }
      }
    }
  }

  function form_edit_lampiran_disposisi()
  {
    $data = array();
    if ($this->session->userdata('isUserLoggedIn')) {
      $data['titel']  = 'Disposisi';
      $data['user']   = $this->Mdl->getRows(array('id_users' => $this->session->userdata('userId')));
      $id             = $this->uri->segment(2);
      $data['dataku'] = $this->Mdl->form_update('surat_masuk', 'id_sm', $id);

      $this->load->view('komponen/nav', $data);
      $this->load->view('surat_masuk/lampiran_disposisi', $data);
      $this->load->view('komponen/foot', $data);
    } else {
      redirect('login');
    }
  }

  function edit_lampiran_disposisi()
  {
    $nmfile                   = "SRT_" . time();
    $config['upload_path']    = './assets/uploads/surat_masuk/';
    $config['allowed_types']  = 'pdf|jpg|png|jpeg|bmp';
    $config['max_size']       = '10072';
    $config['max_width']      = '5000';
    $config['file_name']      = $nmfile;

    $this->upload->initialize($config);

    if ($_FILES['filefoto']['name']) {
      if ($this->upload->do_upload('filefoto')) {
        unlink('./assets/uploads/surat_masuk/' . $this->input->post('upload_disposisi'));
        $gbr  = $this->upload->data();
        $id   = $this->input->post('id_sm');
        $data = array(
          'id_sm'               => $this->input->post('id_sm'),
          'upload_disposisi'    => $gbr['file_name'],
          'file_tipe_disposisi' => $gbr['file_type']
        );

        $this->Mdl->update('surat_masuk', $data, 'id_sm', $id);


        $config2['image_library']   = 'gd2';
        $config2['source_image']    = $this->upload->upload_path . $this->upload->file_name;
        $config2['new_image']       = './assets/hasil_resize/';
        $config2['maintain_ratio']  = TRUE;
        $config2['width']           = '150';
        $config2['height']          = '150';

        $this->load->library('image_lib', $config2);

        if (!$this->image_lib->resize()) {
          $this->session->set_flashdata("pesan", "");
          redirect('edit-lampiran-disposisi-surat-masuk');
        } else {
          $this->session->set_flashdata("pesan", "");
          redirect('surat-masuk');
        }
      }
    }
  }
}

/* End of file Surat_masuk.php */
