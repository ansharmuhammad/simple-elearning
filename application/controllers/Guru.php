<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->web = $this->db->get('config')->row();
		$this->ta = $this->db->get_where('tahunajaran',['tahunajaran_status'=>'T'])->row();
		if ($this->session->userdata('level') != 'guru') {
			$this->session->set_flashdata('message', 'swal("Ops!", "Anda bukan guru!", "error");');
	    	redirect('auth');
		}
	}

	public function index()
	{
		$data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->M_data->get_mapelguru($this->session->userdata('nip'),$this->ta->tahunajaran_kode)->result();
		$data['title']		= 'Dashboard';
		$data['sidebar']	= 'sidebar_guru';
		$data['body']		= 'guru/home';
		$this->load->view('template', $data);
	}

	//fungsi untuk materi sesuai dengan mapel yang dipilih
	//jika id kosong maka tampilkan semua mapel yang dia ampu pada TA berjalan
	public function materi($id)
	{
	    $data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->M_data->get_mapeldetail($id)->row();
		$data['list']		= $this->M_data->get_materimapel($id)->result();
		$data['title']		= 'Daftar Materi';
		$data['sidebar']	= 'sidebar_guru';
		$data['body']		= 'guru/materi/detail';
		$this->load->view('template', $data);
	}
	//add materi
	public function addmateri($id)
	{
	    if ($this->input->post()) {
	    	$p 		= $this->input->post();
	    	$data 	= [
	    		'materi_mapelguru'	=> $id,
	    		'materi_judul'		=> $p['judul'],
	    		'materi_isi'		=> $p['isi'],
	    		'materi_waktu'		=> date('Y-m-d H:i:s'),
	    	];

	    	$config['upload_path'] 		= './assets/materi/';
	    	$config['allowed_types'] 	= '*';
	    	
	    	
	    	$this->load->library('upload', $config);
	    	
	    	if ($this->upload->do_upload('file')){
	    		$file = $this->upload->data();
	    		$data['materi_file'] = $file['file_name'];
	    	}
	    	if ($this->upload->do_upload('video')){
	    		$video = $this->upload->data();
	    		$data['materi_video'] = $video['file_name'];
	    	}


	    	$this->db->insert('materi',$data);
	    	$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah materi", "success");');
	    	redirect('guru/materi/'.$id);
	    }
	    else
	    {
	    	$data['kode']		= $id;
	    	$data['c']			= $this->web;
			$data['ta']			= $this->ta;
			$data['title']		= 'Tambah Materi';
			$data['sidebar']	= 'sidebar_guru';
			$data['body']		= 'guru/materi/addmateri';
			$this->load->view('template', $data);
	    }
	}
	public function editmateri($id,$pos)
	{
	    if ($this->input->post()) {
	    	$p 		= $this->input->post();
	    	$data 	= [
	    		'materi_mapelguru'	=> $pos,
	    		'materi_judul'		=> $p['judul'],
	    		'materi_isi'		=> $p['isi'],
	    		'materi_waktu'		=> date('Y-m-d H:i:s'),
	    	];

	    	$config['upload_path'] 		= './assets/materi/';
	    	$config['allowed_types'] 	= '*';
	    	
	    	
	    	$this->load->library('upload', $config);
	    	
	    	if ($this->upload->do_upload('file')){
	    		$file = $this->upload->data();
	    		$data['materi_file'] = $file['file_name'];
	    	}
	    	if ($this->upload->do_upload('video')){
	    		$video = $this->upload->data();
	    		$data['materi_video'] = $video['file_name'];
	    	}
	    	$this->db->update('materi',$data,['materi_id'=>$id]);
	    	$this->session->set_flashdata('message', 'swal("Berhasil!", "Update materi", "success");');
	    	redirect('guru/materi/'.$pos);
	    }
	    else
	    {
	    	$data['kode']		= $pos;
	    	$data['c']			= $this->web;
			$data['ta']			= $this->ta;
			$data['data']		= $this->db->get_where('materi',['materi_id'=>$id])->row();
			$data['title']		= 'Update Materi';
			$data['sidebar']	= 'sidebar_guru';
			$data['body']		= 'guru/materi/editmateri';
			$this->load->view('template', $data);
	    }
	}
	public function deletemateri($id,$pos)
	{
	    $this->db->delete('materi',['materi_id'=>$id]);
    	$this->session->set_flashdata('message', 'swal("Berhasil!", "Delete materi", "success");');
    	redirect('guru/materi/'.$pos);
	}
	public function detailmateri($id,$pos)
	{
	    $data['kode']		= $pos;
    	$data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->M_data->get_mapeldetail($pos)->row();
		$data['komentar']	= $this->M_data->komentarmaterisiswa($id)->result();
		$data['materi']		= $this->M_data->detailmaterisiswa($id)->row();
		$data['title']		= $data['materi']->materi_judul.' [ '.$data['data']->mapel_nama.'-'.$data['data']->kelas_nama.' ]';
		$data['sidebar']	= 'sidebar_guru';
		$data['body']		= 'guru/materi/detailmateri';
		$this->load->view('template', $data);
	}
	//end fungsi untuk materi
	//fungsi mapel yang sesuai dengan guru yang sedang login
	public function mapel()
	{
		$data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->M_data->get_mapelguru($this->session->userdata('nip'),$this->ta->tahunajaran_kode)->result();
		$data['title']		= 'Dashboard';
		$data['sidebar']	= 'sidebar_guru';
		$data['body']		= 'guru/mapel/index';
		$this->load->view('template', $data);
	}
	//end fungsi mapel
	//fungsi untuk tugas sesuai dengan mapel
	public function tugas($id)
	{
	    $data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->M_data->get_mapeldetail($id)->row();
		$data['list']		= $this->M_data->get_tugasmapel($id)->result();
		$data['title']		= 'Daftar Tugas';
		$data['sidebar']	= 'sidebar_guru';
		$data['body']		= 'guru/tugas/detail';
		$this->load->view('template', $data);
	}
	//add tugas
	public function addtugas($id)
	{
	    if ($this->input->post()) {
	    	$p 		= $this->input->post();
	    	$data 	= [
	    		'tugas_mapelguru'	=> $id,
	    		'tugas_judul'		=> $p['judul'],
	    		'tugas_isi'			=> $p['isi'],
	    		'tugas_waktu'		=> date('Y-m-d H:i:s'),
	    		'tugas_batas'		=> $p['batas'],
	    	];
	    	$this->db->insert('tugas',$data);
	    	$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah tugas", "success");');
	    	redirect('guru/tugas/'.$id);
	    }
	    else
	    {
	    	$data['kode']		= $id;
	    	$data['c']			= $this->web;
			$data['ta']			= $this->ta;
			$data['title']		= 'Tambah Tugas';
			$data['sidebar']	= 'sidebar_guru';
			$data['body']		= 'guru/tugas/addtugas';
			$this->load->view('template', $data);
	    }
	}
	public function detailtugas($id,$pos)
	{
	    $data['kode']		= $pos;
    	$data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['list']		= $this->M_data->get_kumpultugas($id)->result();
		$data['data']		= $this->M_data->get_mapeldetail($pos)->row();

		//die(var_dump($data['data']));
		$data['komentar']	= $this->M_data->komentartugassiswa($id)->result();
		$data['tugas']		= $this->M_data->detailtugassiswa($id)->row();
		$data['title']		= $data['tugas']->tugas_judul.' [ '.$data['data']->mapel_nama.'-'.$data['data']->kelas_nama.' ]';
		$data['sidebar']	= 'sidebar_guru';
		$data['body']		= 'guru/tugas/detailtugas';
		$this->load->view('template', $data);
	}
	public function edittugas($id,$pos)
	{
	    if ($this->input->post()) {
	    	$p 		= $this->input->post();
	    	$data 	= [
	    		'tugas_judul'	=> $p['judul'],
	    		'tugas_isi'		=> $p['isi'],
	    		'tugas_batas'	=> $p['batas'],
	    	];
	    	$this->db->update('tugas',$data,['tugas_id'=>$id]);
	    	$this->session->set_flashdata('message', 'swal("Berhasil!", "Update tugas", "success");');
	    	redirect('guru/tugas/'.$pos);
	    }
	    else
	    {
	    	$data['kode']		= $pos;
	    	$data['c']			= $this->web;
			$data['ta']			= $this->ta;
			$data['data']		= $this->db->get_where('tugas',['tugas_id'=>$id])->row();
			$data['title']		= 'Update tugas';
			$data['sidebar']	= 'sidebar_guru';
			$data['body']		= 'guru/tugas/edittugas';
			$this->load->view('template', $data);
	    }
	}
	public function deletetugas($id,$pos)
	{
	    $this->db->delete('kumpul',['kumpul_tugas'=>$id]);
	    $this->db->delete('tugas',['tugas_id'=>$id]);
    	$this->session->set_flashdata('message', 'swal("Berhasil!", "Delete tugas", "success");');
    	redirect('guru/tugas/'.$pos);
	}
	public function inputnilai($idk,$idt,$pos)
	{
	    $data = [ 'kumpul_nilai'=> $this->input->post('nilai') ];
	    $this->db->update('kumpul',$data,['kumpul_id'=>$idk]);
	    redirect('guru/detailtugas/'.$idt.'/'.$pos);
	}
	//end fungsi untuk tugas sesuai dengan mapel
	//pengumumuman
	public function pengumuman($id=null)
	{
		if ($id) {
			$data['c']			= $this->web;
			$data['ta']			= $this->ta;
			$data['data']		= $this->db->get_where('pengumuman',['pengumuman_id'=>$id])->row();
			$data['title']		= $data['data']->pengumuman_judul;
			$data['sidebar']	= 'sidebar_guru';
			$data['body']		= 'guru/pengumuman/detail';
			$this->load->view('template', $data);
		}
		else
		{
			$data['c']			= $this->web;
			$data['ta']			= $this->ta;
			$data['data']		= $this->M_data->pengumuman()->result();
			$data['title']		= 'Pengumuman';
			$data['sidebar']	= 'sidebar_guru';
			$data['body']		= 'guru/pengumuman/index';
			$this->load->view('template', $data);
		}
	}
	//profile guru yang sedang login
	public function profile()
	{
    	$data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->M_data->get_guru($this->session->userdata('nip'))->row();
		$data['title']		= 'Profile Guru';
		$data['sidebar']	= 'sidebar_guru';
		$data['body']		= 'guru/profile/index';
		$this->load->view('template', $data);
	}
	public function update_profile()
	{
		$p 		= $this->input->post();
	    $data 	= [
	    	'guru_nama'			=> $p['nama'],
	    	'guru_jk'			=> $p['jk'],
	    	'guru_tanggallahir'	=> $p['tanggallahir'],
	    	'guru_tempatlahir'	=> $p['tempatlahir'],
	    ];
	    $this->db->update('guru',$data,['guru_nip'=>$this->session->userdata('nip')]);
	    $this->session->set_flashdata('message', 'swal("Berhasil!", "Update profile", "success");');
    	redirect('guru/profile');
	}
	public function update_password()
	{
	    $p 		= $this->input->post();
	    $data 	= [
	    	'user_password'			=> md5($p['password']),
	    ];
	    $this->db->update('user',$data,['user_username'=>$this->session->userdata('nip')]);
	    $this->session->set_flashdata('message', 'swal("Berhasil!", "Update password", "success");');
    	redirect('guru/profile');
	}
	public function komentar($kode)
	{
		$data = [
	    	'komentar_relasi'	=> $kode,
	    	'komentar_isi'		=> $this->input->post('message'),
	    	'komentar_waktu'	=> date('Y-m-d H:i:s'),
	    	'komentar_jenis'	=> $this->input->post('jenis')
	    ];
	    $this->db->insert('komentar',$data);
	    $this->session->set_flashdata('message', 'swal("Berhasil!", "Menambahkan password", "success");');
	    redirect($this->agent->referrer());
	}
	public function absensi($id)
	{
	    $data['c']			= $this->web;
		$data['ta']			= $this->ta;
		$data['data']		= $this->M_data->get_mapeldetail($id)->row();
		$data['list']		= $this->M_data->absensi($id)->result();
		$data['title']		= 'Absensi '.$data['data']->mapel_nama.' kelas '.$data['data']->kelas_nama;
		$data['sidebar']	= 'sidebar_guru';
		$data['body']		= 'guru/absensi/index';
		$this->load->view('template', $data);
	
	}
	public function addabsensi($id)
	{
	    if ($this->input->post()) {
	    	$p 		= $this->input->post();
	    	$this->db->trans_start();
	    	$data 	= [
	    		'absensi_waktu'		=> date('Y-m-d H:i:s'),
	    		'absensi_mapelguru'	=> $id,
	    		'absensi_materi'	=> $p['materi']
	    	];
	    	$this->db->insert('absensi',$data);
	    	$cek 	=$this->db->query(" select max(absensi_id) as max from absensi ")->row();
	    	$detail = $this->M_data->get_mapeldetail($id)->row();
	    	$siswa 	= $this->M_data->kelassiswa($detail->kelas_kode,$this->ta->tahunajaran_kode)->result();
	    	$absens = [];
	    	foreach ($siswa as $s) {
	    	    $abs = [
	    	    	'detail_absensi'	=> $cek->max,
	    	    	'detail_nis'		=> $s->siswa_nis,
	    	    	'detail_kehadiran'	=> $p['kehadiran'.$s->siswa_nis]
	    	    ];

	    	    array_push($absens,$abs);
	    	}
	    	$this->db->insert_batch('detail_absensi', $absens); 
	    	$this->db->trans_complete();
	    	$this->session->set_flashdata('message', 'swal("Berhasil!", "Tambah absensi", "success");');
	    	redirect('guru/absensi/'.$id);
	    }
	    else
	    {
	    	$data['kode']		= $id;
	    	$data['c']			= $this->web;
			$data['ta']			= $this->ta;
			$data['data']		= $this->M_data->get_mapeldetail($id)->row();
			$data['list']		= $this->M_data->kelassiswa($data['data']->kelas_kode,$this->ta->tahunajaran_kode)->result();
			$data['materi']		= $this->db->get_where('materi',['materi_mapelguru'=>$id])->result();
			$data['title']		= 'Tambah Absensi';
			$data['sidebar']	= 'sidebar_guru';
			$data['body']		= 'guru/absensi/add';
			$this->load->view('template', $data);
	    }
	}
	public function editabsensi($id)
	{
	    if ($this->input->post()) {
	    	$p 		= $this->input->post();
	    	$cek 	= $this->db->get_where('absensi',['absensi_id'=>$id])->row();
	    	$this->db->trans_start();
	    	$data 	= [
	    		'absensi_materi'	=> $p['materi']
	    	];
	    	$this->db->update('absensi',$data,['absensi_id'=>$id]);
	    	

	    	$detail = $this->M_data->get_mapeldetail($cek->absensi_mapelguru)->row();
	    	$siswa 	= $this->M_data->kelassiswa($detail->kelas_kode,$this->ta->tahunajaran_kode)->num_rows();
	    	
	    	for ($i=0; $i < $siswa ; $i++) { 
	    		$abs = [
	    	    	'detail_absensi'	=> $id,
	    	    	'detail_kehadiran'	=> $p['kehadiran'.$i]
	    	    ];
	    	    $this->db->update('detail_absensi', $abs,['detail_id'=>$p['id'.$i]]); 
	    	}
	    	
	    	$this->db->trans_complete();
	    	$this->session->set_flashdata('message', 'swal("Berhasil!", "Update absensi", "success");');
	    	redirect('guru/absensi/'.$cek->absensi_mapelguru);
	    }
	    else
	    {
	    	$data['c']			= $this->web;
			$data['ta']			= $this->ta;
			$data['dataabsen']	= $this->db->get_where('absensi',['absensi_id'=>$id])->row();
			$data['data']		= $this->M_data->get_mapeldetail($data['dataabsen']->absensi_mapelguru)->row();
			$data['list']		= $this->M_data->kelassiswa($data['data']->kelas_kode,$this->ta->tahunajaran_kode)->result();
			$data['materi']		= $this->db->get_where('materi',['materi_mapelguru'=>$data['dataabsen']->absensi_mapelguru])->result();
			$data['title']		= 'Edit Absensi';
			$data['sidebar']	= 'sidebar_guru';
			$data['body']		= 'guru/absensi/edit';
			$this->load->view('template', $data);
	    }
	}
	public function deletetabsensi($id)
	{
		$this->db->trans_start();
	    $this->db->delete('absensi',['absensi_id'=>$id]);
	    $this->db->delete('detail_absensi',['detail_absensi'=>$id]);
	    $this->db->trans_complete();
    	$this->session->set_flashdata('message', 'swal("Berhasil!", "Delete absensi", "success");');
    	redirect($this->agent->referrer());
	}
}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */