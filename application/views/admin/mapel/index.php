<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
                <a href="<?=base_url('admin/addmapel')?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-flush text-center">
                    <thead class="thead-light">
                      <th width="10%">Kode</th>
                      <th>Mata Pelajaran</th>
                      <th>Jurusan</th>
                      <th>Opsi</th>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($data as $d) { ?>
                      <tr>
                        <td><?=$d->mapel_kode?></td>
                        <td><?=$d->mapel_nama?></td>
                        <td><?=$d->jurusan_nama?></td>
                        <td>
                          <a href="<?=base_url('admin/editmapel/'.$d->mapel_kode)?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span></a>
                          <a onclick="return confirm('apakah anda yakin ?')" href="<?=base_url('admin/deletemapel/'.$d->mapel_kode)?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
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