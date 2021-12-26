<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->load->view('login');
	}

	public function dashboard()
	{
		$this->load->view('login-khusus');
	}

	// Controller Aksi Login
	public function CekLogin()
	{

		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$dimana = array(
			'user' => ($user),
			'pass' => md5($pass)
		);
		$cekSiswa = $this->m_login->cekSiswa('tb_siswa', $dimana)->num_rows();
		$cekAdmin = $this->m_login->cekAdmin('tb_admin', $dimana)->num_rows();
		if ($cekSiswa > 0) {
			$data_session = array(
				'user' => $user,
				'status' => 'siswa',
			);

			$this->session->set_userdata($data_session);
			$this->session->set_flashdata('login_siswa', 'Anda berhasil login sebagai siswa!');
			redirect('siswa');
		} else {
			$this->session->set_flashdata('login_gagal', 'Maaf username atau password tidak terdaftar!');
			redirect('login');
		}
	}

	public function cekSpesial()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$dimana = array(
			'user' => $user,
			'pass' => $pass
		);
		$cekSiswa = $this->m_login->cekSiswa('tb_siswa', $dimana)->num_rows();
		$cekAdmin = $this->m_login->cekAdmin('tb_admin', $dimana)->num_rows();
		if ($cekAdmin > 0) {
			$data_session = array(
				'nama' => $user,
				'status' => 'admin',
			);

			$this->session->set_userdata($data_session);
			$this->session->set_flashdata('login_admin', 'Anda berhasil login sebagai admin!');
			redirect('admin');
		
		} else {
			$this->session->set_flashdata('login_gagal', 'Maaf username atau password tidak terdaftar!');
			redirect('login/dashboard');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}



	

	
}
