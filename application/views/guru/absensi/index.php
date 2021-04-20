<section class="col-lg-12 connectedSortable">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?=$title?></h3>
      <a href="<?=base_url('guru/addabsensi/'.$data->mapelguru_id)?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-flush text-center">
          <thead class="thead-light">
            <th width="1%">No</th>
            <th>Materi</th>
            <th>Waktu</th>
            <th>Opsi</th>
          </thead>
          <tbody>
            <?php $i=1; foreach ($list as $d) { ?>
            <tr>
              <td><?=$i++?></td>
              <td><?=ucfirst($d->materi_judul)?></td>
              <td><?=date('H:i:s A, d-m-Y',strtotime($d->absensi_waktu))?></td>
              <td>
                <a href="<?=base_url('guru/editabsensi/'.$d->absensi_id)?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span></a>
                <a onclick="return confirm('apakah anda yakin ?')" href="<?=base_url('guru/deletetabsensi/'.$d->absensi_id)?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
              </td>
            </tr>
            <?php } ?>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>