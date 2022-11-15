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
                <a class="float-left back-btn" href="<?php echo base_url('product'); ?>">
                    <img src="https://img.icons8.com/windows/32/000000/circled-left-2.png" />
                    BACK
                </a>
            </div>

            <div class="card-body mb-5">
                <b class="text-muted">Name:</b>
                <p><?php echo $product->name; ?></p>

                <b class="text-muted">Description:</b>
                <p><?php echo nl2br($product->description); ?></p>

                <b class="text-muted">Price(MYR):</b>
                <p><?php echo number_format($product->price, 2, '.', ''); ?></p>

                <b class="text-muted">Stock Quantity:</b>
                <p><?php echo $product->stock_quantity; ?></p>

                <b class="text-muted">SKU Number:</b>
                <p><?php echo $product->sku_number; ?></p>


                <b class="text-muted">Status:</b>
                <p><?php echo $product->product_status == 1 ? 'ACTIVE' : 'DISABLED' ?></p>

                <b class="text-muted">Date Created:</b>
                <p><?php echo $product->date_created; ?></p>

                <b class="text-muted">Date Updated:</b>
                <p><?php echo $product->date_updated; ?></p>

                <b class="text-muted">Example Product Images:</b>
                <div class="image-container">
                    <?php foreach (explode(',', $product->photo) as $photo) { ?>
                        <div class="wrapper">
                            <img data-value='<?php echo $photo ?>' src="<?php echo ($photo != '') ? 'http://joney-fyp-app.herokuapp.com/files/' . $photo : ''; ?>" /><button class="btn btn-danger remove">Remove</button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>