<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <?php $this->load->view('_partials/head'); ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url('') ?>">Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Isi kolom berikut</p>

      <form action="<?php echo site_url('login') ?>" method="post">
        <div class="info"></div>
        <div class="input-group mb-3">
          <input type="text" name="nama" class="form-control" placeholder="Nama" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php $this->load->view('_partials/foot'); ?>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script>
  $(document).ready(() => {
    $('form').validate({
      errorElement: 'span',
      errorPlacement: (err, el) => {
        err.addClass('invalid-feedback')
        el.closest('.input-group').append(err)
      },
      submitHandler: function (el) {
        let form = $(el)
        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: form.serialize(),
          dataType: 'json',
          success: (res) => {
            if (res === 'username') {
              $('.info').html(`<div class="alert alert-danger">Pengguna Tidak Ada</div>`)
            } else if (res === 'password') {
              $('.info').html(`<div class="alert alert-danger">Password Salah</div>`)
            } else {
              $('.info').html(`<div class="alert alert-success">Sukses</div>`)
              setTimeout(function () {
                window.location.href = '<?php echo site_url('') ?>'
              }, 100)
            }
          }
        })
      }
    })
  })
</script>
</body>
</html>
