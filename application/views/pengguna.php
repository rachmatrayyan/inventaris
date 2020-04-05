<!DOCTYPE html>
<html>
<head>
  <title>Data Pengguna</title>
  <?php $this->load->view('_partials/head'); ?>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
            <h1 class="m-0 text-dark">Data Pengguna</h1>
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
            <h3 class="card-title mt-1">Data Pengguna</h3>
            <div class="card-tools">
              <button class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#tambah">Tambah</button>
            </div>
          </div>
          <div class="card-body border-bottom collapse" id="tambah">
            <form method="post" action="<?php echo site_url('pengguna/add') ?>">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>
              <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control">
                  <option value="1">Admin</option>
                  <option value="2">Pegawai</option>
                </select>
              </div>
              <div class="form-group">
                <label>Foto</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" placeholder="Foto" name="foto">
                  <label class="custom-file-label">Pilih</label>
                </div>
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
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Jenis Kelamin</th>
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
    <form method="post" action="<?php echo site_url('pengguna/edit') ?>">
    <div class="modal-header">
      <h5 class="modal-title">Edit Data</h5>
      <button class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" placeholder="Nama" name="nama" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
          <option value="Pria">Pria</option>
          <option value="Wanita">Wanita</option>
        </select>
      </div>
      <div class="form-group">
        <label>Role</label>
        <select name="role" class="form-control">
          <option value="1">Admin</option>
          <option value="2">Pegawai</option>
        </select>
      </div>
      <div class="form-group">
        <label>Foto</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" placeholder="Foto" name="foto">
          <label class="custom-file-label">Pilih</label>
        </div>
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
<script>
  let read_url = '<?php echo site_url('pengguna/read') ?>'
  let edit_url = '<?php echo site_url('pengguna/update') ?>'
  let hapus_url = '<?php echo site_url('pengguna/delete') ?>'
  let base_url = '<?php echo base_url('uploads') ?>'
</script>
<script src="<?php echo base_url() ?>assets/js/pengguna.js"></script>
</body>
</html>
