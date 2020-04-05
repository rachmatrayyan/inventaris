<?php $uri = $this->uri->segment(1) ?>
<?php $uri1 = $this->uri->segment(2) ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link text-center">
    <span class="brand-text font-weight-light">Inventaris</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img style="width: 2.3rem;height: 2.1rem;object-fit: cover;" src="<?php echo base_url('uploads/').$this->session->userdata('user')->foto ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $this->session->userdata('user')->nama ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo site_url('dashboard') ?>" class="nav-link <?php echo $uri == '' | $uri === 'dashboard' ? 'active' : ''  ?>">
            <i class="nav-icon fas fa-chart-area"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item has-treeview <?php echo $uri === 'barang' | $uri === 'kategori_barang' ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?php echo $uri === 'barang' | $uri === 'kategori_barang' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-archive"></i>
            <p>Barang</p>
            <i class="fas fa-angle-right right"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('barang') ?>" class="nav-link <?php echo $uri === 'barang' ? 'active' : '' ?>">
                <i class="nav-icon far fa-circle"></i>
                <p>Data Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('kategori_barang') ?>" class="nav-link <?php echo $uri === 'kategori_barang' ? 'active' : '' ?>">
                <i class="nav-icon far fa-circle"></i>
                <p>Kategori Barang</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview <?php echo $uri === 'stok' ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?php echo $uri === 'stok' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-box"></i>
            <p>Stok</p>
            <i class="fas fa-angle-right right"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('stok/masuk') ?>" class="nav-link <?php echo $uri1 === 'masuk' ? 'active' : '' ?>">
                <i class="nav-icon far fa-circle"></i>
                <p>Stok Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('stok/keluar') ?>" class="nav-link <?php echo $uri1 === 'keluar' ? 'active' : '' ?>">
                <i class="nav-icon far fa-circle"></i>
                <p>Stok Keluar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('stok') ?>" class="nav-link <?php echo $uri === 'stok' && $uri1 == '' ? 'active' : '' ?>">
                <i class="nav-icon far fa-circle"></i>
                <p>Data Stok</p>
              </a>
            </li>
          </ul>
        </li>

        <?php if ($this->session->userdata('user')->role === '1'): ?>
          <li class="nav-item">
            <a href="<?php echo site_url('pengguna') ?>" class="nav-link <?php echo $uri === 'pengguna' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>Pengguna</p>
            </a>
          </li>
        <?php endif ?>

        <li class="nav-item">
          <a href="<?php echo site_url('logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-door-open"></i>
            <p>Logout</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>