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

        .product-details table {
        width: 100%;
        margin: 25px 0;
        
    }

        .product-details th {
            margin-right: 10px;
            color: #e69900 !important;
            font-weight: 700;
        }

        .product-details thead tr {
            display: flex;
            align-items: center;
        }

        .product-details td {
            margin-right: 10px;        
        }

        .product-details tbody {
            border: 1px solid #000;
        }

        .product-details tr {
            display: flex;
            align-items: center;
            text-align: center;
        }

        .product-details .products {
            width: 90px;
            text-align: left;
        }

        .product-details .name {
            flex: 1;
            text-align: left;
        }

        .product-details .sku {
            width: 120px;
        }

        .product-details .qty {
            width: 80px;
        }

        .product-details .price {
            width: 150px;
        }
    </style>

</head>

<body>

    <div class="container mb-5">

        <span class="title"><?php echo $title; ?></span>
        <div class="card">
            <div class="card-header">
                <a class="float-left back-btn" href="<?php echo base_url('orders'); ?>">
                    <img src="https://img.icons8.com/windows/32/000000/circled-left-2.png" />
                    BACK
                </a>
            </div>

            <div class="card-body">
                <b class="text-muted">Order ID:</b>
                <p>#<?php echo $order->id; ?></p>

                <b class="text-muted">Order Number:</b>
                <p>*<?php echo nl2br($order->order_number); ?></p>

                
                <b class="text-muted">Receiver Name:</b>
                <p><?php echo $order->receiver_name; ?></p>

                <b class="text-muted">Receiver Contact No:</b>
                <p><?php echo $order->receiver_contact_no; ?></p>

                <b class="text-muted">Shipping Address:</b>
                <p><?php echo $order->shipping_address; ?></p>
        
                <b class="text-muted">Subtotal Amount:</b>
                <p><?php echo number_format($order->product_subtotal, 2, '.', ''); ?></p>

                <b class="text-muted">(+)Shipping Amount:</b>
                <p><?php echo number_format($order->shipping_amount, 2, '.', ''); ?></p>

                <b class="text-muted">Total Amount:</b>
                <p><?php echo number_format($order->product_subtotal, 2, '.', ''); ?></p>
               

                <b class="text-muted">Voucher Amount:</b>
                <p><?php echo $order->voucher_amount; ?></p>

                <b class="text-muted">Voucher Code Applied:</b>
                <p><?php echo $order->voucher_code_applied; ?></p>

                <b class="text-muted">Order Created:</b>
                <p><?php echo $order->order_created; ?></p>

                <b class="text-muted">Status:</b>
                <p><?php echo $order->order_status ?></p>

                <div class="product-details">
                    <div class="product-info">
                        <table>
                            <thead>
                                <tr>
                                    <th class="products">Product</th>  
                                    <th class="name">Product Name</th>  
                                    <th class="sku">SKU Number</th>
                                    <th class="qty">Quantity</th>
                                    <th class="price">Price</th>
                                </tr>
                            </thead>
                            <?php foreach($product as $item) {?>
                                <tbody>
                                    <tr>
                                        <td class=""><img style="width:80px;height:80px" src="https://storage-api-ten.vercel.app/files/<?php echo explode(',', $item['photo'])[0] ?>"></td>
                                        <td class="name"><?php echo ($item['name']); ?></td>
                                        <td class="sku"><?php echo ($item['sku_number']); ?></td>
                                        <td class="qty"><?php echo ($item['quantity']); ?></td>
                                        <td class="price"><?php echo ($item['currency']); ?><?php echo ($item['price']); ?></td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>

            <a href="https://app.easyparcel.com/my/en/BuyerTool?d=MHdOem9RaUM=" target="_blank" class="btn btn-primary">CREATE SHIPPING</a>
        </div>
    </div>
</body>

</html>