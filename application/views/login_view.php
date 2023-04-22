<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">

    <style type="text/css">
        body {
            height: 100vh;
            background: #fff7e6 !important;
        }

        .title {
            display: block;
            font-size: 28px;
            margin: 50px 0;
            font-weight: 700;
            text-align: center;
        }

        .login {
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
        }

        a {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: #dfbf9f !important;
        }

        .pwd-content {
            margin-top: 10px;
        }

        .login-btn {
            margin-top: 50px;
            background: #adad85 !important;
            color: #fff;
            border-color: #adad85 !important;
        }

        .login-btn:hover {
            background: #999966 !important;
        }
    </style>
</head>

<?php include 'application/views/layout/header.php' ?>

<body>
    <span class="title">Login</span>
    <?php echo validation_errors(); ?>
    <?php echo form_open('user/login'); ?>

    <div class="login">
        <div class="email-content">
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo set_value('email'); ?>" />
        </div>
        
        <div class="pwd-content">
            <label for="password">Password</label>
            <input type="password" name="password" />
        </div>

        <div class="cta">
            <input type="submit" class="btn btn-primary login-btn" value="LOGIN" />
            <a href="<?php echo base_url("user/register")?>">No Account? Create one</a>
        </div>

    </div>

</body>

</html>