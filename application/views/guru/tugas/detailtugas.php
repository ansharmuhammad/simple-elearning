<section class="content">
    <div class="container-fluid">
      <div class="row">
        <section class="col-lg-6 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Mata Pelajaran</h3>
              <a href="<?=base_url('guru/tugas/'.$kode)?>" class="btn btn-danger btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
              <b>Judul :</b> <?=$tugas->tugas_judul?><br>             
              <b>Batas Pengumpulan :</b> <?=$tugas->tugas_batas?><br>             
              <b>Mata Pelajaran :</b> <?=$data->mapel_nama?><br>
              <b>Kelas :</b> <?=$data->kelas_nama?><br>
              <b>Guru :</b> <?=$data->guru_nama?><br>
            </div>
          </div>
        </section> 
        <section class="col-lg-6 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Instruksi Khusus</h3>
            </div>
            <div class="card-body text-justify">
                <?=$tugas->tugas_isi?>
            </div>
          </div>
        </section>
        <section class="col-lg-12 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Pengumpulan Tugas</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="text-align: justify;">
              
              </div>
            </div>
            <div class="card-footer">
              <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-flush text-center">
                  <thead class="thead-light">
                    <th width="1%">No</th>
                    <th>Siswa</th>
                    <th>File</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Nilai</th>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($list as $d) { ?>
                    <tr>
                      <td><?=$i++?></td>
                      <td><?=$d->siswa_nis?> | <?=$d->siswa_nama?></td>
                      <td><a download="" href="<?=base_url('assets/tugas/'.$d->kumpul_file)?>">Download</a></td> 
                      <td><?=$d->kumpul_waktu?></td>
                      <td>
                        <?php 
                        if(strtotime($d->kumpul_waktu) < strtotime($tugas->tugas_batas))
                        {

                           echo ' <span class="badge badge-success">Tepat Waktu</span>';
                        }
                        elseif (strtotime($d->kumpul_waktu) == strtotime($tugas->tugas_batas)) 
                        {
                          echo ' <span class="badge badge-success">Tepat Waktu</span>';
                        }
                        elseif(strtotime($d->kumpul_waktu) > strtotime($tugas->tugas_batas))
                        {
                           echo ' <span class="badge badge-danger">Terlambat</span>';
                        }
                        ?>
                      </td>
                      <td>
                        <?php if ($d->kumpul_nilai == '' || $d->kumpul_nilai == null) { ?>
                          <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#nilai<?=$d->kumpul_id?>"><span class="fa fa-plus"></span> Nilai</a>
                        <?php } else { echo $d->kumpul_nilai; }?>
                        
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
  <?php $i=1; foreach ($list as $d) { ?>
  <div class="modal fade" id="nilai<?=$d->kumpul_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Berikan Nilai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?=base_url('guru/inputnilai/'.$d->kumpul_id.'/'.$tugas->tugas_id.'/'.$kode)?>">
        <div class="modal-body">
          <div class="form-group">
            <label>Masukan Nilai siswa <?=$d->siswa_nama?></label>
            <input type="number" name="nilai" class="form-control" required="" min="0" max="100">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>

  <section class="col-lg-12 connectedSortable">
        <!-- DIRECT CHAT -->
        <div class="card direct-chat direct-chat-primary">
          <div class="card-header">
            <h3 class="card-title">Komentar</h3>
          </div>
          <div class="card-body">
            <div class="direct-chat-messages">

              <?php foreach ($komentar as $k) { 
                $peran = "murid";
                if ($k->komentar_user != '') {
                  $cek    = $this->db->get_where('siswa',['siswa_nis'=>$k->komentar_user])->row();
                  $user   = $cek->siswa_nama.' [Siswa]';
                  $peran = "murid";
                }
                else
                {
                  $user   = $detail->guru_nama.' [Guru]';
                  $peran = "guru";
                }
                if ($peran == "murid") { ?>
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left"><?=$user?></span>
                      <span class="direct-chat-timestamp float-right"><?=date('d F Y, H:i A',strtotime($k->komentar_waktu))?></span>
                    </div>
                    <img class="direct-chat-img" src="<?=base_url('assets/')?>img/<?=$c->config_logo?>">
                    <div class="direct-chat-text">
                      <?=ucfirst($k->komentar_isi)?>
                    </div>
                  </div>
                <?php } else {?>
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left"><?=$user?></span>
                      <span class="direct-chat-timestamp float-right"><?=date('d F Y, H:i A',strtotime($k->komentar_waktu))?></span>
                    </div>
                    <img class="direct-chat-img" src="<?=base_url('assets/')?>img/<?=$c->config_logo?>">
                    <div class="direct-chat-text">
                      <?=ucfirst($k->komentar_isi)?>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <div class="card-footer">
            <form action="<?=base_url('guru/komentar/'.$tugas->tugas_id)?>" method="post">
              <div class="input-group">
                <input type="hidden" name="jenis" value="tugas">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control" required="" autocomplete="off">
                <span class="input-group-append">
                  <button type="submit" class="btn btn-primary">Send</button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </section>

  