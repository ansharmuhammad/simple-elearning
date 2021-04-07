<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-flush text-center">
                    <thead class="thead-light">
                      <th width="1%">Kode</th>
                      <th>Mata Pelajaran</th>
                      <th>Guru</th>
                      <th>Materi</th>
                      <th>Tugas</th>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($data as $d) { ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$d->mapel_nama?></td>
                        <td><?=$d->guru_nama?></td>
                        <td><a href="<?=base_url('siswa/materi/'.$d->mapelguru_id)?>" class="btn btn-info btn-sm">click here</a></td>
                        <td><a href="<?=base_url('siswa/tugas/'.$d->mapelguru_id)?>" class="btn btn-secondary btn-sm">click here</a></td>
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