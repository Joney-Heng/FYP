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
            display: flex;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
        }

        .container .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 20px;
            padding: 30px;
            border-radius: 20px;
            background: #fff;
            text-decoration: none;
        }

        .container .content:hover {
            background: #f2f2f2;
            cursor: pointer;
        }

        .container a {
            text-decoration: none;
        }

        .container img{
            width: 40px;
            height: 40px;
        }

        .container span{
            margin-top: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="<?php echo base_url("product")?>">
            <div class="content">
                <img src="https://img.icons8.com/dotty/64/null/delivery-settings--v2.png"/>
                <span>PRODUCT MANAGEMENT</span>
            </div>
        </a>

        <a href="<?php echo base_url("voucher")?>">
            <div class="content">
            <img src="https://img.icons8.com/wired/64/null/discount-ticket.png"/>
                <span>VOUCHER MANAGEMENT</span>
            </div>
        </a>

        <a href="<?php echo base_url("orders")?>">
            <div class="content">
                <img src="https://img.icons8.com/ios/64/null/purchase-order.png"/>
                <span>ORDER MANAGEMENT</span>
            </div>
        </a>

        <a href="<?php echo base_url("orders/tracking")?>">
            <div class="content">
                <img src="https://img.icons8.com/ios/64/null/order-shipped.png"/>
                <span>TRACKING MANAGEMENT</span>
            </div>
        </a>
    </div>

</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</html>