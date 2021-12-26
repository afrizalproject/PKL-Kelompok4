<?php

class m_guru extends CI_Model
{
    // Function cari
    public function fullget($key, $perPage, $offset)
    {
        if ($key != "") {
            return $this->db->query("SELECT * FROM tb_tempat_siswa INNER JOIN tb_siswa ON tb_tempat_siswa.id_siswa = tb_siswa.id_siswa WHERE nama_siswa LIKE '%" . $key . "%' ")->result();
        } else {
            return $this->db->query("SELECT * FROM tb_tempat_siswa INNER JOIN tb_siswa ON tb_tempat_siswa.id_siswa = tb_siswa.id_siswa ORDER BY jurusan ASC LIMIT $offset, $perPage ")->result();
        }
    }

    public function getKomen($dimana)
    {
        return $this->db->get_where('tb_tempat_siswa', $dimana)->result();
    }
    // FUNCTION TAMBAH DATA

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function cari($key)
    {
        if ($key != "") {
            return $this->db->query("SELECT * FROM tb_tempat_siswa INNER JOIN tb_siswa ON tb_tempat_siswa.id_siswa = tb_siswa.id_siswa WHERE nama_siswa LIKE '%" . $key . "%' ")->result();
        }
    }
}
