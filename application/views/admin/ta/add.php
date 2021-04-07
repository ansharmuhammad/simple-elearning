<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <form method="post" action="<?=base_url('admin/addta')?>">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
                
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Jenis Tahun Ajaran</label>
                  <select name="jenis" class="form-control" required="">
                    <option value="" selected="" disabled="">--Pilih Jenis Tahun Ajaran--</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tahun Awal</label>
                  <input type="text" name="awal" required="" class="form-control">
                </div>
                <div class="form-group">
                  <label>Tahun Akhir</label>
                  <input type="text" name="akhir" required="" class="form-control">
                </div>
              </div>
              <div class="card-footer">
                <a href="<?=base_url('admin/tahunajaran')?>" class="btn btn-danger">Kembali</a>
                <button type="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            </form>
          </section>
        </div>
      </div>
    </section>