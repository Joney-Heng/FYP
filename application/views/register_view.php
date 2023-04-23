<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>JonTong</title>
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">

		<style type="text/css">
			body{
				height: 100vh;
            	background: #fff7e6 !important;
			}

			form {
				margin-bottom: 50px;
			}

			.title {
				display: block;
				font-size: 28px;
				margin: 50px 0;
				font-weight: 700;
				text-align: center;
        	}

			p {
				text-align: center;
				font-size: 18px;
				font-weight: 600;
				color: #cc3300;
			}

			.register {
				padding: 50px;
				margin: 50px auto;
				width: 500px;
				background: #fff;
				border: 1px solid  #e6e6e6;
				border-radius: 10px;
			}

			label {
				font-size: 18px;
				font-weight: 600;
			}

			input {
				width: 100%;
				margin-bottom: 5px !important;
			}
			
			.register-btn {
				margin-top: 50px;
				background: #adad85 !important;
				color: #fff;
				border-color: #adad85 !important;
			}

			.register-btn:hover {
				background: #999966 !important;
			}

		</style>
	</head>

	<?php include 'application/views/main_header.php' ?>

	<body>
		<span class="title">Register</span>
		<!-- <?php echo validation_errors(); ?> -->
		<?php echo form_open('user/register'); ?>
		
		<div class="register">
			<div>
				<label for="name">Name</label>
				<input type="text" name="name" value="<?php echo set_value('name'); ?>" />
			</div>
			<div>
				<label for="email">Email</label>
				<input type="text" name="email" value="<?php echo set_value('email'); ?>" />
			</div>
			<div>
				<label for="password">Password</label>
				<input type="password" name="password" />
			</div>
			<div>
				<label for="confirm_password">Confirm Password</label>
				<input type="password" name="confirm_password" />
			</div>
			<div>
				<input type="submit" class="btn btn-primary register-btn" value="REGISTER" />
			</div>
			<?php echo form_close(); ?>
		</div>


	</body>
</html>
