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
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Role</th>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($data as $d) { 
                        if ($d->user_role == 'siswa') {
                          $cek = $this->db->get_where('siswa',['siswa_nis'=>$d->user_username])->row();
                          $nama= $cek->siswa_nama;
                        }
                        else
                        {
                          $cek = $this->db->get_where('guru',['guru_nip'=>$d->user_username])->row();
                          $nama= $cek->guru_nama;
                        }
                      ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$nama?></td>
                        <td><?=$d->user_username?></td>
                        <td><?=ucfirst($d->user_role)?></td>
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