<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here`
        $this->load->model('M_Crud', 'mcrud');
        $this->load->helper('uploader_helper');
    }


    public function index()
    {
        $data['title'] = "Arsip";
        $data['arsipData'] = $this->mcrud->read('arsip')->result_array();
        $data['content'] = $this->load->view('arsip/index', $data, TRUE);
        $this->load->view('Root', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('nomorsurat', 'nomorsurat', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        $this->form_validation->set_rules('judulsurat', 'judulsurat', 'required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah Arsip";
            $data['content'] = $this->load->view('arsip/create', $data, TRUE);
            $this->load->view('Root', $data);
        } else {
            $uploader = doUploadHelper('file', 'upload');
            if ($uploader['status']) {
                $request = [
                    'id_arsip' => rand(),
                    'nomor_surat' => $_POST['nomorsurat'],
                    'judul_surat' => $_POST['judulsurat'],
                    'kategori' => $_POST['kategori'],
                    'nama_file' => $uploader['log']['file_name']
                ];
                if ($this->mcrud->create('arsip', $request)) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    redirect('/');
                }
            } else {
                $this->session->set_flashdata('danger', 'Pastikan format file yang diupload pdf.');
                redirect('arsip/tambah');
            }
        }
    }
    public function detail($id_arsip)
    {
        $filter = ['id_arsip' => $id_arsip];

        $data['title'] = "Detail Arsip";
        $data['arsipData'] = $this->mcrud->read('arsip', $filter)->row();
        $data['content'] = $this->load->view('arsip/detail', $data, TRUE);
        $this->load->view('Root', $data);
    }
    public function edit($id_arsip)
    {
        $this->form_validation->set_rules('nomorsurat', 'nomorsurat', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        $this->form_validation->set_rules('judulsurat', 'judulsurat', 'required|min_length[5]');
        if ($this->form_validation->run() == FALSE) {
            $filter = ['id_arsip' => $id_arsip];
            $data['title'] = "Detail Arsip";
            $data['arsipData'] = $this->mcrud->read('arsip', $filter)->row();
            $data['content'] = $this->load->view('arsip/edit', $data, TRUE);
            $this->load->view('Root', $data);
        } else {
            $filter = ['id_arsip' => $id_arsip];
            $datas = $this->mcrud->read('arsip', $filter)->row();
            $uploader = !empty($_FILES['file']['name']) ? doUploadHelper('file', 'upload') : ['status' => true, 'log' => ['file_name' => $datas->nama_file]];
            $path = "./upload/" . $datas->nama_file;
            if ($uploader['status']) {
                if (!empty($_FILES['file']['name'])) {
                    unlink($path);
                }
                $request = [
                    'nomor_surat' => $_POST['nomorsurat'],
                    'judul_surat' => $_POST['judulsurat'],
                    'kategori' => $_POST['kategori'],
                    'nama_file' => $uploader['log']['file_name'],
                    'updatedAt' => date('Y-m-d H:i:s')
                ];
                if ($this->mcrud->update('arsip', ['id_arsip' => $id_arsip], $request)) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    redirect('arsip/detail/' . $id_arsip);
                }
            } else {
                $this->session->set_flashdata('danger', 'Pastikan format file yang diupload pdf.');
                redirect('arsip/edit/' . $id_arsip);
            }
        }
    }
    public function delete()
    {
        $filter = ['id_arsip' => $_POST['idarsip']];
        $data = $this->mcrud->read('arsip', $filter)->row();
        if ($data != null) {
            $path = "./upload/" . $data->nama_file;
            if (file_exists($path)) {
                if (unlink($path)) {
                    $this->session->set_flashdata('success', 'Arsip berhasil dihapus');
                } else {
                    $this->session->set_flashdata('danger', 'Tidak dapat menghapus file');
                }
            } else {
                $this->session->set_flashdata('danger', 'Arsip yang anda cari tidak ditemukan');
            }
            $this->mcrud->remove('arsip', $filter);
        } else {
            $this->session->set_flashdata('danger', 'Arsip yang anda cari tidak ditemukan');
        }
        redirect('/');
    }
    public function download($id_arsip)
    {
        $this->load->helper('download');
        $filter = ['id_arsip' => $id_arsip];
        $data = $this->mcrud->read('arsip', $filter)->row();
        $path = "./upload/" . $data->nama_file;
        force_download($path, null);
    }
    public function profil()
    {
        $data['title'] = "About";
        $data['content'] = $this->load->view('arsip/profil', $data, TRUE);
        $this->load->view('Root', $data);
    }
}

/* End of file Arsip.php */
