<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="info-box text-">
              <span class="info-box-icon bg-red" ><center><i class="fa fa-calendar-check" style="margin-right: 20%;color: #fff"></i></center></span>
              <div class="info-box-content">
                <span class="info-box-text">Tahun Ajaran Aktif</span>
                <span class="info-box-number"><?=ucfirst($ta->tahunajaran_nama)?></span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="info-box text-">
              <span class="info-box-icon bg-green" ><center><i class="fa fa-user-tie" style="margin-right: 20%;color: #fff"></i></center></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Guru</span>
                <span class="info-box-number"><?=$guru?> Orang</span>
              </div>
            </div>
          </div>
         <div class="col-lg-3 col-6">
            <div class="info-box text-">
              <span class="info-box-icon bg-blue" ><center><i class="fa fa-book" style="margin-right: 20%;color: #fff"></i></center></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Mata Pelajaran</span>
                <span class="info-box-number"><?=$mapel?> Mata Pelajaran</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="info-box text-">
              <span class="info-box-icon bg-orange" ><center><i class="fa fa-archway" style="margin-right: 20%;color: #fff"></i></center></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Kelas</span>
                <span class="info-box-number"><?=$kelas?> Kelas</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <section class="col-lg-6 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-school mr-1"></i>
                  Data Sekolah
                </h3>
              </div>
              <div class="card-body">
                <p>
                  <b>Nama Sekolah :</b> <?=ucfirst($c->config_sekolah)?> <hr>
                  <b>Alamat Sekolah :</b> <?=ucfirst($c->config_alamat)?> <hr>
                  <b>Email Sekolah :</b> <?=ucfirst($c->config_email)?> <hr>
                  <b>Telfon Sekolah :</b> <?=ucfirst($c->config_phone)?> <hr>
                  <b>Nama Kepala Sekolah :</b> <?=ucfirst($c->config_kepsek)?> <hr>
                  <b>NIP Kepala Sekolah :</b> <?=ucfirst($c->config_nipkepsek)?> <hr>
                </p>
              </div>
            </div>
          </section>
          <section class="col-lg-6 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-map"></i>
                  Lokasi Sekolah
                </h3>
              </div>
              <div class="card-body">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.4866876429246!2d114.41030761527352!3d-2.9623717405876464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de465f145e1bce1%3A0xc7d965ad9ebaf18c!2sSMA%20Negeri%203%20Kuala%20Kapuas!5e0!3m2!1sid!2sid!4v1617764039698!5m2!1sid!2sid" width="100%" height="330" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>