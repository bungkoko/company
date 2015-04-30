<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/admin/css/base.css">
		<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/admin/css/jquery-ui.css"> 
		<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/admin/css/grid.css">
		<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/admin/css/visualize.css">
		<title>Login</title>
	</head>
	<body>
		<div id="login-wrapper">
			<div class="box-header login">
				<span class="fr"><?php echo anchor(base_url(), 'Kembali ke halaman depan'); ?></span>Login
			</div>
			<div class="box">
				<?php if($error != "") : ?>
				<div class="notification warning">
					<span class="strong">Maaf :</span>
					<p><?php echo $error; ?></p>
				</div>
				<?php endif; ?>
				<form method="post" action="<?php echo site_url('kt-login'); ?>" class="login">
					<div class="row">
						<label>Username:</label>
						<input name="admin_username" type="text">
					</div>
					<div class="row">
						<label>Password:</label>
						<input name="admin_password" type="password">
					</div>
					<div class="row tr">
						<input id="rememberme" class="checkbox"  type="checkbox"> <label class="checkbox tl strong" for="rememberme" style="width: 105px;">Biarkan saya tetap masuk</label>
						<input value="Login" class="button" style="width: 90px ! important;" type="submit">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>