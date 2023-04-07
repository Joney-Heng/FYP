<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="/application/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/application/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/application/favicon/favicon-16x16.png">
    <link rel="manifest" href="/application/favicon/site.webmanifest"> -->

    <style>

    body {
        background:#f2f2f2;
    }

    .main-header {
        display: block;
        margin-top: 40px;
        margin-bottom: 0px;
        text-align: center;
        font-weight: 900;
    }

    .success {
        max-width: 1200px;
        margin: 0 auto;
    }

    .title {
        padding: 10px;
        font-size: 18px;
        font-weight: 600;
        background-color: #334d00;
        color: #fff;
        border-radius: 50px;
    }

    .title:first-child {
        margin-top: 0;
    }

    .details {
        display: flex;
        flex-direction: column;
        margin: 15px 15px 25px 15px;
        font-size: 18px;
    }

    .details span {
        margin-bottom: 5px;
    }

    .payment {
        border: 1px solid #000;
        min-height: 280px;
        border-radius: 20px;
        background: #fff;
    }
   .payment_header {
        background:#88cc00;
        padding:20px;
        border-radius:20px 20px 0px 0px;
        
    }

    .payment_header  h1 {
        margin-top: 8px;
        font-size: 35px;
        font-weight: 700;
        text-align: center;
        color: #fff;

    }
   
   .check {
        margin:0px auto;
        width:50px;
        height:50px;
        border-radius:100%;
        background:#fff;
        text-align:center;
    }
    
   .check i {
        vertical-align:middle;
        line-height:50px;
        font-size:30px;
    }

    .content  {
        padding: 20px;
    }

    .content a {
        width:200px;
        height:35px;
        color:#fff;
        border-radius:30px;
        padding:5px 10px;
        background:#88cc00;
        transition:all ease-in-out 0.3s;
    }

    .content a:hover {
        text-decoration:none;
        background:#77b300;
        color:#fff;
    }

    .upper-content {
        display: flex;
        border-bottom: 1px solid #000;
        margin-bottom: 30px;
    }

    .payment-details {
        width: 50%;
    }

    .receiver-details {
        width: 50%;
    }

    .payment-details {
        display: flex;
        flex-direction: column;
    }

    .product-details table {
        width: 100%;
        margin: 25px 0;
        
    }

    .product-details th {
        margin-right: 10px;        
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

    .go-to-home {
        display: block;
        margin: 0 auto;
        text-align: center;
    }

    </style>
</head>


<body>
<?php include 'application/views/layout/header.php' ?>

<?php if($payment) { ?>
    <h1 class="main-header">PAYMENT DETAILS</h1>
    <div class="success">
        <div class="row">
           <div class="col-lg mx-auto mt-5 mb-5">
              <div class="payment">
                 <div class="payment_header">
                    <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                    <h1>Payment Success !</h1>
                 </div>
                 <div class="content">
                    <div class="upper-content">
                        <div class="payment-details">
                            <div class="payer-info">
                                <span class="title">Payer Information</span>
                                <div class="details">
                                    <span><b>Payer Name:</b> <?php echo $payment[0]['payer_name']; ?></span>
                                    <span><b>Email:</b> <?php echo $payment[0]['payer_email']; ?></span>
                                </div>
                            </div>
                        
                            <div class="payment-info">
                                <span class="title">Payment Information</span>
    
                                <div class="details">
                                    <span><b>Reference Number:</b> #<?php echo $payment[0]['id']; ?></span>
                                    <span><b>Transaction ID:</b> *<?php echo $payment[0]['txn_id']; ?></span>
                                    <span><b>Paid Amount:</b> <?php echo $payment[0]['currency_code'].' '.$payment[0]['payment_gross']; ?></span>
                                    <span><b>Payment Status:</b> <?php echo $payment[0]['status']; ?></span>
                                    <span><b>Payment Date:</b> <?php echo $payment[0]['payment_date']; ?></span>
                                </div>
                            </div>
                        </div>
    
                        <div class="receiver-details">
                            <div class="receiver-info">
                                <span class="title">Receiver Information</span>
                                <div class="details">
                                    <span><b>Receiver Name:</b> <?php echo $order[0]['receiver_name']; ?></span>
                                    <span><b>Receiver Contact:</b> <?php echo $order[0]['receiver_contact_no']; ?></span>
                                    <span><b>Receiver Address:</b> <?php echo $order[0]['shipping_address']; ?></span>
                                    <span><b>Order Number:</b> <?php echo $order[0]['order_number']; ?></span>
                                    <span><b>Order Status:</b> <?php echo $order[0]['order_status']; ?></span>
                                    <span><b>Order Created:</b> <?php echo $order[0]['order_created']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="product-details">
                        <div class="product-info">
                            <span class="title">Product Information</span>
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
                            
                        <a href="<?php echo base_url("mainsite")?>" class="go-to-home">Go to Home</a>

                        </div>
                    
                        
                    </div>
                    <?php } else if(empty($payment)) { ?>
                        <h1 class="error">Oppss...Something Went Wrong!</h1>
                        <a href="<?php echo base_url("mainsite")?>">Click to Back to Merchant Site.</a>
                    <?php } ?>
                 </div>
                 
              </div>
           </div>
        </div>
     </div>


</body>
</html>