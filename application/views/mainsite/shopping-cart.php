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
            margin-bottom: 10px;
        }

        .card {
            margin: auto;
            max-width: 1200px;
            width: 100%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        .cart-items {
            overflow-y: auto;
            height: 350px;
        }

        .product-name {
            margin-left: 10px;
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto;
            }
        }

        .cart {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
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
            padding: 2vh 10px;
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
            margin-top: 25px;
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

        .checkout:hover{
            background: #AA9479;
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
                        <span class="col align-self-center text-right text-muted item-count"></span>
                    </div>
                </div>

                <div class="cart-items"></div>

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
                    <span class="col item-count" style="padding-left:0;"></span>
                    <div class="col text-right">MYR
                        <span class="subtotal"><?php echo "aaaA" ?></span>
                    </div>
                </div>
                <form>
                    <div class="">
                        <span>SHIPPING</span>
                        <select>
                            <option class="text-muted">Standard-Delivery - MYR 5.00</option>
                            <option class="text-muted">PGEON-Delivery - MYR 5.00</option>
                        </select>
                    </div>

                    <div>
                        <span>Voucher Code</span>
                        <input id="code" placeholder="Enter your code">
                    </div>
                </form>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <span class="col">TOTAL PRICE</span>
                    <div class="col text-right">MYR
                        <span class="product-total"></span>
                    </div>
                </div>
                <button class="btn checkout">CHECKOUT</button>
            </div>
        </div>

    </div>
</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function($) {
        getCartItem();

        // console.log('shengjinbing joney', $('.cart-item').length)
    });

    function getCartItem() {
        $.ajax({
            url: "<?php echo site_url('mainsite/get-cart') ?>",
            encrypt: "",
            // data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            method: "POST",
            success: function(data) {

                //Remove previous cart-item (No matter its empty or not)
                $('.cart-items').children().remove();

                // console.log('xiaobian joney', $('.cart-item').length)

                $.each(JSON.parse(data), function(i, value) {
                    $('.cart-items').append(
                        '<div class="row border-top border-bottom cart-item">' +
                        '    <div class="row main align-items-center">' +
                        '        <div class="col-2">' +
                        '            <img class="img-fluid" src="https://storage-api-ten.vercel.app/files/' + value.photo.split(',')[0] + '">' +
                        '        </div>' +

                        '        <div class="col product-name">' +
                        '            <div class="row">' + value.name + '</div>' +
                        '        </div>' +

                        '        <div class="quantity-container col" data-productid="' + value.product_id + '">' +
                        '            <button class="quantity-minus">-</button>' +
                        '            <a href="#" class="quantity">' + value.selected_quantity + '</a>' +
                        '            <button class="quantity-plus">+</button>' +
                        '        </div>' +

                        '        <div class="col">' +
                        '            <span>MYR</span>' +
                        '            <span class="item-price">' +
                        '                ' + parseFloat(value.price * value.selected_quantity).toFixed(2) + ' ' +
                        '            </span>' +
                        '            <button class="close delete-cart-item" data-cartid="' + value.id + '">&#10005;</button>' +
                        '        </div>' +
                        '    </div>' +
                        '</div>');
                });


                //Update quantity - Plus to add
                $('.quantity-container .quantity-plus').click(function(e) {
                    e.preventDefault();

                    let value = (parseInt($(this).closest('.quantity-container').find('.quantity').html()) || 0) + 1;
                    var form_data = new FormData();

                    form_data.append("selected_quantity", value);
                    form_data.append("product_id", $(this).closest('.quantity-container').attr("data-productid"));

                    $.ajax({
                        url: "<?php echo site_url('mainsite/update-cart') ?>",
                        encrypt: "selected_quantity/form-data",
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        method: "POST",
                        success: function(data) {
                            getCartItem();
                        }
                    });

                });

                //Update quantity - Minus to deduct
                $('.quantity-container .quantity-minus').click(function(e) {
                    e.preventDefault();

                    var currentQuantity = $(this).closest('.quantity-container').find('.quantity').html();
                    let value = (parseInt(currentQuantity) > 0 ? currentQuantity - 1 : 0 || 0);

                    var form_data = new FormData();

                    form_data.append("selected_quantity", value);
                    form_data.append("product_id", $(this).closest('.quantity-container').attr("data-productid"));

                    $.ajax({
                        url: "<?php echo site_url('mainsite/update-cart') ?>",
                        encrypt: "selected_quantity/form-data",
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        method: "POST",
                        success: function(data) {
                            getCartItem();
                        }
                    });
                });

                //Delete cart item & Update Cart
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
                                    getCartItem();
                                }
                            });
                        }
                    })
                });

                //Update cart item count
                $('.cart .item-count').html(' ' + $('.cart-item').length + ' ITEMS');
                $('.summary .item-count').html(' ' + $('.cart-item').length + ' ITEMS');


                // console.log('smart joney', $('.cart-item').length);

                //After added everything then calculate the total
                updateGrandTotal();
            }
        });

        // console.log('dabian joney', $('.cart-item').length)
    }

    //Update cart total
    function updateGrandTotal() {
        var subTotal = 0;

        $.each($('.cart-item .item-price'), function(i, value) {
            subTotal += parseFloat($(value).html().trim());
        });
        $('.subtotal').html(subTotal.toFixed(2));
    }

    function _toNumber(str) {
        try {
            return Number(str.toString().replace(/,/g, ''));
        } catch (e) {
            console.log(e);
        }
    }

    function _numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>

</html>