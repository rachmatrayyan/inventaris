<!DOCTYPE html>
<html>
<head>
  <title>Data Stok</title>
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
            <h1 class="m-0 text-dark">Data Stok</h1>
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
        <div class="card card-default">
          <div class="card-header">
            <h5 class="card-title">Data Stok</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table width="100%" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Tipe</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                  </tr>
                </thead>
              </table>
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
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/select2/js/select2.min.js"></script>
<script>
  let read_url = '<?php echo site_url('stok/read') ?>'
  let hapus_url = '<?php echo site_url('stok/delete') ?>'
</script>
<script src="<?php echo base_url() ?>assets/js/stok.js"></script>
</body>
</html>
