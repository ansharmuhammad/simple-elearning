<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {


	//Bagian admin
	function tahunajaran_aktif()
	{
		return $this->db->get_where('tahunajaran',['tahunajaran_status'=>'T']);
	}
	function mapel()
	{
		$this->db->select('*');
		$this->db->from('mapel');
		$this->db->join('jurusan','mapel.mapel_jurusan = jurusan.jurusan_kode');
		$this->db->order_by('mapel_jurusan,mapel_kode','asc');
		return $this->db->get();
	}
	function guru()
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->order_by('guru_nama,guru_nip','asc');
		return $this->db->get();
	}
	function kelas()
	{
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('jurusan','kelas.kelas_jurusan = jurusan.jurusan_kode');
		$this->db->order_by('kelas_jurusan,kelas_kode','asc');
		return $this->db->get();
	}
	function siswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->order_by('siswa_nama,siswa_nis','asc');
		return $this->db->get();
	}
	function jurusan()
	{
		return $this->db->get('jurusan');
	}
	function ta()
	{
		$this->db->select('*');
		$this->db->from('tahunajaran');
		$this->db->order_by('tahunajaran_kode,tahunajaran_status','asc');
		return $this->db->get();
	}
	function kelassiswa($kode,$ta)
	{
		$this->db->select('*');
		$this->db->from('relasi_kelassiswa');
		$this->db->join('siswa','relasi_kelassiswa.kelassiswa_siswa = siswa.siswa_nis');
		$this->db->join('kelas','relasi_kelassiswa.kelassiswa_kelas = kelas.kelas_kode');
		$this->db->where('kelassiswa_kelas',$kode);
		$this->db->where('kelassiswa_tahunajaran',$ta);
		$this->db->order_by('siswa_nis','asc');
		return $this->db->get();
	}
	function siswakelasall($ta)
	{
		$this->db->select('*');
		$this->db->from('relasi_kelassiswa');
		$this->db->join('siswa','relasi_kelassiswa.kelassiswa_siswa = siswa.siswa_nis');
		$this->db->join('kelas','relasi_kelassiswa.kelassiswa_kelas = kelas.kelas_kode');
		$this->db->where('kelassiswa_tahunajaran',$ta);
		$this->db->order_by('siswa_nis','asc');
		return $this->db->get();
	}
	function ceksiswakelas($ta)
	{
		$query = " SELECT * FROM siswa where siswa_nis not in ( select kelassiswa_siswa from relasi_kelassiswa where kelassiswa_tahunajaran = '$ta' ) ";
		return $this->db->query($query);
	}
	function mapelguru($kode,$ta)
	{
		$this->db->select('*');
		$this->db->from('relasi_mapelguru');
		$this->db->join('guru','relasi_mapelguru.mapelguru_guru = guru.guru_nip');
		$this->db->join('mapel','relasi_mapelguru.mapelguru_mapel = mapel.mapel_kode');
		$this->db->where('mapelguru_kelas',$kode);
		$this->db->where('mapelguru_tahunajaran',$ta);
		return $this->db->get();
	}
	function cekmapelkelas($ta,$jur,$kode)
	{
		$query = " SELECT * FROM mapel where mapel_jurusan = '$jur' and mapel_kode not in ( select mapelguru_mapel from relasi_mapelguru where mapelguru_tahunajaran = '$ta' and mapelguru_kelas = '$kode' ) ";
		return $this->db->query($query);
	}
	function user()
	{
		$query = " SELECT * FROM user where user_role != 'admin' ";
		return $this->db->query($query);
	}
	function pengumuman()
	{
		$query = " SELECT * FROM pengumuman order by pengumuman_id desc ";
		return $this->db->query($query);
	}

	//bagian guru
	function get_mapelguru($id,$ta)
	{
		$this->db->select('*');
		$this->db->from('relasi_mapelguru');
		$this->db->join('mapel','relasi_mapelguru.mapelguru_mapel = mapel.mapel_kode');
		$this->db->join('kelas','relasi_mapelguru.mapelguru_kelas = kelas.kelas_kode');

		$this->db->where('mapelguru_guru',$id);
		$this->db->where('mapelguru_tahunajaran',$ta);
		return $this->db->get();
	}
	function get_mapeldetail($id)
	{
		$this->db->select('*');
		$this->db->from('relasi_mapelguru');
		$this->db->join('guru','relasi_mapelguru.mapelguru_guru = guru.guru_nip');
		$this->db->join('mapel','relasi_mapelguru.mapelguru_mapel = mapel.mapel_kode');
		$this->db->join('kelas','relasi_mapelguru.mapelguru_kelas = kelas.kelas_kode');
		
		$this->db->where('mapelguru_id',$id);
		return $this->db->get();
	}
	function get_materimapel($id)
	{
		$this->db->select('*');
		$this->db->from('materi');
		$this->db->where('materi_mapelguru',$id);
		return $this->db->get();
	}
	function get_tugasmapel($id)
	{
		$this->db->select('*');
		$this->db->from('tugas');
		$this->db->where('tugas_mapelguru',$id);
		return $this->db->get();
	}
	function get_kumpultugas($id)
	{
		$this->db->select('*');
		$this->db->from('kumpul');
		$this->db->join('siswa','kumpul.kumpul_siswa = siswa.siswa_nis');
		$this->db->where('kumpul_tugas',$id);
		return $this->db->get();
	}
	function get_guru($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('guru','user.user_username = guru.guru_nip');
		$this->db->where('user_username',$id);
		return $this->db->get();
	}

	//bagian untuk siswa
	function get_kelassiswa($id)
	{
		return $this->db->query("SELECT * FROM `relasi_kelassiswa` 
									JOIN siswa on relasi_kelassiswa.kelassiswa_siswa = siswa.siswa_nis
									JOIN tahunajaran on relasi_kelassiswa.kelassiswa_tahunajaran = tahunajaran.tahunajaran_kode
									WHERE tahunajaran.tahunajaran_status = 'T' AND kelassiswa_siswa = '$id'
								");
	}
	function get_mapelsiswa($id)
	{
		return $this->db->query(" SELECT relasi_mapelguru.*, mapel.mapel_nama, guru.guru_nama FROM `relasi_mapelguru`
									JOIN mapel on relasi_mapelguru.mapelguru_mapel = mapel.mapel_kode
									JOIN guru on relasi_mapelguru.mapelguru_guru = guru.guru_nip
									JOIN tahunajaran on relasi_mapelguru.mapelguru_tahunajaran = tahunajaran.tahunajaran_kode
									WHERE tahunajaran.tahunajaran_status = 'T' and relasi_mapelguru.mapelguru_kelas = '$id'
								");
	}
	function get_siswa($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('siswa','user.user_username = siswa.siswa_nis');
		$this->db->where('user_username',$id);
		return $this->db->get();
	}
	function detailmaterisiswa($id)
	{
		$this->db->select('*');
		$this->db->from('materi');
		$this->db->join('relasi_mapelguru','materi.materi_mapelguru = relasi_mapelguru.mapelguru_id');
		$this->db->join('kelas','relasi_mapelguru.mapelguru_kelas = kelas.kelas_kode');
		$this->db->join('mapel','relasi_mapelguru.mapelguru_mapel = mapel.mapel_kode');
		$this->db->join('guru','relasi_mapelguru.mapelguru_guru = guru.guru_nip');
		$this->db->where('materi_id',$id);
		return $this->db->get();
	}
	function komentarmaterisiswa($id)
	{
		$this->db->select('*');
		$this->db->from('komentar');
		$this->db->where('komentar_relasi',$id);
		$this->db->where('komentar_jenis','materi');
		$this->db->order_by('komentar_waktu','desc');
		return $this->db->get();
	}
	function komentartugassiswa($id)
	{
		$this->db->select('*');
		$this->db->from('komentar');
		$this->db->where('komentar_relasi',$id);
		$this->db->where('komentar_jenis','tugas');
		$this->db->order_by('komentar_waktu','desc');
		return $this->db->get();
	}
	function detailtugassiswa($id)
	{
		$this->db->select('*');
		$this->db->from('tugas');
		$this->db->join('relasi_mapelguru','tugas.tugas_mapelguru = relasi_mapelguru.mapelguru_id');
		$this->db->join('kelas','relasi_mapelguru.mapelguru_kelas = kelas.kelas_kode');
		$this->db->join('mapel','relasi_mapelguru.mapelguru_mapel = mapel.mapel_kode');
		$this->db->join('guru','relasi_mapelguru.mapelguru_guru = guru.guru_nip');
		$this->db->where('tugas_id',$id);
		return $this->db->get();
	}
	function absensi($id)
	{
		$this->db->select('*');
		$this->db->from('absensi');
		$this->db->join('materi','absensi.absensi_materi = materi.materi_id');
		$this->db->where('absensi_mapelguru',$id);
		$this->db->order_by('absensi.absensi_waktu','desc');
		return $this->db->get();
	}

}

/* End of file M_data.php */
/* Location: ./application/models/M_data.php */