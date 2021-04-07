<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
                <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm float-right" >Tambah Data</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-flush text-center">
                    <thead class="thead-light">
                      <th width="1%">No</th>
                      <th>NIS</th>
                      <th>Nama Siswa</th>
                      <th>Opsi</th>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($data as $d) { ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$d->siswa_nis?></td>
                        <td><?=$d->siswa_nama?></td>
                        <td>
                          <a onclick="return confirm('apakah anda yakin ?')" href="<?=base_url('admin/deletedetailkelas/'.$d->kelassiswa_id.'/'.$kode)?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
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

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url('admin/tambahdetailkelas/'.$kode)?>">
      <div class="modal-body">
        <table id="myTable" class="table table-bordered table-flush text-center">
          <thead class="thead-light">
            <th width="1%">No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Opsi</th>
          </thead>
          <tbody>
            <?php $i=1; foreach ($list as $l) { ?>
            <tr>
              <td><?=$i++?></td>
              <td><?=$l->siswa_nis?></td>
              <td><?=$l->siswa_nama?></td>
              <td>
                <input type="checkbox" name="siswa[]" value="<?=$l->siswa_nis?>">
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Siswa</button>
      </div>
      </form>
    </div>
  </div>
</div>