<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <form method="post" action="<?=base_url('admin/addguru')?>">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?=$title?></h3>
            
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Nomor Identitas Pegawai</label>
              <input type="number" name="guru_nip" class="form-control" required="" >
            </div>
            <div class="form-group">
              <label>Nama Guru</label>
              <input type="text" name="guru_nama" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin Guru</label>
              <select name="guru_jk" class="form-control" required="">
                <option value="" selected="" disabled="">--Pilih Jenis Kelamin--</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="guru_tempatlahir" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="date" name="guru_tanggallahir" class="form-control" required="">
            </div>
          </div>
          <div class="card-footer">
            <a href="<?=base_url('admin/guru')?>" class="btn btn-danger">Kembali</a>
            <button type="simpan" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        </form>
      </section>
    </div>
  </div>
</section>