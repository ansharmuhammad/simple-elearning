<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <form method="post" action="<?=base_url('admin/addkelas')?>">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
                
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Tingkatan Kelas</label>
                  <select name="kelas" class="form-control" required="">
                    <option value="" selected="" disabled="">--Pilih Tingkatan--</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <select name="jurusan" class="form-control" required="">
                    <option value="" selected="" disabled="">--Pilih Jurusan--</option>
                    <?php foreach ($data as $d) { ?>
                      <option value="<?=$d->jurusan_kode?>"><?=$d->jurusan_nama?></option>
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