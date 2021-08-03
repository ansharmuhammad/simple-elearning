<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-6 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tugas <?=$detail->tugas_judul?></h3>
            <a href="<?=base_url('siswa/tugas/'.$data->tugas_mapelguru)?>" class="btn btn-danger btn-sm float-right">Kembali</a>
          </div>
          <div class="card-body text-justify">
            <?=$detail->tugas_isi?>
            <b>Batas pengumpulan : <?=date('H:i A, d F Y',strtotime($detail->tugas_batas))?></b>
          </div>
          <div class="card-footer">
            <small>Diposting pada <b><?=date('H:i A, d F Y',strtotime($detail->tugas_waktu))?></b> oleh <b><?=$detail->guru_nama?></b> </small>
          </div>
        </div>
      </section>
      <?php 
      //cek apakah siswa yang login sudah mengumpulkan tugas atau belum
      $cekkumpul  = $this->db->get_where('kumpul',['kumpul_tugas'=>$detail->tugas_id,'kumpul_siswa'=>$this->session->userdata('nis')]);
      $jml        = $cekkumpul->num_rows();
      $dat        = $cekkumpul->row();
      ?>

      <section class="col-lg-6 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pengumpulan Tugas</h3>
          </div>
          <form action="<?=base_url('siswa/upload_tugas/'.$detail->tugas_id)?>" method="post" enctype="multipart/form-data">
          <div class="card-body text-justify">
            Silahkan upload tugas pada form yang telah disediakan, nilai akan muncul jika guru anda telah memberikan nilai pada tugas yang telah anda upload.<hr>
            <?php if ($jml == 0) { ?>
            <div class="input-group">
             <input type="file" name="file" class="form-control" required="">
              <span class="input-group-append">
                <button type="submit" class="btn btn-primary">Upload tugas</button>
              </span>
            </div>
            <?php } else { ?>
            <?php 
              if(strtotime($dat->kumpul_waktu) < strtotime($detail->tugas_batas))
              {

                 $status = ' <span class="badge badge-success">Tepat Waktu</span>';
              }
              elseif (strtotime($dat->kumpul_waktu) == strtotime($detail->tugas_batas)) 
              {
                $status = ' <span class="badge badge-success">Tepat Waktu</span>';
              }
              elseif(strtotime($dat->kumpul_waktu) > strtotime($detail->tugas_batas))
              {
                 $status = ' <span class="badge badge-danger">Terlambat</span>';
              }
            ?>
              <?=$status?><br>
              Anda telah mengumpulkan tugas pada <b><?=date('H:i A, d F Y',strtotime($dat->kumpul_waktu))?></b><br>
              <?php if ($dat->kumpul_nilai != '') { echo "Nilai Tugas : ".$dat->kumpul_nilai; }else {echo "Nilai belum diinputkan";}?>

            <?php } ?>
          </div>
          </form>
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
                <?php } else {?>
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
              <?php } ?>
            </div>
          </div>
          <div class="card-footer">
            <form action="<?=base_url('siswa/komentar/'.$detail->tugas_id)?>" method="post">
              <div class="input-group">
                <input type="hidden" name="jenis" value="tugas">
                <input type="hidden" name="redirect" value="tugas_detail">
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