<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <form method="post" action="<?=base_url('admin/editmapel/'.$detail->mapel_kode)?>">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
                
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Mata Pelajaran</label>
                  <input type="text" name="mapel_nama" required="" value="<?=$detail->mapel_nama?>" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <select name="mapel_jurusan" class="form-control" required="">
                    <option value="" selected="" disabled="">--Pilih Jurusan--</option>
                    <?php foreach ($data as $d) { ?>
                      <option <?php if ($d->jurusan_kode == $detail->mapel_jurusan) { echo "selected"; }?> value="<?=$d->jurusan_kode?>"><?=$d->jurusan_nama?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <a href="<?=base_url('admin/mapel')?>" class="btn btn-danger">Kembali</a>
                <button type="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            </form>
          </section>
        </div>
      </div>
    </section>