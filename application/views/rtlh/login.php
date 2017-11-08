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
	<link rel="shortcut icon" href="<?php echo base_url("public/image/site/favicon.png"); ?>">
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
<body class="">
	<div class="container ">
		<div class="col-md-4 col-md-offset-4 box-login ">
			<div class="box-logo" style="margin-top: -30px;">
	      		<img src="<?php echo base_url("assets/images/logo.png"); ?>" alt="">
	      	</div>
	      	<?php  
	      	/**
	      	 * undocumented class variable
	      	 *
	      	 * @var string
	      	 **/
	      	if( $this->input->get('action') != 'lostpassword') :
	      	?>
	      	<div class="box-alert">
	      		<?php echo $this->session->flashdata('alert'); ?>
	      	</div>
	      	
	      	<div  style="padding-bottom: 29px" class="box-body border animated <?php if($this->session->flashdata('alert')) echo "shake"; ?>">
	      	<h4 class="text-center arial" style="padding-bottom: 10px">Silahkan Login</h4>
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
	      		<div class="social-auth-links text-center">
	      		   
	      			<p><a href="<?php echo base_url(); ?>" class="arial">Kembali ke halaman utama</a></p>
	      			
	      		<b><div   id="demo"></div></b>
	      		</div>
	      	</div>
	      
	      	<?php else : ?>
	      	<div class="box-alert">
	      		<?php if($this->session->flashdata('alert') == FALSE) : ?>
	      		<div class="alert alert-info">
	      			Silahkan masukkan alamat email Anda. Anda akan menerima sebuah tautan untuk membuat password baru melalui email.
	      		</div>
	      		<?php else : 
	      			echo $this->session->flashdata('alert');
	      		endif;
	      		?>
	      	</div>
	      	<div class="box-body animated ">
	      		<form action="<?php echo base_url("login_skpd/forgot"); ?>" method="POST" role="form">
	      			<div class="form-group">
	      				<label for="">E-Mail :</label>
	      				<input type="email" name="email" class="form-control input-lg" autofocus="true" required="required">
	      			</div>
	      			<button type="submit" class="btn btn-primary btn-block">Dapatkan password baru</button>
		      		<div class="social-auth-links text-left" style="margin-top: 20px;">
		      			<a href="<?php echo current_url(); ?>" class="arial">Kembali ke login</a>
		      		</div>
	      		</form>
	      	</div>
	      	
	      	<?php endif; ?>
		</div>
	</div>
	
	<script src="<?php echo base_url("assets/public/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/public/bootstrap/js/bootstrap.min.js"); ?>"></script>
</body>
</html>
<?php  
