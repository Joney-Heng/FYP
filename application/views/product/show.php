<!DOCTYPE html>
<html>

<head>
    <title>Products Management - CRUD</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/public/css/create-product.css">
</head>

<body>
    <div class="container">

        <h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
        <div class="card">
            <div class="card-header">
                <a class="btn btn-outline-info float-right" href="<?php echo base_url('product'); ?>">
                    View All Products
                </a>
            </div>
            <div class="card-body">
                <b class="text-muted">Name:</b>
                <p><?php echo $product->name; ?></p>

                <b class="text-muted">Description:</b>
                <p><?php echo $product->description; ?></p>

                <b class="text-muted">Price:</b>
                <p><?php echo $product->price; ?></p>

                <b class="text-muted">Stock Quantity:</b>
                <p><?php echo $product->stock_quantity; ?></p>

                <b class="text-muted">SKU Number:</b>
                <p><?php echo $product->sku_number; ?></p>

                <b class="text-muted">Date Created:</b>
                <p><?php echo $product->date_created; ?></p>

                <b class="text-muted">Date Updated:</b>
                <p><?php echo $product->date_updated; ?></p>

                <b class="text-muted">Example Product Image:</b>
                <p><?php echo $product->photo; ?></p>

                <b class="text-muted">Status:</b>
                <p><?php echo $product->product_status == 1 ? 'ACTIVE' : 'DISABLED' ?></p>
            </div>
        </div>
    </div>
</body>

</html>