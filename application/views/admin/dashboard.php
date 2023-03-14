<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        body {
            background: #fff7e6;
        }

        .container {
            padding: 20px;
            margin-top: 20px;
            text-align: center;
        }

        .container a {
            margin-right: 20px;
            padding: 30px;
            background: #fff;
            text-decoration: none;
        }

        .container a:hover {
            background: #f2f2f2;
        }

        .container img{
            width: 40px;
            height: 40px;
        }

        .container span{
            margin-left: 5px;
            margin-top: 2px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="<?php echo base_url("product")?>"><img src="https://img.icons8.com/dotty/64/null/delivery-settings--v2.png"/>
            <span>PRODUCT MANAGEMENT</span>
        </a>

        <a href="<?php echo base_url("voucher")?>"><img src="https://img.icons8.com/wired/64/null/discount-ticket.png"/>
            <span>VOUCHER MANAGEMENT</span>
        </a>

    </div>

</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</html>