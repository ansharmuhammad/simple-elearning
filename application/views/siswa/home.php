<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <center>
        <img src="<?=base_url('assets/img/'.$c->config_logo)?>" alt="" style="width: 130px"><br><br>
      
            <h3 class="title"><b>Selamat datang di Aplikasi E-Learning Online</b><br>
              Anda Login sebagai : <?=strtoupper($this->session->userdata('nama'))?><br>Tahun Ajaran : <?=$ta->tahunajaran_nama?></h3>
          <h4></h4>
      </center>
      <br>
      </section>
      
      <section class="col-lg-4 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              Data Siswa
            </h3>
          </div>
          <div class="card-body">
            <b>NIS :</b> <?=$data->siswa_nis?><br>
            <b>Nama :</b> <?=$data->siswa_nama?><br>
            <b>Jenis Kelamin :</b> <?php if ($data->siswa_jk == 'L') { echo "Laki - Laki"; } else { echo "Perempuan"; } ?><br>
            <b>Tempat, Tanggal Lahir :</b> <?=$data->siswa_tempatlahir?>, <?=date('d-m-Y',strtotime($data->siswa_tanggallahir))?><br>
            <b>Kelas Aktif :</b> <?=$detkelas->kelas_nama?>
          </div>
        </div>
      </section>

      <section class="col-lg-8 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              Petunjuk Penggunaan
            </h3>
          </div>
          <div class="card-body">
            <ol style="padding-left: 10px">
              <li>Silahkan gunakan aplikasi ini dengan bijak</li>
              <li>Pada aplikasi ini siswa dapat melihat materi yang diberikan oleh guru masing - masing sesuai dengan mata pelajaran</li>
              <li>Pada aplikasi ini siswa dapat melihat pengumuman yang disampaikan oleh pihak sekolah yang dibuat oleh admin</li>
              <li>Pada aplikasi ini siswa dapat melihat dan mengumpulkan tugas yang diberikan oleh guru masing - masing guru mata pelajaran</li>
            </ol>
          </div>
        </div>
      </section>
    </div>
  </div>
</section>