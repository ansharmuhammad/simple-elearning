<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Materi <?=$detail->materi_judul?></h3>
            <a href="<?=base_url('siswa/materi/'.$data->materi_mapelguru)?>" class="btn btn-danger btn-sm float-right">Kembali</a>
          </div>
          <div class="card-body text-justify">
            <?=$detail->materi_isi?>
          </div>
          <div class="card-footer">
            <small>Diposting pada <b><?=date('H:i A, d F Y',strtotime($detail->materi_waktu))?></b> oleh <b><?=$detail->guru_nama?></b> | <?php if ($detail->materi_file != '') {?> <a href="<?=base_url('assets/materi/'.$detail->materi_file)?>">Download file materi</a><?php } else { echo "Materi tidak memiliki file untuk didownload"; } ?> </small>
          </div>
        </div>
      </section>

      <section class="col-lg-8 connectedSortable">
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
                  $user   = $detail->guru_nama.' [Guru]';
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
            <form action="<?=base_url('siswa/komentar/'.$detail->materi_id)?>" method="post">
              <div class="input-group">
                <input type="hidden" name="jenis" value="materi">
                <input type="hidden" name="redirect" value="materi_detail">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control" required="" autocomplete="off">
                <span class="input-group-append">
                  <button type="submit" class="btn btn-primary">Send</button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </section>
      <section class="col-lg-4 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Petunjuk</h3>
          </div>
          <div class="card-body text-justify">
            Kolom komentar dapat digunakan oleh guru dan siswa untuk berdiskusi.<br>
            Gunakan kolom komentar dengan bijak dan penuh tanggung jawab.
          </div>
        </div>
      </section>

    </div>
  </div>
</section>