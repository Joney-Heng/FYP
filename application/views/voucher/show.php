<!DOCTYPE html>
<html>

<head>
    <title>Products Management - CRUD</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/public/css/create-product.css">

    <style type="text/css">
        body {
            background: #ecedee;
        }

        body .container .title {
            display: block;
            text-align: center;
            font-weight: 700;
            font-size: 35px;
            margin: 20px 0;
            color: #d2a679;
        }

        body .container a.back-btn {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #000;
            font-weight: 500;
        }

        body .container a img {
            text-decoration: none;
            margin-right: 4px;
        }

        body .container .card-body .text-muted {
            color: #e69900 !important;
            font-weight: 700;
        }

        body .container .card-body .album {
            display: flex;
            justify-content: space-between;
        }

        body .container .card-body p {
            margin-top: 5px;
            padding: 10px;
            border-radius: 5px;
            font-weight: 300;
            color: #1a0d00;
        }

        body .container .card-body .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        body .container .card-body .image-container .wrapper {
          display: flex;
          flex-direction: column;
        }

        body .container .card-body .image-container .wrapper img {
            margin-top: 5px;
            margin-bottom: 2px;
            width: 200px;
            height: 200px;
            border: 2px solid #e69900;
            border-radius: 5px;
            object-fit: contain;
        }
    </style>

</head>

<body>

    <div class="container mb-5">

        <span class="title"><?php echo $title; ?></span>
        <div class="card">
            <div class="card-header">
                <a class="float-left back-btn" href="<?php echo base_url('voucher'); ?>">
                    <img src="https://img.icons8.com/windows/32/000000/circled-left-2.png" />
                    BACK
                </a>
            </div>

            <div class="card-body mb-5">
                <b class="text-muted">Voucher Type:</b>
                <p><?php echo $vouchers->voucher_type; ?></p>

                <b class="text-muted">Campaign Name:</b>
                <p><?php echo nl2br($vouchers->campaign_name); ?></p>

                <b class="text-muted">Min Spend (MYR):</b>
                <p><?php echo number_format($vouchers->min_spend, 2, '.', ''); ?></p>

                <b class="text-muted">Min Spend (MYR):</b>
                <p><?php echo number_format($vouchers->capped_amount, 2, '.', ''); ?></p>

                <b class="text-muted">Voucher Code:</b>
                <p><?php echo $vouchers->voucher_code; ?></p>

                <b class="text-muted">Voucher Quantity:</b>
                <p><?php echo $vouchers->voucher_quantity; ?></p>

                <b class="text-muted">Status:</b>
                <p><?php echo $vouchers->voucher_status == 1 ? 'ACTIVE' : 'DISABLED' ?></p>

                <b class="text-muted">Voucher - Started Date:</b>
                <p><?php echo $vouchers->start_date; ?></p>

                <b class="text-muted">Voucher - Expired Date:</b>
                <p><?php echo $vouchers->end_date; ?></p>
            </div>
        </div>
    </div>
</body>

</html>