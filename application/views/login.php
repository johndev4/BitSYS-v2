<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BitSYS - Login</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Webapp Icon -->
	<link rel="icon" href="<?= base_url(BITSYS_LOGO); ?>" type="image/png" sizes="16x16">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/css/adminlte.min.css') ?>">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a role="button">
				<img src="<?= base_url(BITSYS_LOGO) ?>" width="40" height="40" role="button"> <b>BitSYS Login.</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to inventory system</p>

				<span class="text-danger">
					<?php echo validation_errors();
					if (!empty($errors)) :
						echo $errors;
					endif ?>
				</span>

				<form action="<?php echo base_url('auth/login') ?>" method="post">
					<div class="input-group mb-3">
						<input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">
									Remember Me
								</label>
							</div>
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

			</div>
			<!-- /.login-card-body -->
		</div>
		<!-- /.login-card -->

		<!-- jQuery -->
		<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
		<!-- AdminLTE App -->
		<script src="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/js/adminlte.min.js') ?>"></script>


</body>

</html>