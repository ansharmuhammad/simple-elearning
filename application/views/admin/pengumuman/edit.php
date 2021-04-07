<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <form method="post" action="<?=base_url('admin/editpengumuman/'.$data->pengumuman_id)?>" enctype="multipart/form-data">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?=$title?></h3>
            
          </div>
          <div class="card-body">
            <?php if ($data->pengumuman_img != '') { ?>
            <img src="<?=base_url('assets/img/pengumuman/'.$data->pengumuman_img)?>" alt="" style="width: 100%">
            <hr>
            <?php } ?>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul" value="<?=$data->pengumuman_judul?>" class="form-control" required="" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Gambar Sampul</label>
                  <input type="file" name="img" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Isi Pengumuman</label>
                  <textarea class="ckeditor" id="ckeditor" name="isi" required=""><?=$data->pengumuman_isi?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="<?=base_url('admin/pengumuman')?>" class="btn btn-danger">Kembali</a>
            <button type="simpan" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        </form>
      </section>
    </div>
  </div>
</section>