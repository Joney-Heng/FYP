<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="180x180" href="/application/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/application/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/application/favicon/favicon-16x16.png">
    <link rel="manifest" href="/application/favicon/site.webmanifest">

    <style>
        body {
            display: flex;
            padding: 30px;
            min-height: 100vh;
            background: #ddd;
            font-size: 0.8rem;
            font-weight: bold;
            font-family: sans-serif;
            vertical-align: middle;
        }

        .title {
            margin-bottom: 5vh;
        }

        .card {
            margin: auto;
            max-width: 1200px;
            width: 100%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto;
            }
        }

        .cart {
            padding: 30px;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
            background-color: #fff;
        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }

        .summary {
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65);
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem;
            }
        }

        .summary .col-2 {
            padding: 0;
        }

        .summary .col-10 {
            padding: 0;
        }

        .row {
            margin: 0;
        }

        .title b {
            font-size: 1.5rem;
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }

        .col-2,
        .col {
            padding: 0 1vh;
        }

        a {
            padding: 0 1vh;
        }

        .close {
            margin-left: auto;
            font-size: 0.7rem;
        }

        img {
            width: 3.5rem;
        }

        .back-to-shop {
            margin-top: 4.5rem;
        }

        h5 {
            margin-top: 4vh;
        }

        hr {
            margin-top: 1.25rem;
        }

        form {
            padding: 2vh 0;
        }

        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        .btn {
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0;
        }

        .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none;
        }

        .btn:hover {
            color: white;
        }

        a {
            color: black;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }

        .img-fluid {
            width: 150px;
            border-radius: 5px;
        }

        .quantity-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .quantity-container .quantity-minus,
        .quantity-container .quantity-plus {
            padding: 0;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            border: 0 solid transparent;
            font-size: 14px;
            text-align: center;
            color: #13221C;
            background-color: #AA9479;
        }

        .quantity-container .quantity-minus:hover,
        .quantity-container .quantity-plus:hover {
            background: #ecd9c6;
        }

        .quantity-container .quantity-minus:focus,
        .quantity-container .quantity-plus:focus {
            outline: 0;
        }

        .quantity-container .quantity {
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted"><?php echo count($shoppingCarts) ?> items</div>
                    </div>
                </div>
                <?php foreach ($shoppingCarts as $shoppingCart) { ?>
                    <div class="row border-top border-bottom cart-item">
                        <div class="row main align-items-center">
                            <div class="col-2">
                                <img class="img-fluid" src="https://storage-api-ten.vercel.app/files/<?php echo explode(',', $shoppingCart['photo'])[0]; ?>">
                            </div>

                            <div class="col">
                                <div class="row"><?php echo $shoppingCart['name'] ?></div>
                            </div>

                            <div class="quantity-container col">
                                <button class="quantity-minus">-</button>
                                <a href="#" class="quantity"><?php echo $shoppingCart['selected_quantity'] ?></a>
                                <button class="quantity-plus">+</button>
                            </div>

                            <div class="col">
                                <span>MYR <?php echo number_format($shoppingCart['price'], 2, '.', ''); ?></span>
                                <button class="close delete-cart-item" data-cartid="<?php echo $shoppingCart["id"] ?>">&#10005;</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="back-to-shop">
                    <a href="<?php echo base_url("mainsite") ?> ">&leftarrow;</a>
                    <span class="text-muted">Back to shop</span>
                </div>

            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;">ITEMS <?php echo count($shoppingCarts) ?></div>
                    <div class="col text-right">MYR <?php echo "aaaA" ?></div>
                </div>
                <form>
                    <p>SHIPPING</p>
                    <select>
                        <option class="text-muted">Standard-Delivery - MYR 5.00</option>
                        <option class="text-muted">PGEON-Delivery - MYR 5.00</option>
                    </select>
                    <p>GIVE CODE</p>
                    <input id="code" placeholder="Enter your code">
                </form>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">MYR 137.00</div>
                </div>
                <button class="btn">CHECKOUT</button>
            </div>
        </div>

    </div>
</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function($) {
        $('.quantity-container .quantity-plus').click(function(e) {
            e.preventDefault();

            let value = (parseInt($(this).closest('.quantity-container').find('.quantity').html()) || 0)

            // $(this).closest('.quantity-container').find('.quantity').html(value + 1);

            var form_data = new FormData();

            form_data.append("selected_quantity", $(this).closest('.quantity-container').find('.quantity').html(value + 1));

            $.ajax({
                url: "<?php echo site_url('mainsite/add-to-cart') ?>",
                encrypt: "selected_quantity/form-data",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                method: "POST",
                success: function(data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Added to your cart Successful!',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            });

        });

        $('.quantity-container .quantity-minus').click(function(e) {
            e.preventDefault();

            let value = (parseInt($(this).closest('.quantity-container').find('.quantity').html()) || 0)

            $(this).closest('.quantity-container').find('.quantity').html(value > 0 ? value - 1 : 0);
        });

        $('.delete-cart-item').click(function(e) {

            e.preventDefault();

            var form_data = new FormData();

            form_data.append("cart_id", $(this).attr("data-cartid"));

            Swal.fire({
                title: 'Are you sure?',
                text: "Remove this item from your Cart?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'REMOVE',
                cancelButtonText: 'CANCEL'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "<?php echo site_url('mainsite/delete-cart') ?>",
                        encrypt: "selected_quantity/form-data",
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        method: "POST",
                        success: function(data) {
                            location.reload();
                        }
                    });
                }
            })
        });
    });
</script>

</html>