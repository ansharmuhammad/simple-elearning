<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <form method="post" action="<?=base_url('admin/editsiswa/'.$detail->siswa_nis)?>">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?=$title?></h3>
            
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Nomor Induk Siswa</label>
              <input type="number" name="siswa_nis" value="<?=$detail->siswa_nis?>" class="form-control" required="" readonly="">
            </div>
            <div class="form-group">
              <label>Nama Siswa</label>
              <input type="text" name="siswa_nama" value="<?=$detail->siswa_nama?>" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin Siswa</label>
              <select name="siswa_jk" class="form-control" required="">
                <option value="" selected="" disabled="">--Pilih Jenis Kelamin--</option>
                <option <?php if ($detail->siswa_jk == 'L') { echo "selected"; }?> value="L">Laki - Laki</option>
                <option <?php if ($detail->siswa_jk == 'P') { echo "selected"; }?> value="P">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="siswa_tempatlahir" value="<?=$detail->siswa_tempatlahir?>" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="date" name="siswa_tanggallahir" value="<?=$detail->siswa_tanggallahir?>" class="form-control" required="">
            </div>
          </div>
          <div class="card-footer">
            <a href="<?=base_url('admin/siswa')?>" class="btn btn-danger">Kembali</a>
            <button type="simpan" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        </form>
      </section>
    </div>
  </div>
</section>