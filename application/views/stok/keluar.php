<!DOCTYPE html>
<html>
<head>
  <title>Stok Keluar</title>
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
            <h1 class="m-0 text-dark">Stok Keluar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('') ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $this->uri->segment(1) ?></li>
              <li class="breadcrumb-item active"><?php echo $this->uri->segment(2) ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Kurangi Stok</h3>
            </div>
            <div class="card-body border-bottom">
              <form method="post" action="<?php echo site_url('stok/keluar') ?>">
                <div class="form-group">
                  <label>Kode</label>
                  <select name="kode" class="form-control select2" required></select>
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" class="form-control" placeholder="Jumlah" name="jumlah" required>
                  <small class="text-muted d-block"></small>
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card card-default">
            <div class="card-header">
              <h5 class="card-title">Data Pengurangan Stok</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table width="100%" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Barang</th>
                      <th>Jumlah</th>
                      <th>Tanggal</th>
                      <th>Keterangan</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
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

</div>
<!-- ./wrapper -->

<?php $this->load->view('_partials/foot'); ?>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/select2/js/select2.min.js"></script>
<script>
  let read_url = '<?php echo site_url('stok/read/keluar') ?>'
  let hapus_url = '<?php echo site_url('stok/delete') ?>'
  let get_barang_url = '<?php echo site_url('barang/get_barang') ?>'
</script>
<script src="<?php echo base_url() ?>assets/js/stok_keluar.js"></script>
</body>
</html>
