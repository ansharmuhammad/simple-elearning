<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		$this->web = $this->db->get('config')->row();
		$this->ta = $this->db->get_where('tahunajaran',['tahunajaran_status'=>'T'])->row();
		if ($this->session->userdata('level') != 'siswa') {
			$this->session->set_flashdata('message', 'swal("Ops!", "Anda bukan siswa!", "error");');
	    	redirect('auth');
		}
	}

	public function index()
	{
		$data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->db->get_where('siswa',['siswa_nis'=>$this->session->userdata('nis')])->row();
		$data['kelas']		= $this->db->get_where('relasi_kelassiswa',['kelassiswa_siswa'=>$this->session->userdata('nis'),'kelassiswa_tahunajaran'=>$this->ta->tahunajaran_kode])->row();
		$data['detkelas']	= $this->db->get_where('kelas',['kelas_kode'=>$data['kelas']->kelassiswa_kelas])->row();
		$data['title']		= 'Dashboard';
		$data['sidebar']	= 'sidebar_siswa';
		$data['body']		= 'siswa/home';
		$this->load->view('template', $data);
	}
	//pengumuman bagian siswa
	public function pengumuman($id=null)
	{
		if ($id) {
			$data['c']			= $this->web;
			$data['ta']			= $this->ta;
			$data['data']		= $this->db->get_where('pengumuman',['pengumuman_id'=>$id])->row();
			$data['title']		= $data['data']->pengumuman_judul;
			$data['sidebar']	= 'sidebar_siswa';
			$data['body']		= 'siswa/pengumuman/detail';
			$this->load->view('template', $data);
		}
		else
		{
			$data['c']			= $this->web;
			$data['ta']			= $this->ta;
			$data['data']		= $this->M_data->pengumuman()->result();
			$data['title']		= 'Pengumuman';
			$data['sidebar']	= 'sidebar_siswa';
			$data['body']		= 'siswa/pengumuman/index';
			$this->load->view('template', $data);
		}
	}
	//profile siswa yang sedang login
	public function profile()
	{
    	$data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->M_data->get_siswa($this->session->userdata('nis'))->row();
		$data['title']		= 'Profile Siswa';
		$data['sidebar']	= 'sidebar_siswa';
		$data['body']		= 'siswa/profile/index';
		$this->load->view('template', $data);
	}
	public function update_profile()
	{
		$p 		= $this->input->post();
	    $data 	= [
	    	'siswa_nama'		=> $p['nama'],
	    	'siswa_jk'			=> $p['jk'],
	    	'siswa_tanggallahir'=> $p['tanggallahir'],
	    	'siswa_tempatlahir'	=> $p['tempatlahir'],
	    ];
	    $this->db->update('siswa',$data,['siswa_nis'=>$this->session->userdata('nis')]);
	    $this->session->set_flashdata('message', 'swal("Berhasil!", "Update profile", "success");');
    	redirect('siswa/profile');
	}
	public function update_password()
	{
	    $p 		= $this->input->post();
	    $data 	= [
	    	'user_password'			=> md5($p['password']),
	    ];
	    $this->db->update('user',$data,['user_username'=>$this->session->userdata('nis')]);
	    $this->session->set_flashdata('message', 'swal("Berhasil!", "Update password", "success");');
    	redirect('siswa/profile');
	}
	public function mapel()
	{
	    $data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['kelas']		= $this->M_data->get_kelassiswa($this->session->userdata('nis'))->row();
		$data['data']		= $this->M_data->get_mapelsiswa($data['kelas']->kelassiswa_kelas)->result();
		$data['title']		= 'Mata Pelajaran';
		$data['sidebar']	= 'sidebar_siswa';
		$data['body']		= 'siswa/mapel/index';
		$this->load->view('template', $data);
	}
	//materi
	public function materi($kode)
	{
	    $data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->db->get_where('materi',['materi_mapelguru'=>$kode])->result();
		$data['detail']		= $this->M_data->get_mapeldetail($kode)->row();
		$data['title']		= 'Materi '.$data['detail']->mapel_nama.' - '.$data['detail']->kelas_nama;
		$data['sidebar']	= 'sidebar_siswa';
		$data['body']		= 'siswa/mapel/materi';
		$this->load->view('template', $data);
	}
	//detail materi
	public function materi_detail($kode)
	{
	    $data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->db->get_where('materi',['materi_id'=>$kode])->row();
		$data['detail']		= $this->M_data->detailmaterisiswa($kode)->row();
		$data['komentar']	= $this->M_data->komentarmaterisiswa($kode)->result();
		$data['title']		= 'Materi '.$data['detail']->mapel_nama.' - '.$data['detail']->kelas_nama.' > '.$data['data']->materi_judul;
		$data['sidebar']	= 'sidebar_siswa';
		$data['body']		= 'siswa/mapel/materi_detail';
		$this->load->view('template', $data);
	}
	public function komentar($kode)
	{
	    $data = [
	    	'komentar_relasi'	=> $kode,
	    	'komentar_user'		=> $this->session->userdata('nis'),
	    	'komentar_isi'		=> $this->input->post('message'),
	    	'komentar_waktu'	=> date('Y-m-d H:i:s'),
	    	'komentar_jenis'	=> $this->input->post('jenis')
	    ];
	    $this->db->insert('komentar',$data);
	    $this->session->set_flashdata('message', 'swal("Berhasil!", "Menambahkan password", "success");');
    	redirect('siswa/'.$this->input->post('redirect').'/'.$kode);
	}
	public function tugas($kode)
	{
	    $data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->db->get_where('tugas',['tugas_mapelguru'=>$kode])->result();
		$data['detail']		= $this->M_data->get_mapeldetail($kode)->row();
		$data['title']		= 'Tugas '.$data['detail']->mapel_nama.' - '.$data['detail']->kelas_nama;
		$data['sidebar']	= 'sidebar_siswa';
		$data['body']		= 'siswa/mapel/tugas';
		$this->load->view('template', $data);
	}
	public function tugas_detail($kode)
	{
	    $data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->db->get_where('tugas',['tugas_id'=>$kode])->row();
		$data['detail']		= $this->M_data->detailtugassiswa($kode)->row();
		$data['komentar']	= $this->M_data->komentartugassiswa($kode)->result();
		$data['title']		= 'Tugas '.$data['detail']->mapel_nama.' - '.$data['detail']->kelas_nama.' > '.$data['data']->tugas_judul;
		$data['sidebar']	= 'sidebar_siswa';
		$data['body']		= 'siswa/mapel/tugas_detail';
		$this->load->view('template', $data);
	}
	public function upload_tugas($kode)
	{
	    $config['upload_path'] = './assets/tugas/';
	    $config['allowed_types'] = '*';
	    
	    $this->load->library('upload', $config);
	    
	    if ( ! $this->upload->do_upload('file')){
	    	$this->session->set_flashdata('message', 'swal("Ops!", "File gagal diupload, silahkan coba lagi", "error");');
	    	redirect('siswa/tugas_detail/'.$kode);
	    }
	    else{
	    	$file =  $this->upload->data();
	    	$data = [
	    		'kumpul_tugas'	=> $kode,
	    		'kumpul_siswa'	=> $this->session->userdata('nis'),
	    		'kumpul_file'	=> $file['file_name'],
	    		'kumpul_waktu'	=> date('Y-m-d H:i:s'),
	    	];
	    	$this->db->insert('kumpul',$data);
	    	$this->session->set_flashdata('message', 'swal("Berhasil!", "Tugas berhasil diupload", "success");');
	    	redirect('siswa/tugas_detail/'.$kode);
	    }
	}

}

/* End of file siswa.php */
/* Location: ./application/controllers/siswa.php */