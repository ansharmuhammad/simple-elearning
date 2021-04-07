<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->web = $this->db->get('config')->row();
		$this->ta = $this->db->get_where('tahunajaran',['tahunajaran_status'=>'T'])->row();
		if ($this->session->userdata('level') != 'admin') {
			$this->session->set_flashdata('message', 'swal("Ops!", "Anda bukan admin!", "error");');
	    	redirect('auth');
		}
	}

	public function index()
	{
		$data['c']			= $this->web;
		$data['ta']			= $this->M_data->tahunajaran_aktif()->row();
		$data['mapel']		= $this->M_data->mapel()->num_rows();
		$data['guru']		= $this->M_data->guru()->num_rows();
		$data['kelas']		= $this->M_data->kelas()->num_rows();
		$data['title']		= 'Dashboard';
		$data['sidebar']	= 'sidebar_admin';
		$data['body']		= 'admin/home';
		$this->load->view('template', $data);
	}
	//CURD MASTER KELAS
	public function kelas()
	{
		$data['c']			= $this->web;
		$data['data']		= $this->M_data->kelas()->result();
		$data['title']		= 'Data Kelas';
		$data['sidebar']	= 'sidebar_admin';
		$data['body']		= 'admin/kelas/index';
		$this->load->view('template', $data);
	}
	public function addkelas()
	{
		if ($this->input->post()) {
			$p 	  	= $this->input->post();
			$kode 	= $this->M_code->kelas();
			$kelas 	= $this->db->get_where('jurusan',['jurusan_kode'=>$p['jurusan']])->row();
			$data 	= [
				'kelas_kode' 	=> $kode,
				'kelas_nama' 	=> $p['kelas'].' '.$kelas->jurusan_nama,
				'kelas_jurusan' => $p['jurusan']
			];
			$this->db->insert('kelas',$data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah data kelas", "success");');
	    	redirect('admin/kelas');
		}
		else
		{
			$data['c']			= $this->web;
			$data['data']		= $this->M_data->jurusan()->result();
			$data['title']		= 'Tambah Data Kelas';
			$data['sidebar']	= 'sidebar_admin';
			$data['body']		= 'admin/kelas/add';
			$this->load->view('template', $data);
		}
	}
	public function editkelas($kode)
	{
		if ($this->input->post()) {
			$p 	  	= $this->input->post();
			$kelas 	= $this->db->get_where('jurusan',['jurusan_kode'=>$p['jurusan']])->row();
			$data 	= [
				'kelas_nama' 	=> $p['kelas'].' '.$kelas->jurusan_nama,
				'kelas_jurusan' => $p['jurusan']
			];
			$this->db->update('kelas',$data,['kelas_kode'=>$kode]);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Update data kelas", "success");');
	    	redirect('admin/kelas');
		}
		else
		{
			$data['c']			= $this->web;
			$data['detail']		= $this->db->get_where('kelas',['kelas_kode'=>$kode])->row();
			$data['data']		= $this->M_data->jurusan()->result();
			$data['title']		= 'Update Data Kelas';
			$data['sidebar']	= 'sidebar_admin';
			$data['body']		= 'admin/kelas/edit';
			$this->load->view('template', $data);
		}
	}
	public function deletekelas($kode)
	{
		$this->db->delete('kelas',['kelas_kode'=>$kode]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Delete data kelas", "success");');
    	redirect('admin/kelas');
	}
	//END CURD MASTER KELAS
	//CURD MASTER SISWA
	public function siswa()
	{
		$data['c']			= $this->web;
		$data['data']		= $this->M_data->siswa()->result();
		$data['title']		= 'Data Siswa';
		$data['sidebar']	= 'sidebar_admin';
		$data['body']		= 'admin/siswa/index';
		$this->load->view('template', $data);
	}
	public function addsiswa()
	{
		if ($this->input->post()) {
			$p 	  	= $this->input->post();
			$cek 	= $this->db->get_where('siswa',['siswa_nis'=>$p['siswa_nis']])->num_rows();
			if ($cek > 0) {
				$this->session->set_flashdata('message', 'swal("Ops!", "NIS sudah digunakan oleh siswa lain", "error");');
			}
			else
			{
				$data 	= [
					'siswa_nis' 		=> $p['siswa_nis'],
					'siswa_nama' 		=> $p['siswa_nama'],
					'siswa_jk' 			=> $p['siswa_jk'],
					'siswa_tanggallahir' => $p['siswa_tanggallahir'],
					'siswa_tempatlahir' => $p['siswa_tempatlahir'],
				];
				$this->db->insert('siswa',$data);
				$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah data siswa", "success");');
			}
			
	    	redirect('admin/siswa');
		}
		else
		{
			$data['c']			= $this->web;
			$data['title']		= 'Tambah Data Siswa';
			$data['sidebar']	= 'sidebar_admin';
			$data['body']		= 'admin/siswa/add';
			$this->load->view('template', $data);
		}
	}
	public function editsiswa($kode)
	{
		if ($this->input->post()) {
			$p 	  	= $this->input->post();
			$data 	= [
				'siswa_nama' 		=> $p['siswa_nama'],
				'siswa_jk' 			=> $p['siswa_jk'],
				'siswa_tanggallahir' => $p['siswa_tanggallahir'],
				'siswa_tempatlahir' => $p['siswa_tempatlahir'],
			];
			$this->db->update('siswa',$data,['siswa_nis'=>$kode]);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Update data siswa", "success");');
	    	redirect('admin/siswa');
		}
		else
		{
			$data['c']			= $this->web;
			$data['detail']		= $this->db->get_where('siswa',['siswa_nis'=>$kode])->row();
			$data['title']		= 'Update Data Siswa';
			$data['sidebar']	= 'sidebar_admin';
			$data['body']		= 'admin/siswa/edit';
			$this->load->view('template', $data);
		}
	}
	public function deletesiswa($kode)
	{
		$this->db->delete('siswa',['siswa_nis'=>$kode]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Delete data siswa", "success");');
    	redirect('admin/siswa');
	}
	//END CURD MASTER SISWA
	//MENGAKTIFKAN / MENAMBAHKAN USER LOGIN SISWA
	public function aktifusersiswa($kode)
	{
		$data = [
			'user_username'	=> $kode,
			'user_password'	=> md5($kode),
			'user_role'		=> 'siswa'
		];
		$this->db->insert('user',$data);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Menambahkan user", "success");');
		redirect('admin/siswa');

	}
	//CURD MASTER GURU
	public function guru()
	{
	    $data['c']			= $this->web;
		$data['data']		= $this->M_data->guru()->result();
		$data['title']		= 'Data Guru';
		$data['sidebar']	= 'sidebar_admin';
		$data['body']		= 'admin/guru/index';
		$this->load->view('template', $data);
	}
	public function addguru()
	{
		if ($this->input->post()) {
			$p 	  	= $this->input->post();
			$cek 	= $this->db->get_where('guru',['guru_nip'=>$p['guru_nip']])->num_rows();
			if ($cek > 0) {
				$this->session->set_flashdata('message', 'swal("Ops!", "NIP sudah digunakan oleh guru lain", "error");');
			}
			else
			{
				$data 	= [
					'guru_nip' 			=> $p['guru_nip'],
					'guru_nama' 		=> $p['guru_nama'],
					'guru_jk' 			=> $p['guru_jk'],
					'guru_tanggallahir' => $p['guru_tanggallahir'],
					'guru_tempatlahir'	=> $p['guru_tempatlahir'],
				];
				$this->db->insert('guru',$data);
				$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah data guru", "success");');
			}
			
	    	redirect('admin/guru');
		}
		else
		{
			$data['c']			= $this->web;
			$data['title']		= 'Tambah Data Guru';
			$data['sidebar']	= 'sidebar_admin';
			$data['body']		= 'admin/guru/add';
			$this->load->view('template', $data);
		}
	}
	public function editguru($kode)
	{
		if ($this->input->post()) {
			$p 	  	= $this->input->post();
			$data 	= [
				'guru_nama' 		=> $p['guru_nama'],
				'guru_jk' 			=> $p['guru_jk'],
				'guru_tanggallahir' => $p['guru_tanggallahir'],
				'guru_tempatlahir' => $p['guru_tempatlahir'],
			];
			$this->db->update('guru',$data,['guru_nip'=>$kode]);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Update data guru", "success");');
	    	redirect('admin/guru');
		}
		else
		{
			$data['c']			= $this->web;
			$data['detail']		= $this->db->get_where('guru',['guru_nip'=>$kode])->row();
			$data['title']		= 'Update Data Guru';
			$data['sidebar']	= 'sidebar_admin';
			$data['body']		= 'admin/guru/edit';
			$this->load->view('template', $data);
		}
	}
	public function deleteguru($kode)
	{
		$this->db->delete('guru',['guru_nip'=>$kode]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Delete data guru", "success");');
    	redirect('admin/guru');
	}
	//END CURD MASTER GURU
	//MENGAKTIFKAN / MENAMBAHKAN USER LOGIN GURU
	public function aktifuserguru($kode)
	{
		$data = [
			'user_username'	=> $kode,
			'user_password'	=> md5($kode),
			'user_role'		=> 'guru'
		];
		$this->db->insert('user',$data);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Menambahkan user", "success");');
		redirect('admin/guru');
	}
	//CURD MASTER MAPEL
	public function mapel()
	{
	    $data['c']			= $this->web;
		$data['data']		= $this->M_data->mapel()->result();
		$data['title']		= 'Data Mata Pelajaran';
		$data['sidebar']	= 'sidebar_admin';
		$data['body']		= 'admin/mapel/index';
		$this->load->view('template', $data);
	}
	public function addmapel()
	{
		if ($this->input->post()) {
			$p 	  	= $this->input->post();
			$kode 	= $this->M_code->mapel();
			$data 	= [
				'mapel_kode' 		=> $kode,
				'mapel_nama' 		=> $p['mapel_nama'],
				'mapel_jurusan' 	=> $p['mapel_jurusan'],
			];
			$this->db->insert('mapel',$data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah data mata pelajaran", "success");');
	    	redirect('admin/mapel');
		}
		else
		{
			$data['c']			= $this->web;
			$data['data']		= $this->db->get('jurusan')->result();
			$data['title']		= 'Tambah Data Mata Pelajaran';
			$data['sidebar']	= 'sidebar_admin';
			$data['body']		= 'admin/mapel/add';
			$this->load->view('template', $data);
		}
	}
	public function editmapel($kode)
	{
		if ($this->input->post()) {
			$p 	  	= $this->input->post();
			$data 	= [
				'mapel_nama' 		=> $p['mapel_nama'],
				'mapel_jurusan' 	=> $p['mapel_jurusan'],
			];
			$this->db->update('mapel',$data,['mapel_kode'=>$kode]);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Update data mata pelajaran", "success");');
	    	redirect('admin/mapel');
		}
		else
		{
			$data['c']			= $this->web;
			$data['detail']		= $this->db->get_where('mapel',['mapel_kode'=>$kode])->row();
			$data['data']		= $this->db->get('jurusan')->result();
			$data['title']		= 'Update Data Mata Pelajaran';
			$data['sidebar']	= 'sidebar_admin';
			$data['body']		= 'admin/mapel/edit';
			$this->load->view('template', $data);
		}
	}
	public function deletemapel($kode)
	{
		$this->db->delete('mapel',['mapel_kode'=>$kode]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Delete data mapel", "success");');
    	redirect('admin/mapel');
	}
	//END CURD MASTER MAPEL
	//CURD MASTER TAHUN AJARAN
	public function tahunajaran()
	{
	    $data['c']			= $this->web;
		$data['data']		= $this->M_data->ta()->result();
		$data['title']		= 'Data Tahun Ajaran';
		$data['sidebar']	= 'sidebar_admin';
		$data['body']		= 'admin/ta/index';
		$this->load->view('template', $data);
	}
	public function addta()
	{
		if ($this->input->post()) {
			$p 	  	= $this->input->post();
			$kode 	= $this->M_code->ta();
			$data 	= [
				'tahunajaran_kode' 	=> $kode,
				'tahunajaran_nama' 	=> $p['jenis'].' '.$p['awal'].' / '.$p['akhir'],
				'tahunajaran_status'=> 'F'
			];
			$this->db->insert('tahunajaran',$data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah data tahun ajaran", "success");');
	    	redirect('admin/tahunajaran');
		}
		else
		{
			$data['c']			= $this->web;
			$data['title']		= 'Tambah Data Tahun Ajaran';
			$data['sidebar']	= 'sidebar_admin';
			$data['body']		= 'admin/ta/add';
			$this->load->view('template', $data);
		}
	}
	public function deleteta($kode)
	{
		$this->db->delete('tahunajaran',['tahunajaran_kode'=>$kode]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Delete data tahun ajaran", "success");');
    	redirect('admin/tahunajaran');
	}
	public function aktifkanta($kode)
	{
	    $this->db->update('tahunajaran',['tahunajaran_status'=>'F']);
	    $this->db->update('tahunajaran',['tahunajaran_status'=>'T'],['tahunajaran_kode'=>$kode]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Mengaktifkan tahun ajaran", "success");');
    	redirect('admin/tahunajaran');
	}
	//END CURD TAHUNAJARAN
	//DATA RELASI ANTARA KELAS DAN SISWA BERDASARKAN TAHUN AJARAN YANG AKTIF
	public function kelassiswa()
	{
	    $data['c']			= $this->web;
	    $data['ta']			= $this->ta;
		$data['data']		= $this->M_data->kelas()->result();
		$data['title']		= 'Data Kelas';
		$data['sidebar']	= 'sidebar_admin';
		$data['body']		= 'admin/kelassiswa/index';
		$this->load->view('template', $data);
	}
	public function detailkelas($kode)
	{
	    $data['c']			= $this->web;
		$data['data']		= $this->M_data->kelassiswa($kode,$this->ta->tahunajaran_kode)->result();
		$data['list']		= $this->M_data->ceksiswakelas($this->ta->tahunajaran_kode)->result();
		$data['kode']		= $kode;
		$data['title']		= 'Detail Data Kelas';
		$data['sidebar']	= 'sidebar_admin';
		$data['body']		= 'admin/kelassiswa/detail';
		$this->load->view('template', $data);
	}
	public function tambahdetailkelas($kode)
	{
	    $p = $this->input->post();
	    for ($i=0; $i < count($p['siswa']) ; $i++) { 
	    	
	    	$data = [
	    		'kelassiswa_siswa'		=> $p['siswa'][$i],
	    		'kelassiswa_kelas'		=> $kode,
	    		'kelassiswa_tahunajaran'=> $this->ta->tahunajaran_kode
	    	];
	    	$this->db->insert('relasi_kelassiswa',$data);
	    }
	    $this->session->set_flashdata('message', 'swal("Berhasil!", "Menambahkan siswa kedalam kelas", "success");');
    	redirect('admin/detailkelas/'.$kode);
	}
	public function deletedetailkelas($kode,$key)
	{
	    $this->db->delete('relasi_kelassiswa',['kelassiswa_id'=>$kode]);
	    // $this->session->set_flashdata('message', 'swal("Berhasil!", "Delete siswa dari kelas", "success");');
    	redirect('admin/detailkelas/'.$key);
	}
	//END DATA RELASI ANTARA KELAS DAN SISWA BERDASARKAN TAHUN AJARAN YANG AKTIF
	//DATA RELASI ANTARA GURU MAPEL DAN KELAS BERDASARKAN TAHUN AJARAN YANG AKTIF
	public function mapelguru()
	{
	    $data['c']			= $this->web;
	    $data['ta']			= $this->ta;
		$data['data']		= $this->M_data->kelas()->result();
		$data['title']		= 'Data Kelas';
		$data['sidebar']	= 'sidebar_admin';
		$data['body']		= 'admin/mapelguru/index';
		$this->load->view('template', $data);
	}
	public function detailmapelguru($kode)
	{
		//cek data kelas
		$cek 				= $this->db->get_where('kelas',['kelas_kode'=>$kode])->row();
	    $data['c']			= $this->web;
		$data['data']		= $this->M_data->mapelguru($kode,$this->ta->tahunajaran_kode)->result();
		$data['list']		= $this->M_data->cekmapelkelas($this->ta->tahunajaran_kode,$cek->kelas_jurusan,$kode)->result();
		$data['guru']		= $this->M_data->guru()->result();
		$data['kode']		= $kode;
		$data['title']		= 'Detail Data Mapel Kelas';
		$data['sidebar']	= 'sidebar_admin';
		$data['body']		= 'admin/mapelguru/detail';
		$this->load->view('template', $data);
	}
	public function tambahdetailmapelguru($kode)
	{
	    $p = $this->input->post();
	    $data = [
	    	'mapelguru_mapel'		=> $p['mapel'],
	    	'mapelguru_guru'		=> $p['guru'],
	    	'mapelguru_kelas'		=> $kode,
	    	'mapelguru_tahunajaran'	=> $this->ta->tahunajaran_kode,
	    ];
	    $this->db->insert('relasi_mapelguru',$data);
	    redirect('admin/detailmapelguru/'.$kode);
	}
	public function deletedetailmapelguru($kode,$key)
	{
	    $this->db->delete('relasi_mapelguru',['mapelguru_id'=>$kode]);
		redirect('admin/detailmapelguru/'.$key);
	}
	//END DATA RELASI ANTARA GURU MAPEL DAN KELAS BERDASARKAN TAHUN AJARAN YANG AKTIF
	//MANAJEMEN USER 
	public function user()
	{
	    $data['c']			= $this->web;
		$data['data']		= $this->M_data->user()->result();
		$data['title']		= 'Data User';
		$data['sidebar']	= 'sidebar_admin';
		$data['body']		= 'admin/user/index';
		$this->load->view('template', $data);
	}
	//CURD PENGUMUMAN YANG DAPAT DILIHAT MAHASISWA
	public function pengumuman()
	{
	    $data['c']			= $this->web;
		$data['data']		= $this->M_data->pengumuman()->result();
		$data['title']		= 'Data Pengumuman';
		$data['sidebar']	= 'sidebar_admin';
		$data['body']		= 'admin/pengumuman/index';
		$this->load->view('template', $data);
	}
	public function addpengumuman()
	{
		if ($this->input->post()) {
			$p = $this->input->post();
			$data = [
				'pengumuman_judul'	=> $p['judul'],
				'pengumuman_waktu'	=> date('Y-m-d H:i:s'),
				'pengumuman_isi'	=> $p['isi'],
			];

			$config['upload_path'] = './assets/img/pengumuman/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('img')){
				$file = $this->upload->data();
				$data['pengumuman_img'] = $file['file_name'];
			}

			$this->db->insert('pengumuman',$data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah pengumuman", "success");');
    		redirect('admin/pengumuman/');
		}
		else
		{
			$data['c']			= $this->web;
			$data['title']		= 'Tambah Data Pengumuman';
			$data['sidebar']	= 'sidebar_admin';
			$data['body']		= 'admin/pengumuman/add';
			$this->load->view('template', $data);
		} 
	}
	public function editpengumuman($kode)
	{
		if ($this->input->post()) {
			$p = $this->input->post();
			$data = [
				'pengumuman_judul'	=> $p['judul'],
				'pengumuman_waktu'	=> date('Y-m-d H:i:s'),
				'pengumuman_isi'	=> $p['isi'],
			];

			$config['upload_path'] = './assets/img/pengumuman/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('img')){
				$file = $this->upload->data();
				$data['pengumuman_img'] = $file['file_name'];
			}

			$this->db->update('pengumuman',$data,['pengumuman_id'=>$kode]);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Update pengumuman", "success");');
    		redirect('admin/pengumuman/');
		}
		else
		{
			$data['c']			= $this->web;
			$data['data']		= $this->db->get_where('pengumuman',['pengumuman_id'=>$kode])->row();
			$data['title']		= 'Update Data Pengumuman';
			$data['sidebar']	= 'sidebar_admin';
			$data['body']		= 'admin/pengumuman/edit';
			$this->load->view('template', $data);
		} 
	}
	public function deletepengumuman($kode)
	{
	    $this->db->delete('pengumuman',['pengumuman_id'=>$kode]);
	    $this->session->set_flashdata('message', 'swal("Berhasil!", "Delete pengumuman", "success");');
		redirect('admin/pengumuman');
	}
	public function pengaturan()
	{
	    if ($this->input->post()) {
	    	$p = $this->input->post();
	    	$data = [
	    		'config_sekolah'	=> $p['sekolah'],
	    		'config_alamat'		=> $p['alamat'],
	    		'config_kota'		=> $p['kota'],
	    		'config_phone'		=> $p['phone'],
	    		'config_email'		=> $p['email'],
	    		'config_kepsek'		=> $p['kepsek'],
	    		'config_nipkepsek'	=> $p['nipkepsek'],
	    		'config_author'		=> $p['author'],
	    	];

	    	$config['upload_path'] = './assets/img/';
	    	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	    	$config['overwrite']	= true;	
	    	
	    	$this->load->library('upload', $config);
	    	
	    	if ( $this->upload->do_upload('logo')){
	    		$file = $this->upload->data();
	    		$data['config_logo'] = $file['file_name'];
	    	}
	    	$this->db->update('config',$data);
	    	$this->session->set_flashdata('message', 'swal("Berhasil!", "Update pengaturan", "success");');
			redirect('admin/pengaturan');
	    }
	    else
	    {
	    	$data['c']			= $this->web;
			$data['title']		= 'Pengaturan Website';
			$data['sidebar']	= 'sidebar_admin';
			$data['body']		= 'admin/pengaturan/index';
			$this->load->view('template', $data);
	    }
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */