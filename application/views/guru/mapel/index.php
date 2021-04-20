<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
          <div class="alert alert-info" role="alert">
            <b>Petunjuk :</b><br>
            Dibawah ini merupakan daftar mata pelajaran yang anda ampu pada tahun ajaran yang sedang berjalan, guanakan menu dibawah ini untuk pembelajaran, baik memberikan tugas,nilai, dll.
          </div>
          </section>

          <?php foreach ($data as $d) { ?>
          <section class="col-lg-3 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <h5 class="title" style="font-weight: bold"><?=$d->mapel_nama?> - <?=$d->kelas_nama?></h5>
                </h3>
              </div>
              <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><a href="<?=base_url('guru/materi/'.$d->mapelguru_id)?>"><i class="fa fa-chevron-right"></i> Materi </a>
                    <li class="list-group-item"><a href="<?=base_url('guru/tugas/'.$d->mapelguru_id)?>"><i class="fa fa-chevron-right"></i> Tugas </a></li>
                    <li class="list-group-item"><a href="<?=base_url('guru/absensi/'.$d->mapelguru_id)?>"><i class="fa fa-chevron-right"></i> Absensi </a></li>
                </ul>
              </div>
            </div>
          </section>
          <?php } ?>
        </div>
      </div>
    </section>