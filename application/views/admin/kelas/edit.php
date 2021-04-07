<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <form method="post" action="<?=base_url('admin/editkelas/'.$detail->kelas_kode)?>">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Tingkatan Kelas</label>
                  <?php $kelas = explode(" ", $detail->kelas_nama);?>
                  <select name="kelas" class="form-control" required="">
                    <option value="">--Pilih Tingkatan--</option>
                    <option <?php if ($kelas[0] == 'X') { echo "selected"; }?> value="X">X</option>
                    <option <?php if ($kelas[0] == 'XI') { echo "selected"; }?> value="XI">XI</option>
                    <option <?php if ($kelas[0] == 'XII') { echo "selected"; }?> value="XII">XII</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <select name="jurusan" class="form-control" required="">
                    <option value="">--Pilih Jurusan--</option>
                    <?php foreach ($data as $d) { ?>
                      <option <?php if ($detail->kelas_jurusan == $d->jurusan_kode) { echo "selected"; }?> value="<?=$d->jurusan_kode?>"><?=$d->jurusan_nama?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <a href="<?=base_url('admin/kelas')?>" class="btn btn-danger">Kembali</a>
                <button type="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            </form>
          </section>
        </div>
      </div>
    </section>