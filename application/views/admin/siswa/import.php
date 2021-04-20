<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <form method="post" action="<?=base_url('admin/importsiswa/proses')?>" enctype="multipart/form-data">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?=$title?></h3>
            <a download="" href="<?=base_url('assets/format.xlsx')?>" class="btn btn-info btn-sm float-right" style="margin-right: 5px">Download Format</a>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>File data siswa</label>
              <input type="file" name="file" class="form-control" required="" accept=".xls,.xlsx">
              <p class="small" style="color: red">* Gunakan file dengan extensi .xlsx dan sesuai dengan format yang telah disediakan</p>
            </div>
          
        </div>
        <div class="card-footer">
            <a href="<?=base_url('admin/siswa')?>" class="btn btn-danger">Kembali</a>
            <button type="simpan" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </section>
    </div>
  </div>
</section>