<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- <link rel="apple-touch-icon" sizes="180x180" href="/application/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/application/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/application/favicon/favicon-16x16.png">
    <link rel="manifest" href="/application/favicon/site.webmanifest"> -->

    <style>
        
    </style>
</head>


<body>
<?php include 'application/views/layout/header.php' ?>

<?php if($payment) { ?>
    <?php echo json_encode($order) ?>
    <h1 class="success">Your Payment has been Successful!</h1>

    <div class="payer-info">
        <span class="title">Payer Information</span>
        <span><b>Payer Name:</b> <?php echo $payment[0]['payer_name']; ?></span>
        <span><b>Email:</b> <?php echo $payment[0]['payer_email']; ?></span>
    </div>

    <div class="payment-info">
        <span class="title">Payment Information</span>
        <span><b>Reference Number:</b> #<?php echo $payment[0]['id']; ?></span>
        <span><b>Transaction ID:</b> *<?php echo $payment[0]['txn_id']; ?></span>
        <span><b>Paid Amount:</b> <?php echo $payment[0]['currency_code'].' '.$payment[0]['payment_gross']; ?></span>
        <span><b>Payment Status:</b> <?php echo $payment[0]['status']; ?></span>
        <span><b>Payment Date:</b> <?php echo $payment[0]['payment_date']; ?></span>
    </div>
	
    <div class="receiver-info">
        <span class="title">Receiver Information</span>
        <span><b>Receiver Name:</b> <?php echo $order[0]['receiver_name']; ?></span>
        <span><b>Receiver Contact:</b> <?php echo $order[0]['receiver_contact_no']; ?></span>
        <span><b>Receiver Address:</b> <?php echo $order[0]['shipping_address']; ?></span>
        <span><b>Order Number:</b> <?php echo $order[0]['order_number']; ?></span>
        <span><b>Order Status:</b> <?php echo $order[0]['order_status']; ?></span>
        <span><b>Order Created:</b> <?php echo $order[0]['order_created']; ?></span>
    </div>
	
    <div class="product-info">
        <span class="title">Product Information</span>
        <table>
            <thead>
                <tr>
                    <th>Product</th>  
                    <th>Product Name</th>  
                    <th>SKU Number</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($product as $item) {?>
                    <tr>
                        <td><img style="width:80px;height:80px" src="https://storage-api-ten.vercel.app/files/<?php echo explode(',', $item['photo'])[0] ?>"></td>
                        <td><?php echo ($item['name']); ?></td>
                        <td><?php echo ($item['sku_number']); ?></td>
                        <td><?php echo ($item['quantity']); ?></td>
                        <td><?php echo ($item['currency']); ?><?php echo ($item['price']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </div>

    <a href="<?php echo base_url("mainsite")?>">Click to Back to Merchant Site.</a>

<?php } else if(empty($payment)) { ?>
    <h1 class="error">Oppss...Something Went Wrong!</h1>
    <a href="<?php echo base_url("mainsite")?>">Click to Back to Merchant Site.</a>
<?php } ?>

</body>
</html>