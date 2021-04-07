<section class="content">
      <div class="container-fluid">
        <form method="post" action="<?=base_url('admin/pengaturan')?>" enctype="multipart/form-data">
        <div class="row">
          
          <section class="col-lg-8 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
              </div>
              <div class="card-body row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Sekolah</label>
                    <input type="text" name="sekolah" class="form-control" required="" value="<?=$c->config_sekolah?>">
                  </div>
                  <div class="form-group">
                    <label>Telfon Sekolah</label>
                    <input type="number" name="phone" class="form-control" required="" value="<?=$c->config_phone?>">
                  </div>
                  <div class="form-group">
                    <label>Nama Kepala sekolah</label>
                    <input type="text" name="kepsek" class="form-control" required="" value="<?=$c->config_kepsek?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kota Sekolah</label>
                    <input type="text" name="kota" class="form-control" required="" value="<?=$c->config_kota?>">
                  </div>
                  <div class="form-group">
                    <label>Email Sekolah</label>
                    <input type="email" name="email" class="form-control" required="" value="<?=$c->config_email?>">
                  </div>
                  <div class="form-group">
                    <label>NIP Kepala sekolah</label>
                    <input type="text" name="nipkepsek" class="form-control" required="" value="<?=$c->config_nipkepsek?>">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Alamat Sekolah</label>
                   <textarea class="form-control" required="" name="alamat"><?=$c->config_alamat?></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Author Aplikasi</label>
                    <input type="text" name="author" class="form-control" required="" value="<?=$c->config_author?>">
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="col-lg-4 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Logo Sekolah</h3>
              </div>
              <div class="card-body">
                <img src="<?=base_url('assets/img/'.$c->config_logo)?>" alt="" style="width: 100%">
                <hr>
                <input type="file" name="logo" class="form-control">
              </div>
              <div class="card-footer text-center">
                <a href="<?=  base_url('admin')?>" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </section>
          
        </div>
        </form>
      </div>
    </section>