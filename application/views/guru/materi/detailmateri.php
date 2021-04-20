<section class="content">
    <div class="container-fluid">
      <div class="row">
        <section class="col-lg-6 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Mata Pelajaran</h3>
              <a href="<?=base_url('guru/materi/'.$kode)?>" class="btn btn-danger btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
              <b>Judul :</b> <?=$materi->materi_judul?><br>
              <b>Mata Pelajaran :</b> <?=$data->mapel_nama?><br>
              <b>Kelas :</b> <?=$data->kelas_nama?><br>
              <b>Guru :</b> <?=$data->guru_nama?><br>
            </div>
          </div>
        </section>
        <section class="col-lg-12 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Materi</h3>
            </div>
            <div class="card-body" style="text-align: justify;">
              <?=$materi->materi_isi?>
              <?php if ($materi->materi_video != '' or $materi->materi_video != null) { ?>
                Video Materi : <br>
                <video src="<?=base_url('assets/materi/'.$materi->materi_video)?>" controls="" style="width: 100%"></video>
              <?php } ?>
            </div>
            <div class="card-footer">
              Download materi : <?php if ($materi->materi_file != '') { ?> <a download="" href="<?=base_url('assets/materi/'.$materi->materi_file)?>">Download</a> <?php }else{ echo "<small>Tidak ada file yang dilampirkan</small>"; } ?>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
  <section class="col-lg-12 connectedSortable">
        <!-- DIRECT CHAT -->
        <div class="card direct-chat direct-chat-primary">
          <div class="card-header">
            <h3 class="card-title">Komentar</h3>
          </div>
          <div class="card-body">
            <div class="direct-chat-messages">

              <?php foreach ($komentar as $k) { 
                if ($k->komentar_user != '') {
                  $cek    = $this->db->get_where('siswa',['siswa_nis'=>$k->komentar_user])->row();
                  $user   = $cek->siswa_nama.' [Siswa]';
                }
                else
                {
                  $user   = $materi->guru_nama.' [Guru]';
                }
              ?>
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
              <?php } ?>
            </div>
          </div>
          <div class="card-footer">
            <form action="<?=base_url('guru/komentar/'.$materi->materi_id)?>" method="post">
              <div class="input-group">
                <input type="hidden" name="jenis" value="materi">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control" required="" autocomplete="off">
                <span class="input-group-append">
                  <button type="submit" class="btn btn-primary">Send</button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </section>