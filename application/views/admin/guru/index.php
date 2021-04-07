<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
                <a href="<?=base_url('admin/addguru')?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-flush text-center">
                    <thead class="thead-light">
                      <th width="1%">No</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <th>Opsi</th>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($data as $d) { 
                        $cek = $this->db->get_where('user',['user_username'=>$d->guru_nip])->num_rows();
                      ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$d->guru_nip?></td>
                        <td><?=$d->guru_nama?></td>
                        <td><?php if ($d->guru_jk == 'L') { echo "Laki - Laki"; }else { echo "Perempuan"; } ?></td>
                        <td><?=$d->guru_tempatlahir?>, <?=date('d-m-Y',strtotime($d->guru_tanggallahir))?></td>
                        <td>
                          <?php if ($cek == 0) { ?>
                          <a onclick="return confirm('anda akan menambahkan user untuk <?=$d->guru_nama?> ?')" href="<?=base_url('admin/aktifuserguru/'.$d->guru_nip)?>" class="btn btn-success btn-sm"><span class="fa fa-user-plus"></span></a>
                          <?php } ?>
                          <a href="<?=base_url('admin/editguru/'.$d->guru_nip)?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span></a>
                          <a onclick="return confirm('apakah anda yakin ?')" href="<?=base_url('admin/deleteguru/'.$d->guru_nip)?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
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