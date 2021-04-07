<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <form method="post" action="<?=base_url('guru/addtugas/'.$kode)?>" enctype="multipart/form-data">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?=$title?></h3>
            
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul" class="form-control" required="" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Batas Pengumpulan</label>
                  <input type="datetime-local" name="batas" class="form-control" min="<?=date('Y-m-d')?>T00:00" required="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Perintah khusus</label>
                  <textarea class="ckeditor" id="ckeditor" name="isi" required=""></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="<?=base_url('guru/tugas/'.$kode)?>" class="btn btn-danger">Kembali</a>
            <button type="simpan" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        </form>
      </section>
    </div>
  </div>
</section>