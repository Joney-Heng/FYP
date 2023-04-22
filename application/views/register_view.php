<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>JonTong</title>
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<style type="text/css">
			body{
				background: #fff7e6;
			}

			h1{
				text-align: center;
			}
		</style>
	</head>

	<?php include 'application/views/layout/header.php' ?>

	<body>
		<h2>Register</h2>
		<?php echo validation_errors(); ?>
		<?php echo form_open('user/register'); ?>
		
		<div>
			<label for="name">Name:</label>
			<input type="text" name="name" value="<?php echo set_value('name'); ?>" />
		</div>
		<div>
			<label for="email">Email:</label>
			<input type="text" name="email" value="<?php echo set_value('email'); ?>" />
		</div>
		<div>
			<label for="password">Password:</label>
			<input type="password" name="password" />
		</div>
		<div>
			<label for="confirm_password">Confirm Password:</label>
			<input type="password" name="confirm_password" />
		</div>
		<div>
			<input type="submit" value="Register" />
		</div>
		<?php echo form_close(); ?>


	</body>
</html>
