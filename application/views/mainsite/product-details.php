<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Shopping Mall</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        body {
            background: #ecedee
        }

        body .product-details ol.breadcrumb {
            margin: 16px 0;
        }

        body .product-details .card {
            border: none;
            overflow: hidden
        }

        body .product-details .card .border-end {
            padding-left: 0;
            padding-right: 0;
        }

        .thumbnail_images ul {
            list-style: none;
            justify-content: center;
            display: flex;
            align-items: center;
            margin-top: 10px;
            padding-left: 0;
        }

        .thumbnail_images ul li {
            margin: 5px;
            padding: 10px;
            border: 2px solid #e69900;
            cursor: pointer;
            transition: all 0.5s
        }

        .thumbnail_images ul li {
            margin: 5px;
            padding: 10px;
            border: 1px solid #e69900;
            cursor: pointer;
            transition: all 0.5s
        }

        .thumbnail_images ul li:hover {
            border: 2px solid #e69900;
        }

        .main-image {
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid #eee;
            height: 400px;
            width: 100%;
            overflow: hidden
        }

        .main-image img {
            border-radius: 25px;
        }

        .card .card-right {
            padding: 20px 30px 20px 25px;
        }

        .card .card-right .authentic-label {
            margin-bottom: 20px;
            font-size: 12px;
            font-weight: 800;
            color: #1b7ff5;
        }

        .card .card-right .product-title {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .card .card-right .product-title .product-name {
            margin-right: 10px;
            width: 100%;
            font-size: 24px;
            font-weight: 700;
            flex: 1;
        }

        .card .card-right .product-title .heart {
            height: 29px;
            width: 29px;
            background-color: #eaeaea;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .card .card-right .price {
            padding-bottom: 12px;
            border-bottom: 1px solid #ccc;
            font-weight: 600;
            font-size: 20px;
            color: #cc9966;
        }

        .buttons .btn {
            height: 50px;
            width: 150px;
            border-radius: 0px !important
        }

        .cta {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .cta .quantity-minus,
        .cta .quantity-plus {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            border: 0 solid transparent;
            font-size: 14px;
            text-align: center;
            color: #13221C;
            background-color: #AA9479;
        }

        .cta .quantity {
            margin: 0 27px;
        }

        .cta .btn-primary {
            margin-left: 28px;
            flex: 1;
        }

        .description-label .description-title {
            font-weight: 700;
            color: #ff8000;
            padding: 12px;
        }

        .description-label .card {
            margin: 10px 0;
        }

        .description-label .content {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="product-details">
        <div class="container mb-4">
            <div class="breadcrumb-container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('mainsite') ?>">Mainsite</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product-Details</li>
                    </ol>
                </nav>
            </div>

            <div class="card">
                <div class="row g-0">
                    <div class="col-md-5 border-end">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="main-image"><img src="http://joney-fyp-app.herokuapp.com/files/<?php echo explode(',', $product->photo)[0] ?>" id="main_product_image" width="350"> </div>
                            <div class="thumbnail_images">
                                <ul id="thumbnail">
                                    <?php foreach (explode(',', $product->photo) as $photo) { ?>
                                        <div class="wrapper">
                                            <li><img onclick="changeImage(this)" data-value='<?php echo $photo ?>' src="<?php echo ($photo != '') ? 'http://joney-fyp-app.herokuapp.com/files/' . $photo : ''; ?>" width="50"></li>
                                        </div>
                                    <?php } ?>
                                </ul>   
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 card-right">
                        <div class="authentic-label">
                            <svg width="13" height="18" viewBox="0 0 13 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.5 0C2.2842 0 0 1.73284 0 1.73284V9.09926C0.000615356 12.6892 6.5 17.3321 6.5 17.3321C6.5 17.3321 13 12.6892 13 9.09926V1.73284C13 1.73284 10.7158 0 6.5 0ZM9.05181 8.1262C8.81609 8.35592 8.7085 8.68692 8.76411 9.01133L9.18849 11.4868L6.96535 10.318C6.67402 10.1649 6.32598 10.1649 6.03465 10.318L3.81151 11.4868L4.23589 9.01133C4.2915 8.68692 4.18391 8.35592 3.94819 8.1262L2.14944 6.37324L4.63528 6.01194C4.96094 5.96461 5.24246 5.76008 5.38813 5.46501L6.5 3.21277L7.61187 5.46501C7.75754 5.76008 8.03907 5.96461 8.36472 6.01194L10.8506 6.37324L9.05181 8.1262Z" fill="#1B7FF5"></path>
                            </svg>
                            <span>AUTHENTIC PRODUCT</span>
                        </div>

                        <div class="product-title">
                            <span class="product-name"><?php echo $product->name; ?></span>
                            <span class="heart"><i class='bx bx-heart'></i></span>
                        </div>

                        <div class="price">MYR <?php echo number_format($product->price, 2, '.', ''); ?></div>

                        <div class="ships-to">
                            <span>Ships To: </span>
                            <span class="product-name"><?php echo $product->name; ?></span>
                        </div>

                        <div class="promotion">

                        </div>

                        <div class="cta">
                            <span>Quantity: </span>
                            <button class="quantity-minus">-</button>
                            <span class="quantity">1</span>
                            <button class="quantity-plus">+</button>
                        </div>

                        <span stock-quantity><?php echo $product->stock_quantity ?> unit available</span>

                        <div class="buttons d-flex flex-row mt-5 gap-3">
                            <button class="btn btn-outline-dark">Buy Now</button>
                            <button class="btn btn-dark"><?php echo $product->stock_quantity == 0 ? 'Out of Stock' : 'Add To Cart' ?></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container description-label mb-4">
            <span class="description-title">PRODUCT DESCRPTION</span>

            <div class="card">
                <div class="content">
                    <span><?php echo nl2br($product->description); ?></span>
                </div>
            </div>
        </div>

    </div>

    <script>
        function changeImage(element) {

            var main_prodcut_image = document.getElementById('main_product_image');
            main_prodcut_image.src = element.src;
        }

        function _init_qtyClick() {
            $('.qty').on('blur', function() {
                validateQuantity();
                updatePrice();
            });

            $('.qty-minus, .qty-plus').click(function(e) {
                $('.qty').val($(e.target).closest('.quantity_option').find('.qty').val());
                // validateQuantity();
                // updatePrice();
            });
        }
    </script>
</body>