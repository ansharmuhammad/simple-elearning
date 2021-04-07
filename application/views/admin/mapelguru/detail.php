<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-4 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Mapel Kelas</h3>
              </div>
              <form method="post" action="<?=base_url('admin/tambahdetailmapelguru/'.$kode)?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <select name="mapel" class="form-control" required="">
                      <option value="" selected="" disabled="">--Pilih Mata Pelajaran--</option>
                      <?php foreach ($list as $l) { ?>
                      <option value="<?=$l->mapel_kode?>">[ <?=$l->mapel_kode?> ] | <?=$l->mapel_nama?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Guru</label>
                    <select name="guru" class="form-control" required="">
                      <option value="" selected="" disabled="">--Pilih Guru--</option>
                      <?php foreach ($guru as $g) { ?>
                      <option value="<?=$g->guru_nip?>">[ <?=$g->guru_nip?> ] | <?=$g->guru_nama?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <a href="<?=base_url('admin/mapelguru')?>" class="btn btn-danger">Kembali</a>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
          </section>
          <section class="col-lg-8 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-flush text-center">
                    <thead class="thead-light">
                      <th width="1%">No</th>
                      <th>Mata Pelajaran</th>
                      <th>Nama Guru</th>
                      <th>Opsi</th>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($data as $d) { ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$d->mapel_nama?></td>
                        <td><?=$d->guru_nama?></td>
                        <td>
                          <a onclick="return confirm('apakah anda yakin ?')" href="<?=base_url('admin/deletedetailmapelguru/'.$d->mapelguru_id.'/'.$kode)?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
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
