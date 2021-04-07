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
                      <th width="1%">No</th>
                      <th>Judul Materi</th>
                      <th>Waktu</th>
                      <th>File</th>
                      <th>Opsi</th>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($data as $d) { ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$d->materi_judul?></td>
                        <td><?=date('H:i A, d F Y',strtotime($d->materi_waktu))?></td>
                        <td><?php if ($d->materi_file != '') {?><a download href="<?=base_url('assets/materi/'.$d->materi_file)?>" class="btn btn-secondary btn-sm">Download file</a><?php }else{ echo "-"; } ?></td>
                        <td><a href="<?=base_url('siswa/materi_detail/'.$d->materi_id)?>" class="btn btn-info btn-sm"><span class="fa fa-book-open"></span> Baca</a></td>
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