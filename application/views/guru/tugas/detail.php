<section class="content">
    <div class="container-fluid">
      <div class="row">
        <section class="col-lg-4 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Mata Pelajaran</h3>
            </div>
            <div class="card-body">
              <b>Mata Pelajaran :</b> <?=$data->mapel_nama?><br>
              <b>Kelas :</b> <?=$data->kelas_nama?><br>
              <b>Guru :</b> <?=$data->guru_nama?><br>
            </div>
          </div>
        </section>
        <section class="col-lg-8 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Petunjuk</h3>
            </div>
            <div class="card-body">
              <p>
                Tugas yang anda masukan disini dapat diakses oleh siswa yang ada pada kelas <b><?=$data->kelas_nama?></b><br>
                Silahkan tambahkan tugas dengan menekan tombol <button class="btn btn-primary btn-sm">Tambah Data</button> dibawah, <br>Edit dengan menekan tombol <button class="btn btn-info btn-sm"><span class="fa fa-edit"></span></button> dibawah, hapus dengan tombol <button class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button> dibawah, dan lihat data tugas yang dikumpulkan mahasiswa dengan tombol <button class="btn btn-success btn-sm"><span class="fa fa-eye"></span></button> dibawah.
              </p>
            </div>
          </div>
        </section>
        <section class="col-lg-12 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title?></h3>
              <a href="<?=base_url('guru/addtugas/'.$data->mapelguru_id)?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-flush text-center">
                  <thead class="thead-light">
                    <th width="1%">No</th>
                    <th>Judul</th>
                    <th>Waktu</th>
                    <th>Jumlah Pengumpul</th>
                    <th>Opsi</th>
                  </thead>
                  <tbody>
                    <?php $i=1; 
                    $jmlsiswa = $this->db->get_where('relasi_kelassiswa',['kelassiswa_kelas'=>$data->kelas_kode])->num_rows();
                    foreach ($list as $d) { 
                      $cek = $this->db->get_where('kumpul',['kumpul_tugas'=>$d->tugas_id])->num_rows();
                    ?>
                    <tr>
                      <td><?=$i++?></td>
                      <td><?=$d->tugas_judul?></td>
                      <td>
                        <b>Waktu tugas :</b> <?=date('H:i A, d-m-Y',strtotime($d->tugas_waktu))?><br>
                        <b>Batas Kumpul :</b> <?=date('H:i A, d-m-Y',strtotime($d->tugas_batas))?>
                      </td>
                      <td>
                        <?=$cek?> siswa dari <?=$jmlsiswa?> siswa
                      </td>
                      <td>
                        <a href="<?=base_url('guru/detailtugas/'.$d->tugas_id.'/'.$data->mapelguru_id)?>" class="btn btn-success btn-sm"><span class="fa fa-eye"></span></a>
                        <a href="<?=base_url('guru/edittugas/'.$d->tugas_id.'/'.$data->mapelguru_id)?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span></a>
                        <a onclick="return confirm('Data kumpul tugas siswa juga akan terhapus, apakah anda yakin ?')" href="<?=base_url('guru/deletetugas/'.$d->tugas_id.'/'.$data->mapelguru_id)?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                      </td>
                    </tr>
                    <?php } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>