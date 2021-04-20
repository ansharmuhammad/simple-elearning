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
                Materi yang ada upload disini dapat diakses oleh siswa yang ada pada kelas <b><?=$data->kelas_nama?></b><br>
                Silahkan tambahkan materi dengan menekan tombol <button class="btn btn-primary btn-sm">Tambah Data</button> dibawah, <br>Edit dengan menekan tombol <button class="btn btn-info btn-sm"><span class="fa fa-edit"></span></button> dibawah, hapus dengan tombol <button class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button> dibawah, dan lihat detail materi dengan tombol <button class="btn btn-success btn-sm"><span class="fa fa-eye"></span></button>

              </p>
            </div>
          </div>
        </section>
        <section class="col-lg-12 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title?></h3>
              <a href="<?=base_url('guru/addmateri/'.$data->mapelguru_id)?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-flush text-center">
                  <thead class="thead-light">
                    <th width="1%">No</th>
                    <th>Judul</th>
                    <th>Download</th>
                    <th>Waktu</th>
                    <th>Opsi</th>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($list as $d) { ?>
                    <tr>
                      <td><?=$i++?></td>
                      <td><?=ucfirst($d->materi_judul)?></td>
                      <td>
                        <?php if ($d->materi_file != '') { ?> File : <a download="" href="<?=base_url('assets/materi/'.$d->materi_file)?>">Download</a> <?php }else{ echo "<small>File : Tidak ada file yang dilampirkan</small>"; } ?><br>
                        <?php if ($d->materi_video != '') { ?> Video : <a download="" href="<?=base_url('assets/materi/'.$d->materi_video)?>">Download</a> <?php }else{ echo "<small>Video : Tidak ada file yang dilampirkan</small>"; } ?>
                      </td> 
                      <td><?=$d->materi_waktu?></td>
                      <td>
                        <a href="<?=base_url('guru/detailmateri/'.$d->materi_id.'/'.$data->mapelguru_id)?>" class="btn btn-success btn-sm"><span class="fa fa-eye"></span></a>
                        <a href="<?=base_url('guru/editmateri/'.$d->materi_id.'/'.$data->mapelguru_id)?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span></a>
                        <a onclick="return confirm('apakah anda yakin ?')" href="<?=base_url('guru/deletemateri/'.$d->materi_id.'/'.$data->mapelguru_id)?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
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