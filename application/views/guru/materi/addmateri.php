<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <form method="post" action="<?=base_url('guru/addmateri/'.$kode)?>" enctype="multipart/form-data">
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
                  <label>File Materi (Optional)</label>
                  <input type="file" name="file" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Materi</label>
                  <textarea class="ckeditor" id="ckeditor" name="isi" required=""></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="<?=base_url('guru/materi/'.$kode)?>" class="btn btn-danger">Kembali</a>
            <button type="simpan" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        </form>
      </section>
    </div>
  </div>
</section>