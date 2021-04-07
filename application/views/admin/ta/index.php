<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="alert alert-primary" role="alert">
              <h4 class="alert-heading">Pemberitahuan!</h4>
              <p>Perlu diketahui dan diingat tahun ajaran yang aktif akan mempengaruhi penggunaan data, oleh karna itu harap hati - hati terhadap tahun ajaran yang aktif<br>Pastikan mengubah status tahun ajaran pada setiap awal semester / tahun ajaran baru</p>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
                <a href="<?=base_url('admin/addta')?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-flush text-center">
                    <thead class="thead-light">
                      <th width="1%">No</th>
                      <th>Tahun Ajaran</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($data as $d) { ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$d->tahunajaran_nama?></td>
                        <td><?php if ($d->tahunajaran_status == 'T') { echo ' <span class="badge badge-success">Aktif</span> '; }else{ echo ' <span class="badge badge-danger">Tidak Aktif</span> '; } ?></td>
                        <td>
                          <?php if ($d->tahunajaran_status == 'F') { ?>
                            <a onclick="return confirm('apakah anda yakin ?')" href="<?=base_url('admin/aktifkanta/'.$d->tahunajaran_kode)?>" class="btn btn-info btn-sm"><span class="fa fa-check"></span></a>
                          <?php } ?>
                          <a onclick="return confirm('apakah anda yakin ?')" href="<?=base_url('admin/deleteta/'.$d->tahunajaran_kode)?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                        </td>
                      </tr>
                      <?php } ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>