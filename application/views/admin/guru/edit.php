<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <form method="post" action="<?=base_url('admin/editguru/'.$detail->guru_nip)?>">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?=$title?></h3>
            
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>NNomor Identitas Pegawai</label>
              <input type="number" name="guru_nip" value="<?=$detail->guru_nip?>" class="form-control" required="" readonly="">
            </div>
            <div class="form-group">
              <label>Nama Siswa</label>
              <input type="text" name="guru_nama" value="<?=$detail->guru_nama?>" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin Siswa</label>
              <select name="guru_jk" class="form-control" required="">
                <option value="" selected="" disabled="">--Pilih Jenis Kelamin--</option>
                <option <?php if ($detail->guru_jk == 'L') { echo "selected"; }?> value="L">Laki - Laki</option>
                <option <?php if ($detail->guru_jk == 'P') { echo "selected"; }?> value="P">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="guru_tempatlahir" value="<?=$detail->guru_tempatlahir?>" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="date" name="guru_tanggallahir" value="<?=$detail->guru_tanggallahir?>" class="form-control" required="">
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