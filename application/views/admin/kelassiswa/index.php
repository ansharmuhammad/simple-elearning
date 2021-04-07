<section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
                <a href="<?=base_url('admin/addkelas')?>" class="btn btn-primary btn-sm float-right">Tambah Data</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-flush text-center">
                    <thead class="thead-light">
                      <th width="1%">No</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                      <th>Jumlah Siswa</th>
                      <th>Opsi</th>
                    </thead> 
                    <tbody>
                      <?php $i=1; foreach ($data as $d) { 
                        $cek = $this->db->get_where('relasi_kelassiswa',['kelassiswa_kelas'=>$d->kelas_kode,'kelassiswa_tahunajaran'=>$ta->tahunajaran_kode])->num_rows();
                      ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$d->kelas_nama?></td>
                        <td><?=$d->jurusan_nama?></td>
                        <td><?=$cek?> Siswa</td>
                        <td>
                          <a href="<?=base_url('admin/detailkelas/'.$d->kelas_kode)?>" class="btn btn-info btn-sm">Detail</a>
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