<!DOCTYPE html>
<html>
<head>

	<title>Jolles'</title>
	<link rel="icon" />

	<style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #ac7339;
			position: -webkit-sticky; /* Safari */
			position: sticky;
			top: 0;
			font-family: 'Trebuchet MS', sans-serif;
			z-index: 10000;
			width: 100%;
		}

		li {
			float: left;
		}

		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover {
			background-color: #f9f2ec;
		}

		.navbar-logo {
			background-color: #dfbf9f;
			font-weight: 800;
			font-size: 16px;
			font-family: 'Courier New', monospace;
		}

		.user{
			float: right;
		}

		.navbar-signup{
			color: #ffbf80;
			font-weight: 700;
		}

		.navbar-login{
			color: #ffd9b3;
			font-weight: 700;
		}

	</style>
</head>
	<body>

	<div class="header"></div>

	<ul>
		<li><a class="navbar-logo" href="home">Jolles'</a></li>
		<li><a href="#">News</a></li>
		<li><a href="#">Contact</a></li>

		<div class="user">
			<li><a class="navbar-signup" href="sign-up">Sign Up</a></li>
			<li><a class="navbar-login" href="login">Login</a></li>
		</div>
	</ul>
	
	</body>
</html>


