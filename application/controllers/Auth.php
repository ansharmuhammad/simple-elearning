<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function index()
	{
		$data['c'] = $this->db->get('config')->row();
		$this->load->view('login',$data);
	}
	//cek login yang dilakukan
	public function login()
	{
	    $data 	= [ 'user_username'=>$this->input->post('username'),'user_password'=> md5($this->input->post('password')) ];
	    $cek 	= $this->db->get_where('user',$data);
	    if ($cek->num_rows() > 0) {
	    	$res = $cek->row_array();
	    	if ($res['user_role'] == 'admin') {

	    		$array = [
	    			'nama' 	=> $res['user_username'],
	    			'level'	=> $res['user_role']
	    		];
	    		$this->session->set_userdata( $array );
	    		redirect($this->session->userdata('level'));
	    	}
	    	elseif ($res['user_role'] == 'guru') {

	    		//get data guru berdasarkan username login
	    		$guru 	= $this->db->get_where('guru',['guru_nip'=>$res['user_username']])->row_array();
	    		$array 	= [
	    			'nama' 	=> $guru['guru_nama'],
	    			'level'	=> $res['user_role'],
	    			'nip'	=> $res['user_username']
	    		];
	    		$this->session->set_userdata( $array );
	    		redirect($this->session->userdata('level'));
	    	}
	    	elseif ($res['user_role'] == 'siswa') {

	    		//get data siswa berdasarkan username login
	    		$siswa 	= $this->db->get_where('siswa',['siswa_nis'=>$res['user_username']])->row_array();
	    		$array 	= [
	    			'nama' 	=> $siswa['siswa_nama'],
	    			'level'	=> $res['user_role'],
	    			'nis'	=> $res['user_username']
	    		];
	    		$this->session->set_userdata( $array );
	    		redirect($this->session->userdata('level'));
	    	}
	    }
	    else
	    {
	    	$this->session->set_flashdata('message', 'swal("Ops!", "Username atau password salah", "error");');
	    	redirect('auth');
	    }
	}

	//fungsi logout sistem dengan menghapus session
	public function logout()
	{
		session_destroy();
		redirect('auth');
	}
}
