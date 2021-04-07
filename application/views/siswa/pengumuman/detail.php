<section class="content">
    <div class="container-fluid">
      <div class="row">
        <section class="col-lg-5 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title?></h3>
              <a href="<?=base_url('siswa/pengumuman')?>" class="btn btn-danger btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
              <img src="<?=base_url('assets/img/pengumuman/'.$data->pengumuman_img)?>" alt="" style="width: 100%">
            </div>
            
          </div>
        </section>
        <section class="col-lg-7 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Isi Pengumuman</h3>
            </div>
            <div class="card-body">
              <?=$data->pengumuman_isi;?>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>