<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $title; ?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/public/image/favicon-title.png') ?>"/>
		<link rel="stylesheet" href="<?php echo base_url("assets/public/bootstrap/css/bootstrap.min.css"); ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/public/font-awesome/css/font-awesome.min.css"); ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/rtlh/css/style-login.css"); ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/public/dist/css/animate.css"); ?>">
		<style type="text/css" media="screen">
		body {
		background-image: url('<?php echo base_url('assets/images/BG.jpg') ?>') ;
		background-attachment: fixed;
		background-repeat: no-repeat;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		}
		.arial {
		font-family: arial;
		font-weight: normal;
		}
		div.border{
		border-left: 3pt solid #EEB715;
		border-right: 3pt solid #EEB715;
		}
		</style>
	</head>
	<body>
		<div class="container ">
			<div class="col-md-4 col-md-offset-4 box-login ">
				<div class="box-logo" style="margin-top: -30px;">
					<img src="<?php echo base_url("assets/images/logo.png"); ?>" alt="logo Simpera">
				</div>
				<div class="box-alert">
					<?php echo $this->session->flashdata('alert'); ?>
				</div>
				<div  style="padding-bottom: 29px" class="box-body border animated <?php if($this->session->flashdata('alert')) echo "shake"; ?>">
					<b><h5 class="text-center arial" style="padding-bottom: 10px">Silahkan Login</h5></b>
					<form action="<?php echo current_url(); ?>" method="POST" role="form">
						<?php echo form_hidden('from_url', $this->input->get('from_url')); ?>
						<div class="form-group">
							<label for="username" class="arial">Username / E-Mail :</label>
							<input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control input-md" autofocus="true" placeholder="Username / E-Mail">
							<p class="help-block"><?php echo form_error('username', '<small class="text-danger">', '</small>'); ?></p>
						</div>
						<div class="form-group">
							<label for="password" class="arial">Password :</label>
							<input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control input-md" placeholder="Password">
							<p class="help-block"><?php echo form_error('password', '<small class="text-danger">', '</small>'); ?></p>
						</div>
						<button type="submit" class="btn btn-warning btn-block">Masuk</button>
						<br>
					</form>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url("assets/public/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/public/bootstrap/js/bootstrap.min.js"); ?>"></script>
	</body>
</html>
<?php