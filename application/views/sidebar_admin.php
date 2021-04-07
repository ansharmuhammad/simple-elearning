<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('admin')?>" class="brand-link">
      <img src="<?=base_url('assets/img/'.$c->config_logo)?>" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-Learning Sekolah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('assets/')?>img/noprofile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=ucfirst($this->session->userdata('nama'))?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?=base_url('admin')?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- menu master -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/kelas')?>" class="nav-link">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/siswa')?>" class="nav-link">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/guru')?>" class="nav-link">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/mapel')?>" class="nav-link">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>Mata Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/tahunajaran')?>" class="nav-link">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>Tahun Ajaran</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu relasi -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clone"></i>
              <p>
                Data Relasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/kelassiswa')?>" class="nav-link">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>Kelas - Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/mapelguru')?>" class="nav-link">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>Mapel - Guru - Kelas</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- management user -->
          <li class="nav-item">
            <a href="<?=base_url('admin/user')?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Manajemen User
              </p>
            </a>
          </li>

          <!-- pengumuman -->
          <li class="nav-item">
            <a href="<?=base_url('admin/pengumuman')?>" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Pengumuman
              </p>
            </a>
          </li>

          <!-- pengaturan -->
          <li class="nav-item">
            <a href="<?=base_url('admin/pengaturan')?>" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li>

          <!-- logout sistem -->
          <li class="nav-item">
            <a onclick="return confirm('apakah anda yakin ?')" href="<?=base_url('auth/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>