<?php

class Home_model extends CI_Model
{

    public function getKaryawan()
    {
        return $this->db->get('karyawan')->result();
    }

    public function getSearch($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nip', $keyword);
            $this->db->or_like('nama', $keyword);
            $this->db->or_like('gender', $keyword);
            $this->db->or_like('tanggal_masuk', $keyword);
            $this->db->or_like('grade', $keyword);
            $this->db->or_like('gaji', $keyword);
        }

        return $this->db->get('karyawan', $limit, $start)->result();
    }

    protected $table = 'karyawan';

    public function rangeTanggal($tgl_awal, $tgl_akhir)
    {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
        $this->db->where('DATE(tgl) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir); // Tambahkan where tanggal nya
        return $this->db->get('transaksi')->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }


    public function tambah()
    {
        $nip = $this->input->post('nip', true);
        $nama = $this->input->post('nama', true);
        $gender = $this->input->post('gender', true);
        $tanggal_lahir = $this->input->post('tanggal_lahir', true);
        $tanggal_masuk = $this->input->post('tanggal_masuk', true);
        $grade =  $this->input->post('grade', true);

        $data = [
            "nip" => $nip,
            "nama" => $nama,
            "gender" => $gender,
            "tanggal_lahir" => $tanggal_lahir,
            "tanggal_masuk" => $tanggal_masuk,
            "grade" => $grade
        ];

        if ($data['grade'] === 'A') {
            $data['gaji'] = 1000000;
        } elseif ($data['grade'] === 'B') {
            $data['gaji'] = 2000000;
        } elseif ($data['grade'] === 'C') {
            $data['gaji'] = 3000000;
        } elseif ($data['grade'] === 'D') {
            $data['gaji'] = 4000000;
        } else {
            $data['gaji'] = 0;
        }

        $this->db->insert('karyawan', $data);
    }

    public function getIdKaryawan($id)
    {
        return $this->db->get_where('karyawan', ['id' => $id])->row();
    }

    public function edit()
    {
        $nip = $this->input->post('nip', true);
        $nama = $this->input->post('nama', true);
        $gender = $this->input->post('gender', true);
        $tanggal_lahir = $this->input->post('tanggal_lahir', true);
        $tanggal_masuk = $this->input->post('tanggal_masuk', true);
        $grade =  $this->input->post('grade', true);

        $data = [
            "nip" => $nip,
            "nama" => $nama,
            "gender" => $gender,
            "tanggal_lahir" => $tanggal_lahir,
            "tanggal_masuk" => $tanggal_masuk,
            "grade" => $grade
        ];

        if ($data['grade'] === 'A') {
            $data['gaji'] = 1000000;
        } elseif ($data['grade'] === 'B') {
            $data['gaji'] = 2000000;
        } elseif ($data['grade'] === 'C') {
            $data['gaji'] = 3000000;
        } elseif ($data['grade'] === 'D') {
            $data['gaji'] = 4000000;
        } else {
            $data['gaji'] = 0;
        }

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('karyawan', $data);
    }

    public function hapusKaryawan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('karyawan');
    }
}
