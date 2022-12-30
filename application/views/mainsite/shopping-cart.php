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
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
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

        .shopping-cart-container {
            margin: auto;
            max-width: 1200px;
            width: 100%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        .cart-items {
            overflow-y: auto;
            overflow-x: hidden;
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
            display: flex;
            flex-direction: column;
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

        .back-to-shop a {
            color: #000;
            text-decoration: none;
        }

        h5 {
            margin-top: 4vh;
        }

        hr {
            margin-top: 1.25rem;
        }

        form {
            padding: 4vh 0;
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
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
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

        .sub-cart {
            display: flex;
            justify-content: space-between;
        }

        .cta {
            min-height: 250px;
        }

        .address-container .manage-button-row .btn-choose-address {
            display: flex;
            align-items: center;
            text-decoration: none;
            padding: 0;
            margin-bottom: 15px;
            width: 160px;
        }

        .address-container .manage-button-row .btn-choose-address svg {
            margin-right: 5px;
        }

        .address-container .manage-button-row .selected-address {
            margin-bottom: 10px;
            background: #f2f2f2;
        }

        .address-container .manage-button-row .selected-address span {
            display: block;
            width: 100%;
            font-size: 12px;
            padding: 0 10px;

        }

        .address-container .manage-button-row .selected-address .title {
            padding-top: 10px;
            font-size: 12px;
            font-weight: 700;
            color: #13221C;
        }

        .address-container .manage-button-row .selected-address .contact {
            font-weight: 700;
            color: #007bff;
        }

        .address-container .manage-button-row .selected-address .note {
            padding: 10px;
            font-size: 10px;
            font-weight: 700;
            color: #ff8080;
        }

        .shipping {
            margin-bottom: 15px;
        }

        .voucher {
            margin-bottom: 15px;
        }

        .voucher #voucher-code {
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
            color: #000;
            text-decoration: none;
        }

        .content-row {
            display: flex;
            align-items: center;
        }

        .cta .voucher .voucher-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cta .voucher .voucher-title #view-voucher {
            font-size: 12px;
            color: #007bff;
            cursor: pointer;
        }

        .btn-checkout {
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 18px;
            font-weight: 600;
            margin-top: 4vh;
            padding: 10px;
            border-radius: 0;
        }

        .btn-checkout:hover {
            background: #AA9479;
            border: 1px solid transparent;
        }

        /* Modal - CSS */
        #choose-address-modal .modal-body {
            display: flex;
            flex-direction: column;
        }

        #choose-address-modal .modal-body .add-address-container .btn-add-address {
            display: flex;
            align-items: center;
            padding: 0;
            width: 132px;
            float: right;
            text-decoration: none;
        }

        #choose-address-modal .modal-body .add-address-container .btn-add-address svg {
            margin-right: 5px;
        }

        #choose-address-modal .modal-body .preferred-address {
            padding: 10px;
            font-weight: 600;
        }

        #choose-address-modal .modal-body .address-list {
            max-height: 300px;
            padding: 10px;
            overflow-y: auto;
        }

        #choose-address-modal .modal-body .address-list-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            padding: 20px;
            border-radius: 5px;
            min-height: 100px;
            background: #ddd;
            color: black;
            text-decoration: none;
        }

        #choose-address-modal .modal-body .address-list-container:focus {
            border: 1px solid orange;
        }

        #choose-address-modal .modal-body .address-list-container .default-address {
            margin-bottom: 10px;
            padding: 5px;
            width: 70px;
            text-align: center;
            font-size: 12px;
            font-weight: 700;
            background: beige;
            border-radius: 10px;
        }

        #choose-address-modal .modal-body .address-list-container .contact-details {
            display: flex;
            flex-direction: column;
            margin-top: 10px;
            font-size: 14px;
        }

        #choose-address-modal .modal-body .address-list-container .contact-details .contact-name {
            font-weight: 700;
        }

        #choose-address-modal .modal-body .address-list-container .address-details {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
            font-size: 14px;
            color: #007bff;
        }

        #choose-address-modal .modal-body .address-list-container .address-action {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #choose-address-modal .modal-body .address-list-container .address-action #chooseAddressBtn {
            margin-right: 10px;
            border: 0 solid transparent;
            width: 80px;
            background: #ffa31a;
            cursor: pointer;
        }

        #choose-address-modal .modal-body .address-list-container .address-action #chooseAddressBtn:hover {
            background: #e37a00;
        }

        #choose-address-modal .modal-body .address-list-container .address-action #editAddressBtn {
            margin-right: 10px;
            border: 0 solid transparent;
            width: 80px;
            background: #adad85;
            cursor: pointer
        }

        #choose-address-modal .modal-body .address-list-container .address-action #editAddressBtn:hover {
            background: #999966;
        }

        #choose-address-modal .modal-body .address-list-container .address-action .btn-delete img {
            width: 12px;
            cursor: pointer;
        }

        #add-address-modal .modal-footer {
            display: flex;
            justify-content: space-between;
        }

        /* Available Modal CSS */
        #available-voucher-modal .modal-dialog {
            max-width: 922px;
        }

        #available-voucher-modal .modal-header .modal-title{
            width: 100%;
            text-align: center;
            font-weight: 700;
            font-size: 25px;
        }

        #available-voucher-modal .modal-body {
            display: flex;
            flex-direction: column;
            padding: 20px;

        }

        #available-voucher-modal .modal-body .shipping-voucher {
            display: flex;
            flex-wrap: wrap;
        }

        #available-voucher-modal .modal-body .discount-voucher {
            display: flex;
            flex-wrap: wrap;
        }

        #available-voucher-modal .modal-body .title {
            display: block;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        #available-voucher-modal .modal-body .coupon-card {
            margin: 0 20px 20px 0;
            padding: 20px;
            width: 200px;
            height: 250px;
            text-align: center;
            color: #fff;
            background: linear-gradient(135deg, #ff9933, #e67300);
            border-radius: 15px;
            box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.15);
        }

        #available-voucher-modal .modal-body .coupon-card .voucher-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
            height: 120px;
            border-radius: 5px;
            background: #ffe6cc;
        }

        #available-voucher-modal .modal-body .coupon-card .voucher-icon img {
            width: 50px;
            height: 50px;
        }

        #available-voucher-modal .modal-body .coupon-card .voucher-icon .discount-value {
            font-size: 16px;
            font-weight: 700;
            color: #13221C;
        }

        #available-voucher-modal .modal-body .coupon-card .voucher-icon .discount-type {
            font-weight: 700;
            color: #13221C;
        }

        #available-voucher-modal .modal-body .coupon-card .voucher-icon .min-spend {
            font-size: 10px;
            font-weight: 300;
            color: #13221C;
        }

        #available-voucher-modal .modal-body .coupon-card .valid-date {
            font-weight: 600;
            font-size: 14px;
        }

        #available-voucher-modal .modal-body .coupon-card .tnc {
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
        }

        #available-voucher-modal .modal-body .coupon-row {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            width: 100%;
        }

        #available-voucher-modal .modal-body #cpnCode {
            padding: 10px;
            border: 1px dashed #fff;
            border-right: 0;
            width: 60%;
            font-size: 12px;
        }

        #available-voucher-modal .modal-body #cpnBtn {
            border: 1px solid #fff;
            padding: 10px;
            width: 40%;
            font-size: 12px;
            color: #007bff;
            background: #fff;
            cursor: pointer;
        }

        #available-voucher-modal .modal-body #cpnBtn:hover {
            background: #e6e6e6;
            color: #ff5c33;
        }

        #available-voucher-modal .modal-body .tnc {
            margin-top: 20px;
            font-weight: 600;
            font-size: 16px;
            color: #d6d6c2;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="shopping-cart-container">
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
                    <a href="<?php echo base_url("mainsite") ?> ">&leftarrow;
                        <span class="text-muted">Back to shop</span>
                    </a>
                </div>

            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>

                <hr>

                <div class="sub-cart">
                    <span class="item-count"></span>
                    <div class="text-right">MYR
                        <span class="subtotal"></span>
                    </div>
                </div>

                <form class="cta">
                    <!-- change address -->
                    <div class="address-container">
                        <div class="manage-button-row">
                            <a href="" class="btn-choose-address">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="18px" height="18px">
                                    <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z" />
                                </svg>CHANGE ADDRESS
                            </a>
                            <!-- show selected address -->
                            <div class="selected-address"></div>
                        </div>
                    </div>

                    <div class="shipping">
                        <span>Courier Company</span>
                        <select>
                            <option class="text-muted">Standard-Delivery - MYR 5.00</option>
                            <option class="text-muted">PGEON-Delivery - MYR 5.00</option>
                        </select>
                    </div>

                    <div class="voucher">
                        <div class="voucher-title">
                            <span>Voucher Code</span>
                            <span id="view-voucher">View Voucher</span>
                        </div>
                        <input id="voucher-code" placeholder="Enter your code">
                    </div>

                </form>

                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <span class="col">TOTAL PRICE</span>
                    <div class="col text-right">MYR
                        <span class="product-total"></span>
                    </div>
                </div>

                <!-- <div class="checkout-details">
                    <div class="details">
                        <span class="">Shipping Fee</span>
                        <span>MYR</span>

                        <span>Voucher Applied</span>
                        <span>MYR</span>
                    </div>

                </div> -->

                <button class="btn-checkout">CHECKOUT</button>
            </div>
        </div>

    </div>

    <!-- Modal - Choose Address Modal -->
    <div class="modal fade" id="choose-address-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADDRESS BOOK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="add-address-container">
                        <a href="" class="btn-add-address">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20px" height="20px">
                                <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                            </svg>NEW ADDRESS
                        </a>
                    </div>

                    <hr>

                    <span class="preferred-address">CHOOSE YOUR PREFERRED ADDRESS</span>
                    <div class="address-list"></div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - Add Address Modal -->
    <div class="modal fade" id="add-address-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADDRESS DETAILS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate>
                        <input type="hidden" id="add-address-id">

                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Address Line 1</label>
                            <input type="text" class="form-control" id="add-address-line1" placeholder="Block, Unit, Street Name" required>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom02" class="form-label">Address Line 2</label>
                            <input type="text" class="form-control" id="add-address-line2" placeholder="Area, Industrial Park" required>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">City</label>
                            <input type="text" class="form-control" id="add-city" required>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">State</label>
                            <select class="form-select" id="add-state" required>
                                <option selected disabled value="">Choose...</option>
                                <option>JOHOR</option>
                                <option>KELANTAN</option>
                                <option>KEDAH</option>
                                <option>MELAKA</option>
                                <option>NEGERI SEMBILAN</option>
                                <option>PAHANG</option>
                                <option>PERAK</option>
                                <option>PENANG</option>
                                <option>PERLIS</option>
                                <option>SARAWAK</option>
                                <option>SABAH</option>
                                <option>SELANGOR</option>
                                <option>TERENGGANU</option>
                                <option>WP KUALA LUMPUR</option>
                                <option>WP LABUAN</option>
                                <option>WP PUTRAJAYA</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom05" class="form-label">Postcode</label>
                            <input type="text" class="form-control" id="add-postcode" required>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Country</label>
                            <select class="form-select" id="add-country" required>
                                <option selected disabled value="">Choose...</option>
                                <option>MALAYSIA</option>
                            </select>
                        </div>

                        <hr style="padding:0;">

                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Contact name</label>
                            <input type="text" class="form-control" id="add-contact-name" placeholder="Mark Otto" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Contact No.</label>
                            <input type="text" class="form-control" id="add-contact-no" placeholder="0123456789" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Email</label>
                            <input type="text" class="form-control" id="add-email" placeholder="xxx@gmail.com" required>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="checked_default_address" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Marked as Default Address</label>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submitAddress">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - Available Vouchers Modal -->
    <div class="modal fade" id="available-voucher-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AVAILABLE VOUCHERS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- <div class="add-address-container">
                        <a href="" class="btn-add-address">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20px" height="20px">
                                <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                            </svg>NEW ADDRESS
                        </a>
                    </div>

                    <hr> -->

                    <span class='title'>SHIPPING VOUCHER</span>
                    <div class="shipping-voucher"></div>
                    <hr>
                    <span class='title'>DISCOUNT VOUCHER</span>
                    <div class="discount-voucher"></div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- jquery & sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- form-validation -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
    $(document).ready(function($) {
        getCartItem();

        //Modal - Choose Address
        $('.btn-choose-address').click(function(e) {
            e.preventDefault();

            $('#choose-address-modal').modal('show');
            getAddressDetails();

        });

        //Modal - Add address
        $('.btn-add-address').click(function(e) {
            e.preventDefault();

            $('#add-address-id').val('');
            $('#add-address-line1').val('');
            $('#add-address-line2').val('');
            $('#add-postcode').val('');
            $('#add-state').val('');
            $('#add-city').val('');
            $('#add-country').val('');
            $('#add-contact-name').val('');
            $('#add-contact-no').val('');
            $('#add-email').val('');
            $('#checked_default_address').prop("checked", false)

            $('#add-address-modal').modal('show');
        });

        //Modal - Available Vouchers
        $('#view-voucher').click(function(e) {
            e.preventDefault();

            getAvailableVouchers();
            $('#available-voucher-modal').modal('show');

        });

        //Close Modal
        $('[data-dismiss="modal"]').click(function(e) {
            $(this).closest('.modal').modal('hide');
        });

        //Submit Address
        $('#submitAddress').click(function(e) {
            e.preventDefault();

            var form_data = new FormData();

            form_data.append("address_line1", $('#add-address-line1').val());
            form_data.append("address_line2", $('#add-address-line2').val());
            form_data.append("postcode", $('#add-postcode').val());
            form_data.append("state", $('#add-state').val());
            form_data.append("city", $('#add-city').val());
            form_data.append("country", $('#add-country').val());
            form_data.append("contact_name", $('#add-contact-name').val());
            form_data.append("contact_no", $('#add-contact-no').val());
            form_data.append("email", $('#add-email').val());
            form_data.append("default_address", $('#checked_default_address').is(":checked") ? 1 : 0);

            if ($('#add-address-id').val()) {
                //UPDATE
                form_data.append("address_id", $('#add-address-id').val());

                $.ajax({
                    url: "<?php echo site_url('mainsite/update-address') ?>",
                    data: form_data,
                    encrypt: "",
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: "POST",
                    success: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Update Address Successful!',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        getAddressDetails();

                        $('#add-address-modal').modal('hide');
                    }
                });
            } else {
                //ADD

                $.ajax({
                    url: "<?php echo site_url('mainsite/add-new-address') ?>",
                    encrypt: "",
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: "POST",
                    success: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Create New Address Successful!',
                            showConfirmButton: false,
                            timer: 2000
                        })

                        getAddressDetails();

                        $('#add-address-modal').modal('hide');
                    }
                });
            }

        })

        //Display Default Address
        getDefaultAddressDetails();

        //Choose Address
        $(document).on('click', '#chooseAddressBtn', function(e) {
            e.preventDefault();

            $('.selected-address').children().remove();

            address = JSON.parse($(this).closest('.address-list-container').attr('data-address'));

            $('.selected-address').append(
                "<span class='title'>Selected Address: " + (address.default_address == 1 ? '(Default Address)' : '') + " </span>" +
                "<span class='contact'>" + address.contact_name + "</span>" +
                "<span class='contact'>" + address.contact_no + "</span>" +

                "<span class='details'>" + address.address_line1 + "," + address.address_line2 + "," + "</span>" +
                "<span class='details'>" + address.city + "," + address.postcode + "," + address.state + "," + address.country + "</span>" +
                "<span class='note'>Note: Kindly make sure your selected address is correct.</span>"

            );

            $('#choose-address-modal').modal('hide');
        });

        //Delete Address
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();

            var form_data = new FormData();

            form_data.append("address_id", $(this).closest('.address-list-container').attr('data-address-id'));

            Swal.fire({
                title: 'Are you sure?',
                text: "Remove this ADDRESS?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'REMOVE',
                cancelButtonText: 'CANCEL'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "<?php echo site_url('mainsite/delete-address') ?>",
                        data: form_data,
                        encrypt: "",
                        cache: false,
                        contentType: false,
                        processData: false,
                        method: "POST",
                        success: function(data) {
                            getAddressDetails();
                        }
                    });
                }
            })

        });

        $(document).on('click', '#editAddressBtn', function(e) {
            e.preventDefault();

            var addressDetails = JSON.parse($(this).closest('.address-list-container').attr('data-address'));

            // console.log(addressDetails);
            $('#add-address-id').val(addressDetails.id);
            $('#add-address-line1').val(addressDetails.address_line1);
            $('#add-address-line2').val(addressDetails.address_line2);
            $('#add-city').val(addressDetails.city);
            $('#add-state').val(addressDetails.state);
            $('#add-postcode').val(addressDetails.postcode);
            $('#add-country').val(addressDetails.country);
            $('#add-contact-name').val(addressDetails.contact_name);
            $('#add-contact-no').val(addressDetails.contact_no);
            $('#add-email').val(addressDetails.email);
            $('#checked_default_address').prop('checked', addressDetails.default_address == 1 ? 'checked' : false).trigger('change');

            $('#add-address-modal').modal('show');
        });


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
                        '       </div>' +

                        '        <div class="col product-name">' +
                        '            <div class="row">' + value.name + '</div>' +
                        '        </div>' +

                        '        <div class="quantity-container col" data-productid="' + value.product_id + '">' +
                        '            <button class="quantity-minus">-</button>' +
                        '            <a href="#" class="quantity">' + value.selected_quantity + '</a>' +
                        '            <button class="quantity-plus">+</button>' +
                        '        </div>' +

                        '        <div class="col content-row">' +
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

    // Get address details
    function getAddressDetails() {

        $('.address-list').children().remove();

        $.ajax({
            url: "<?php echo site_url('mainsite/get-address-details') ?>",
            encrypt: "",
            cache: false,
            contentType: false,
            processData: false,
            method: "POST",
            success: function(data) {
                // console.log(data);
                $.each(JSON.parse(data), function(i, value) {

                    $('.address-list').append(
                        "<div class='address-list-container' data-address-id='" + value.id + "' data-address='" + JSON.stringify(value) + "'> " +
                        "   <div class='checkout-address-row'> " +
                        "       <span class='default-address'>" + (value.default_address == 1 ? "Default" : 'Not-Default') + "</span> " +
                        "       <div class='contact-details'> " +
                        "           <span class='contact-name'>" + value.contact_name + "</span>" +
                        "           <span >" + value.contact_no + "</span>" +
                        "           <span>" + value.email + "</span>" +
                        "       </div>" +

                        "       <div class='address-details'>" +
                        "           <span>" + value.address_line1 + ", " + value.address_line2 + ", " + "</span>" +
                        "           <span>" + value.postcode + ", " + value.state + ", " + value.country + "</span>" +
                        "       </div>" +
                        "   </div>" +

                        "   <div class='address-action'> " +
                        "       <span class='btn btn-primary chooseAddress' id='chooseAddressBtn'>Choose</span>" +
                        "       <span class='btn btn-primary' id='editAddressBtn'>Edit</span>" +
                        "       <span class='btn-delete'><img src='https://img.icons8.com/small/18/null/delete-sign.png'/></span>" +
                        "   </div>" +
                        "</div>",
                    );
                });

            }
        });
    }

    //Display default address
    function getDefaultAddressDetails() {

        $.ajax({
            url: "<?php echo site_url('mainsite/get-default-address-details') ?>",
            encrypt: "",
            cache: false,
            contentType: false,
            processData: false,
            method: "POST",
            success: function(data) {

                $.each(JSON.parse(data), function(i, value) {

                    $('.selected-address').append(
                        "<span class='title'>Selected Address: " + (value.default_address == 1 ? '(Default Address)' : '') + " </span>" +
                        "<span class='contact'>" + value.contact_name + "</span>" +
                        "<span class='contact'>" + value.contact_no + "</span>" +

                        "<span class='details'>" + value.address_line1 + "," + value.address_line2 + "," + "</span>" +
                        "<span class='details'>" + value.city + "," + value.postcode + "," + value.state + "," + value.country + "</span>" +
                        "<span class='note'>Note: Kindly make sure your selected address is correct.</span>"
                    );
                });

            }
        });
    }

    function getAvailableVouchers() {

        $.ajax({
            url: "<?php echo site_url('voucher/get-available-vouchers') ?>",
            encrypt: "",
            cache: false,
            contentType: false,
            processData: false,
            method: "POST",
            success: function(data) {

                $('.shipping-voucher').children().remove();
                $('.discount-voucher').children().remove();

                $.each(JSON.parse(data), function(i, value) {

                    if (value.voucher_type == 'Shipping') {
                        $('.shipping-voucher').append(
                            "   <div class='coupon-card'>" +
                            "       <div class='voucher-icon'>" +
                            "           <img class='logo' src='https://img.icons8.com/material-rounded/96/null/truck--v1.png' />" +
                            "           <span class='discount-value'>MYR" + value.capped_amount + " OFF</span>" +
                            "           <span class='discount-type'>SHIPPING</span>" +
                            "           <span class='min-spend'>(Min.spend MYR" + value.min_spend + ")</span>" +
                            "       </div>" +

                            "       <div class='coupon-row'>" +
                            "           <span id='cpnCode'> " + value.voucher_code + " </span>" +
                            "           <span id='cpnBtn'>Apply</span>" +
                            "       </div>" +

                            "       <div class='valid-date'>" +
                            "           <span class='expired-date'> " + value.end_date + " </span><br>" +
                            "       </div>" +
                            "       <a href='' class='tnc'>T&C Apply</a>" +

                            "</div>" +
                            "<hr>",
                        );


                    } else if (value.voucher_type == 'Discount') {
                        $('.discount-voucher').append(
                            "<div class='coupon-card'>" +
                            "   <div class='voucher-icon'>" +
                            "       <img class='logo' src='https://img.icons8.com/glyph-neue/64/null/discount-ticket.png' />" +
                            "       <span class='discount-value'>MYR" + value.capped_amount + " OFF</span>" +
                            "       <span class='discount-type'>PRODUCT</span>" +
                            "       <span class='min-spend'>(Min.spend MYR" + value.min_spend + ")</span>" +
                            "   </div>" +

                            "   <div class='coupon-row'>" +
                            "       <span id='cpnCode'> " + value.voucher_code + " </span>" +
                            "       <span id='cpnBtn'>Apply</span>" +
                            "   </div>" +

                            "   <div class='valid-date'>" +
                            "       <span class='expired-date'> " + value.end_date + " </span><br>" +
                            "   </div>" +
                            "   <span class='tnc'>T&C Apply</span>" +

                            "</div>",

                        );
                    }
                });

            }
        });
    }
</script>

</html>