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
                    <th>Judul</th>
                    <th>Waktu</th>
                    <th>Opsi</th>
                  </thead>
                  <tbody>
                    <?php $i=1; 
                    foreach ($data as $d) {  ?>
                    <tr>
                      <td><?=$i++?></td>
                      <td><?=ucfirst($d->pengumuman_judul)?></td>
                      <td><?=date('H:i A, d F Y',strtotime($d->pengumuman_waktu))?></td>
                      <td><a href="<?=base_url('guru/pengumuman/'.$d->pengumuman_id)?>" class="btn btn-sm btn-info"><span class="fa fa-eye"></span></a></td>
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