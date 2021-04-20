<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <form method="post" action="<?=base_url('guru/addabsensi/'.$data->mapelguru_id)?>">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?=$title?></h3>
            
          </div>
          <div class="card-body row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Mata pelajaran</label>
                <input type="text" class="form-control" readonly="" value="<?=$data->mapel_nama?>">
              </div>              
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Materi</label>
                <select name="materi" class="form-control" required="">
                  <option value="" selected="" disabled="">--Pilih Materi--</option>
                  <?php foreach ($materi as $m) { ?>
                      <option value="<?=$m->materi_id?>"><?=$m->materi_judul?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-12"><br></div>
            <div class="col-md-12">
              <table  class="table table-bordered table-flush text-center">
                <thead class="thead-light">
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>H</th>
                  <th>I</th>
                  <th>S</th>
                  <th>A</th>
                </thead> 
                <tbody>
                  <?php $i=1; foreach ($list as $d) { 
                  ?>
                  <tr>
                    <td><?=$d->siswa_nis?></td>
                    <td><?=$d->siswa_nama?></td>
                    <td><input type="radio" name="kehadiran<?=$d->siswa_nis?>" value="H" required></td>
                    <td><input type="radio" name="kehadiran<?=$d->siswa_nis?>" value="I" required></td>
                    <td><input type="radio" name="kehadiran<?=$d->siswa_nis?>" value="S" required></td>
                    <td><input type="radio" name="kehadiran<?=$d->siswa_nis?>" value="A" required></td>
                  </tr>
                  <?php } ?>
                  
                </tbody>
              </table>            
            </div>
          </div>
          <div class="card-footer">
            <a href="<?=base_url('guru/absensi/'.$data->mapelguru_id)?>" class="btn btn-danger">Kembali</a>
            <button type="simpan" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        </form>
      </section>
    </div>
  </div>
</section>