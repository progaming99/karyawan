<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        error_reporting(0);
        $data['title'] = 'Home';

        $this->load->model('Home_model', 'karyawan');

        //ambil data keyword
        if (!$this->uri->segment(3) == 'Home') {
            $this->session->unset_userdata('keyword');
        }
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        //config
        $this->db->like('nip', $data['keyword']);
        $this->db->or_like('nama', $data['keyword']);
        $this->db->or_like('gender', $data['keyword']);
        $this->db->or_like('grade', $data['keyword']);
        $this->db->or_like('gaji', $data['keyword']);
        $this->db->from('karyawan');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 8;

        $tgl_awal = $this->input->get('tanggal_awal');
        $tgl_akhir = $this->input->get('tanggal_akhir');

        if (empty($tgl_awal) or empty($tgl_akhir)) {
            $karyawan = $this->Home_model->getKaryawan();

            $label = 'Semua Data karyawan';
        } else {
            $karyawan = $this->Home_model->rangeTanggal($tgl_awal, $tgl_akhir);

            $tgl_awal = date('d-m-Y', strtotime($tgl_awal));
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));

            $label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
        }
        $data['karyawan'] = $karyawan;
        $data['label'] = $label;

        $data['start'] = $this->uri->segment(3);
        $data['karyawan'] = $this->Home_model->getSearch($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Form tambah karyawan';

        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal masuk', 'required');
        $this->form_validation->set_rules('grade', 'Grade', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Home_model->tambah();
            $this->session->set_flashdata('flash', 'Data karyawan berhasil di tambahkan');
            redirect('Home');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Form edit karyawan';

        $data['karyawan'] = $this->Home_model->getIdKaryawan($id);
        $data['gender'] = ['M', 'F'];
        $data['grade'] = ['A', 'B', 'C', 'D'];

        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal masuk', 'required');
        $this->form_validation->set_rules('grade', 'Grade', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Home_model->edit();
            $this->session->set_flashdata('flash', 'Data karyawan berhasil di edit');
            redirect('Home');
        }
    }

    public function hapus($id)
    {
        $this->Home_model->hapusKaryawan($id);
        $this->session->set_flashdata('hapus', 'Data karyawan berhasil di hapus');
        redirect('Home');
    }
}
