<section class="content">
    <div class="container-fluid">
      <div class="row">
        
        <section class="col-lg-8 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?=$title?></h3>
              
            </div>
            <form method="post" action="<?=base_url('guru/update_profile')?>">
            <div class="card-body row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nomor Identitas Pegawai (NIP)</label>
                  <input type="text" name="nip" readonly="" class="form-control" value="<?=$data->guru_nip?>" required>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="jk" class="form-control" required="">
                    <option value="L" <?php if ($data->guru_jk == 'L') { echo "selected"; } ?>>Laki - Laki</option>
                    <option value="P" <?php if ($data->guru_jk == 'P') { echo "selected"; } ?>>Perempuan</option>
                  </select>
                </div>
                 <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" name="tanggallahir" required="" class="form-control" value="<?=$data->guru_tanggallahir?>">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Guru</label>
                  <input type="text" name="nama" required="" class="form-control" value="<?=$data->guru_nama?>">
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempatlahir" required="" class="form-control" value="<?=$data->guru_tempatlahir?>">
                </div>
                <div class="form-group">
                  <p class="small" style="color: red">Note : Tempat lahir diisi dengan menunjukan kota kelahiran saja</p>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?=base_url('guru')?>" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </section>
        
        
        <section class="col-lg-4 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Informasi Login</h3>
            </div>
            <form onsubmit="return confirm('apakah anda yakin ingin mengganti password ?')" method="post" action="<?=base_url('guru/update_password')?>">
            <div class="card-body">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" readonly="" class="form-control" value="<?=$data->guru_nip?>" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" required="" autocomplete="off">
                <p class="small" style="color: red">Note : Masukan password jika ingin menggantinya</p>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?=base_url('guru')?>" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>

        </section>
        
      </div>
    </div>
  </section>

