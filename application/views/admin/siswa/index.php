<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
                <a href="<?=base_url('admin/addsiswa')?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                <a download="" href="<?=base_url('admin/downloaddatasiswa/')?>" class="btn btn-info btn-sm float-right" style="margin-right: 5px">Download data siswa</a>
                <a  href="<?=base_url('admin/importsiswa/')?>" class="btn btn-warning btn-sm float-right" style="margin-right: 5px; color: white">Import data siswa</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-flush text-center">
                    <thead class="thead-light">
                      <th width="1%">No</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <th>Opsi</th>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($data as $d) { 
                        $cek = $this->db->get_where('user',['user_username'=>$d->siswa_nis])->num_rows();
                      ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$d->siswa_nis?></td>
                        <td><?=$d->siswa_nama?></td>
                        <td><?php if ($d->siswa_jk == 'L') { echo "Laki - Laki"; }else { echo "Perempuan"; } ?></td>
                        <td><?=$d->siswa_tempatlahir?>, <?=date('d-m-Y',strtotime($d->siswa_tanggallahir))?></td>
                        <td>
                          <?php if ($cek == 0) { ?>
                          <a onclick="return confirm('anda akan menambahkan user untuk <?=$d->siswa_nama?> ?')" href="<?=base_url('admin/aktifusersiswa/'.$d->siswa_nis)?>" class="btn btn-success btn-sm"><span class="fa fa-user-plus"></span></a>
                          <?php } ?>
                          <a href="<?=base_url('admin/editsiswa/'.$d->siswa_nis)?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span></a>
                          <a onclick="return confirm('apakah anda yakin ?')" href="<?=base_url('admin/deletesiswa/'.$d->siswa_nis)?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
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