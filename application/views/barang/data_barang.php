<!DOCTYPE html>
<html>
<head>
  <title>Data Barang</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <?php $this->load->view('_partials/head'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php $this->load->view('_includes/navbar'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $this->load->view('_includes/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('') ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $this->uri->segment(1) ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title mt-1">Data Barang</h3>
            <div class="card-tools">
              <button class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#tambah">Tambah</button>
            </div>
          </div>
          <div class="card-body border-bottom collapse" id="tambah">
            <form method="post" action="<?php echo site_url('barang/add') ?>">
              <div class="form-group">
                <label>Kode</label>
                <input type="text" class="form-control" placeholder="Kode" name="kode" required>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama" required>
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" name="id_kategori" class="form-control select2" required></select>
              </div>
              <div class="form-group">
                <button class="btn btn-primary" type="submit">Tambah</button>
              </div>
            </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table width="100%" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Actions</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('_includes/footer'); ?>

  <!-- Control Sidebar -->
  <?php $this->load->view('_includes/control'); ?>
  <!-- /.control-sidebar -->
  
  <div class="modal">
  <div class="modal-dialog">
  <div class="modal-content">
    <form method="post" action="<?php echo site_url('barang/edit') ?>">
    <div class="modal-header">
      <h5 class="modal-title">Edit Data</h5>
      <button class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <div class="form-group">
          <label>Kode</label>
          <input type="text" class="form-control" placeholder="Kode" name="kode" required>
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" placeholder="Nama" name="nama" required>
        </div>
        <div class="form-group">
          <label>Kategori</label>
          <select name="kategori" name="id_kategori" class="form-control select2" required></select>
        </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-success" type="submit">Edit</button>
      <button class="btn btn-danger" data-dismiss="modal">Batal</button>
    </div>
    </form>
  </div>
  </div>
  </div>

</div>
<!-- ./wrapper -->

<?php $this->load->view('_partials/foot'); ?>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/select2/js/select2.min.js"></script>
<script>
  let read_url = '<?php echo site_url('barang/read') ?>'
  let edit_url = '<?php echo site_url('barang/update') ?>'
  let hapus_url = '<?php echo site_url('barang/delete') ?>'
  let get_kategori_url = '<?php echo site_url('kategori_barang/get_kategori') ?>'
</script>
<script src="<?php echo base_url() ?>assets/js/barang.js"></script>
</body>
</html>
