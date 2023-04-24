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

        .breadcrumb-container {
            padding: 0 20px;
            margin-top: 20px;
        }

        .shopping-cart-container {
            margin: 50px auto;
            max-width: 1350px;
            width: 100%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        .cart-items {
            overflow-x: hidden;
            min-height: 350px;
            height: 100%;
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
            padding: 60px !important;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
            background-color: #f2f2f2;
        }

        .price-content {
            display: flex;
            flex-direction: column;
        }

        .price-per-unit {
            font-size: 12px;
            font-weight: 300;
            color: #999966;
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
            display: flex;
            align-items: flex-end;
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
            padding: 10px 0;
        }

        .address-container .manage-button-row .btn-choose-address {
            display: flex;
            align-items: center;
            text-decoration: none;
            padding: 0;
            margin-bottom: 5px;
            width: 160px;
        }

        .address-container .manage-button-row .btn-choose-address svg {
            margin-right: 5px;
        }

        .address-container .manage-button-row .selected-address {
            margin-bottom: 15px;
            background: #f2f2f2;
        }

        .address-container .manage-button-row .selected-address span {
            display: block;
            padding: 0 10px;
            width: 100%;
            font-size: 12px;
            font-weight: 500;
            color: #999966;
        }

        .address-container .manage-button-row .selected-address .title {
            padding-top: 10px;
            font-size: 12px;
            font-weight: 700;
            color: #13221C;
        }

        .address-container .manage-button-row .selected-address .contact {
            font-weight: 700;
            color: #59b300;
        }

        .address-container .manage-button-row .selected-address .note {
            padding: 10px;
            font-size: 12px;
            font-weight: 400;
            color: #ff8080;
        }

        .shipping {
            padding: 0;
            margin-bottom: 15px;
        }

        .shipping .form-select {
            padding: 10px;
            font-size: 12px;
            font-weight: 600;
            color: #59b300;
        }

        .title-content {
            margin-bottom: 5px;
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
            font-weight: 700;
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

        .cta .voucher .voucher-title img {
            width: 18px;
            height: 18px;
            margin-bottom: 2px;
        }

        .cta .voucher .voucher-title .title {
            font-size: 16px;
            font-weight: 600;

        }

        .cta .voucher .voucher-title .cta-view-vouchers {
            display: flex;
            flex-direction:column;
            justify-content: flex-end;
        }

        .cta .voucher .voucher-title #view-voucher {
            text-align: right;
            font-size: 12px;
            color: #007bff;
            cursor: pointer;
        }

        .cta .voucher .voucher-title #view-voucher:hover {
            color: #0a58ca;
        }

        .cta .voucher .voucher-title #view-claimed-voucher {
            text-align: right;
            font-size: 12px;
            color: #007bff;
            cursor: pointer;
        }

        .cta .voucher .voucher-title #view-claimed-voucher:hover {
            color: #0a58ca;
        }

        .cta .voucher .voucher-code {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            padding: 10px;
            color: #ff8080;
            background: #fff;
            font-size: 12px;
            border-radius: 5px;
        }

        .checkout-details div {
            display: flex;
            justify-content: space-between;
        }

        .checkout-details .title {
            font-weight: 600;
        }

        .checkout-details .checkout-content {
            font-weight: 700;
            font-size: 20px;
        }

        .btn-checkout {
            margin-top: 10px;
            padding: 10px;
            width: 100%;
            font-size: 18px;
            font-weight: 600;
            background: #AA9479;
            color: white;
            border-color: #AA9479;
            border-radius: 5px;
        }

        .powered-by {
            margin: 5px 2px 0 5px;
            font-weight: 300;
            font-size: 12px;
            text-align: right;
        }

        .btn-checkout:hover {
            background: #AA9479;
            border: 1px solid transparent;
        }

        /* Modal - CSS */

        /* Choose-Address Modal */
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
            max-width: 702px;
        }

        #available-voucher-modal .modal-header .modal-title {
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
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: 700;
            color: #DEB887;
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
            font-size: 12px;
            font-weight: 300;
            color: #13221C;
        }

        #available-voucher-modal .modal-body .coupon-card .valid-date {
            font-weight: 600;
            font-size: 14px;
        }

        #available-voucher-modal .modal-body .coupon-card .tnc {
            text-decoration: none;
            color: #d6d6c2;
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
            color: #ff5c33;
            background: #fff;
            cursor: pointer;
        }

        #available-voucher-modal .modal-body #cpnBtn:hover {
            background: #f2f2f2;
            color: #59b300;
        }

        #claimed-voucher-modal .modal-dialog {
            max-width: 702px;
        }

        #claimed-voucher-modal .modal-header .modal-title {
            width: 100%;
            text-align: center;
            font-weight: 700;
            font-size: 25px;
        }

        #claimed-voucher-modal .modal-body {
            display: flex;
            flex-direction: column;
            padding: 20px;

        }

        #claimed-voucher-modal .modal-body .claimed-shipping-voucher {
            display: flex;
            flex-wrap: wrap;
        }

        #claimed-voucher-modal .modal-body .claimed-discount-voucher {
            display: flex;
            flex-wrap: wrap;
        }

        #claimed-voucher-modal .modal-body .title {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: 700;
            color: #DEB887;
        }

        #claimed-voucher-modal .modal-body .coupon-card {
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

        #claimed-voucher-modal .modal-body .coupon-card .voucher-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
            height: 120px;
            border-radius: 5px;
            background: #ffe6cc;
        }

        #claimed-voucher-modal .modal-body .coupon-card .voucher-icon img {
            width: 50px;
            height: 50px;
        }

        #claimed-voucher-modal .modal-body .coupon-card .voucher-icon .discount-value {
            font-size: 16px;
            font-weight: 700;
            color: #13221C;
        }

        #claimed-voucher-modal .modal-body .coupon-card .voucher-icon .discount-type {
            font-weight: 700;
            color: #13221C;
        }

        #claimed-voucher-modal .modal-body .coupon-card .voucher-icon .min-spend {
            font-size: 12px;
            font-weight: 300;
            color: #13221C;
        }

        #claimed-voucher-modal .modal-body .coupon-card .valid-date {
            font-weight: 600;
            font-size: 14px;
        }

        #claimed-voucher-modal .modal-body .coupon-card .tnc {
            text-decoration: none;
            color: #d6d6c2;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
        }

        #claimed-voucher-modal .modal-body .coupon-row {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            width: 100%;
        }

        #claimed-voucher-modal .modal-body #cpnCode {
            padding: 10px;
            border: 1px dashed #fff;
            border-right: 0;
            width: 60%;
            font-size: 12px;
        }

        #claimed-voucher-modal .modal-body #cpnBtn {
            border: 1px solid #fff;
            padding: 10px;
            width: 40%;
            font-size: 12px;
            color: #ff5c33;
            background: #fff;
            cursor: pointer;
        }

        #claimed-voucher-modal .modal-body #cpnBtn:hover {
            background: #f2f2f2;
            color: #59b300;
        }
    </style>
</head>

<body style="background:#fff7e6">
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
                                </svg>Add Address
                            </a>
                            <!-- show selected address -->
                            <div class="selected-address"></div>
                        </div>
                    </div>

                    <div class="shipping">
                        <div class="title-content">

                            <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 640 512" style="margin-bottom:2px">
                                <path d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48zm368-48c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48z" />
                            </svg>
                            <label for="validationCustom04" class="form-label">Courier Company</label>
                            <select class="form-select select-courier" id="choose-courier" required>
                                <option data-courier="Standard Delivery" selected value="8.00">Standard Delivery - MYR 8.00</option>
                                <option data-courier="J&T Express Delivery" value="8.50">J&T Express - MYR 8.50 </option>
                                <option data-courier="Easy Parcel" value="10.00">Easy Parcel - MYR 10.00 </option>
                                <option data-courier="PGeon Delivery" value="12.00">PGeon Delivery - MYR 12.00 </option>
                            </select>
                        </div>
                    </div>


                    <div class="voucher">
                        <div class="voucher-title">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 448 512" style="margin-bottom:2px">
                                    <path d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 96c-17.7 0-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32s-14.3 32-32 32z" />
                                </svg>
                                <span class="title">Voucher</span>
                            </div>

                            <div class="cta-view-vouchers">
                                <span id="view-voucher">Available Vouchers</span>
                                <span id="view-claimed-voucher">View Claimed Voucher</span>
                            </div>

                        </div>
                        <div class="voucher-code">
                            <span class="without-voucher" data-voucher-amount="0">- No Voucher Apply -</span>
                        </div>
                    </div>

                </form>

                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <!-- <span class="col">TOTAL</span> -->
                    <div class="col text-right ">
                        <div class="checkout-details"></div>
                    </div>
                </div>


                <button class="btn-checkout">Checkout</button>
                <div class="powered-by">Powered by
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="25px" height="25px" style="margin-bottom:3px">
                        <path d="M186.3 258.2c0 12.2-9.7 21.5-22 21.5-9.2 0-16-5.2-16-15 0-12.2 9.5-22 21.7-22 9.3 0 16.3 5.7 16.3 15.5zM80.5 209.7h-4.7c-1.5 0-3 1-3.2 2.7l-4.3 26.7 8.2-.3c11 0 19.5-1.5 21.5-14.2 2.3-13.4-6.2-14.9-17.5-14.9zm284 0H360c-1.8 0-3 1-3.2 2.7l-4.2 26.7 8-.3c13 0 22-3 22-18-.1-10.6-9.6-11.1-18.1-11.1zM576 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48zM128.3 215.4c0-21-16.2-28-34.7-28h-40c-2.5 0-5 2-5.2 4.7L32 294.2c-.3 2 1.2 4 3.2 4h19c2.7 0 5.2-2.9 5.5-5.7l4.5-26.6c1-7.2 13.2-4.7 18-4.7 28.6 0 46.1-17 46.1-45.8zm84.2 8.8h-19c-3.8 0-4 5.5-4.2 8.2-5.8-8.5-14.2-10-23.7-10-24.5 0-43.2 21.5-43.2 45.2 0 19.5 12.2 32.2 31.7 32.2 9 0 20.2-4.9 26.5-11.9-.5 1.5-1 4.7-1 6.2 0 2.3 1 4 3.2 4H200c2.7 0 5-2.9 5.5-5.7l10.2-64.3c.3-1.9-1.2-3.9-3.2-3.9zm40.5 97.9l63.7-92.6c.5-.5.5-1 .5-1.7 0-1.7-1.5-3.5-3.2-3.5h-19.2c-1.7 0-3.5 1-4.5 2.5l-26.5 39-11-37.5c-.8-2.2-3-4-5.5-4h-18.7c-1.7 0-3.2 1.8-3.2 3.5 0 1.2 19.5 56.8 21.2 62.1-2.7 3.8-20.5 28.6-20.5 31.6 0 1.8 1.5 3.2 3.2 3.2h19.2c1.8-.1 3.5-1.1 4.5-2.6zm159.3-106.7c0-21-16.2-28-34.7-28h-39.7c-2.7 0-5.2 2-5.5 4.7l-16.2 102c-.2 2 1.3 4 3.2 4h20.5c2 0 3.5-1.5 4-3.2l4.5-29c1-7.2 13.2-4.7 18-4.7 28.4 0 45.9-17 45.9-45.8zm84.2 8.8h-19c-3.8 0-4 5.5-4.3 8.2-5.5-8.5-14-10-23.7-10-24.5 0-43.2 21.5-43.2 45.2 0 19.5 12.2 32.2 31.7 32.2 9.3 0 20.5-4.9 26.5-11.9-.3 1.5-1 4.7-1 6.2 0 2.3 1 4 3.2 4H484c2.7 0 5-2.9 5.5-5.7l10.2-64.3c.3-1.9-1.2-3.9-3.2-3.9zm47.5-33.3c0-2-1.5-3.5-3.2-3.5h-18.5c-1.5 0-3 1.2-3.2 2.7l-16.2 104-.3.5c0 1.8 1.5 3.5 3.5 3.5h16.5c2.5 0 5-2.9 5.2-5.7L544 191.2v-.3zm-90 51.8c-12.2 0-21.7 9.7-21.7 22 0 9.7 7 15 16.2 15 12 0 21.7-9.2 21.7-21.5.1-9.8-6.9-15.5-16.2-15.5z" />
                    </svg>
                </div>
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

                    <div class="form-check form-switch" style="padding-left:45px">
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
                    <h5 class="modal-title" id="exampleModalLabel">-- AVAILABLE VOUCHERS --</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <span class='title'>Shipping Voucher</span>
                    <div class="shipping-voucher"></div>

                    <hr>

                    <span class='title'>Discount Voucher</span>
                    <div class="discount-voucher"></div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - Claimed Vouchers Modal -->
    <div class="modal fade" id="claimed-voucher-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">-- CLAIMED VOUCHERS --</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <span class='title'>Shipping Voucher</span>
                    <div class="claimed-shipping-voucher"></div>

                    <hr>

                    <span class='title'>Discount Voucher</span>
                    <div class="claimed-discount-voucher"></div>

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

        //Modal - Claimed Vouchers
        $('#view-claimed-voucher').click(function(e) {
            e.preventDefault();

            getAvailableRedeemVouchers();

            $('#claimed-voucher-modal').modal('show');
        });

        //Modal - Close Modal
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
                            title: 'ADDRESS UPDATED',
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
                            title: 'NEW ADDRESS CREATED',
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
                "<span class='contact' id='checkout-name'>" + address.contact_name + "</span>" +
                "<span class='contact' id='checkout-contact'>" + address.contact_no + "</span>" +
                "<span class='contact' id='checkout-email'>" + address.email + "</span>" +

                "<span class='details' id='checkout-address'>" + address.address_line1 + ", " + address.address_line2 + ", " + "</span>" +
                "<span class='details' id='checkout-address-details'>" + address.city + ", " + address.postcode + ", " + address.state + ", " + address.country + "</span>" +
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
                title: 'ARE YOU SURE?',
                text: "Remove this Address?",
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

        //Edit Address
        $(document).on('click', '#editAddressBtn', function(e) {
            e.preventDefault();

            var addressDetails = JSON.parse($(this).closest('.address-list-container').attr('data-address'));

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

        //Apply Voucher = Used Voucher
        $(document).on('click', '.apply-btn', function(e) {
            e.preventDefault();

            $('.voucher-code').children().remove();

            var form_data = new FormData();
            form_data.append("voucher_id", $(this).closest('.coupon-card').attr('data-voucher'));

            $.ajax({
                url: "<?php echo site_url('voucher/get-applied-voucher-details') ?>",
                data: form_data,
                encrypt: "",
                cache: false,
                contentType: false,
                processData: false,
                method: "POST",
                success: function(data) {
                    var data = JSON.parse(data);
                    var subtotal = $('.subtotal').html();

                    if (parseFloat(subtotal) >= parseFloat(data.min_spend)) {
                        $('.voucher-code').append(
                            "<span style='color:#59b300'> " + data.voucher_type + " (Code# " + data.voucher_code + ")</span>" +
                            "<span  class='applied-voucher-value' data-voucher-code='"+ data.voucher_code +"' data-voucher-type='"+ data.voucher_type +"' data-voucher-amount='" + data.capped_amount + "' style='color:#59b300'><b>(-)MYR" + parseFloat(data.capped_amount).toFixed(2) + "</b></span>"
                        );
                    } else {
                        $('.voucher-code').append(
                            "<span class='insufficient-amount'><img style='width:18px; margin-right:4px; margin-bottom:2px;' src='<?php echo base_url()?>images/warning-icon.png'/>Add more <b>MYR " + (parseFloat(data.min_spend) - parseFloat(subtotal)).toFixed(2) + "</b> to enjoy this voucher. </span>",
                        );
                    }

                    calculatePaymentTotal();
                    $('#claimed-voucher-modal').modal('hide');
                }

            });
        });

        $(document).on('click', '.claim-btn', function(e) {
            e.preventDefault();

            var form_data = new FormData();
            form_data.append("voucher_id", $(this).closest('.coupon-card').attr('data-voucher'));

            $.ajax({
                url: "<?php echo site_url('voucher/update-claimed-voucher') ?>",
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
                            title: 'Voucher is Claimed',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    // if (data == true) {
                    //     Swal.fire({
                    //         position: 'center',
                    //         icon: 'success',
                    //         title: 'Voucher is Claimed',
                    //         showConfirmButton: false,
                    //         timer: 1500
                    //     })
                    // }
                    // else {
                    //     Swal.fire({
                    //         position: 'center',
                    //         icon: 'warning',
                    //         title: 'Voucher has been<br>FULLY CLAIMED',
                    //         showConfirmButton: false,
                    //         timer: 1500
                    //     })
                    // }
                }
            });
        });

        //Choose courier shipping and update total
        $(document).on('click', '.select-courier', function(e) {
            e.preventDefault();

            calculatePaymentTotal()
        });

        $(document).on('click', '.btn-checkout', function(e) {
            e.preventDefault();

            if ($('.selected-address').html() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '"Address" field cannot be empty',
                })
            }
            else {
                
                let orderDetails = [];

                $.each($('.quantity-container'), function(i,val){
                    orderDetails.push({
                        productID: $(val).attr('data-productid'),
                        quantity: $(val).find('.quantity').html(),
                    });
                });

                var form_data = new FormData();
                form_data.append("receiver_name", $('#checkout-name').html());
                form_data.append("receiver_contact_no", $('#checkout-contact').html());
                form_data.append("shipping_address", $('#checkout-address').html() + $('#checkout-address-details').html());
                form_data.append("courier_company", $('#choose-courier option:selected').attr('data-courier'));
                form_data.append("shipping_amount", $('#choose-courier').val());
                form_data.append("voucher_amount", $('.voucher-amount').html() == undefined ? 0 : $('.voucher-amount').html().replace("(-) MYR ",""));
                form_data.append("voucher_code_applied", $('.coupon-card').attr('data-voucher') == undefined ? 0 : $('.coupon-card').attr('data-voucher'));
                form_data.append("product_subtotal", $('.subtotal').html());
                form_data.append("order_total", $('.checkout-total').html().replace("MYR ",""));
                form_data.append("product_details", JSON.stringify(orderDetails));

                $.ajax({
                    url: "<?php echo site_url('user/create/order') ?>",
                    data: form_data,
                    encrypt: "",
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: "POST",
                    success: function(data) {
                        let timerInterval

                        Swal.fire({
                            title: 'REDIRECTING TO PAYPAL PAYMENT',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location.href = '<?php echo base_url('mainsite/order/pay/'); ?>' + JSON.parse(data).orderNumber;
                                }
                            })
                    }

                });
            }

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

                data = JSON.parse(data); //String convert to JSON
                if (data && data.length > 0) {
                    $.each(data, function(i, value) {
                        
                        $('.cart-items').append(
                            '<div class="row border-top border-bottom cart-item">' +
                            '    <div class="row main align-items-center">' +
                            '        <div class="col-2">' +
                            '            <img class="img-fluid" src="https://storage-api-ten.vercel.app/files/' + value.photo.split(',')[0] + '">' +
                            '       </div>' +

                            '        <div class="col product-name">' +
                            '            <span class="row" style="color:#663300; font-weight:500">' + value.name + '</span>' +
                            '        </div>' +

                            '        <div class="quantity-container col" data-productid="' + value.product_id + '">' +
                            '            <button class="quantity-minus">-</button>' +
                            '            <a href="#" class="quantity">' + value.selected_quantity + '</a>' +
                            '            <button class="quantity-plus">+</button>' +
                            '        </div>' +

                            '        <div class="col content-row">' +
                            '           <div class="price-content">' +
                            '               <span>MYR <span class="item-price">' +
                            '                   ' + parseFloat(value.price * value.selected_quantity).toFixed(2) + ' ' +
                            '               </span></span>' +
                            '               <span class="price-per-unit">' +
                            '                   MYR ' + parseFloat(value.price).toFixed(2) + '/unit ' +
                            '               </span>' +
                            '           </div>' +

                            '            <button class="close delete-cart-item" data-cartid="' + value.id + '">&#10005;</button>' +
                            '        </div>' +
                            '    </div>' +
                            '</div>'
                        );
                    });
                } else {
                    $('.cart-items').append(
                        '<div class="empty-cart">' +
                        '   <span>Your Cart is empty Now</span>' +
                        '   <a href="<?php echo base_url('mainsite') ?>">Browse our shop now</a>' +
                        '</div>'
                    );

                    $('.btn-checkout').hide();
                    $('.powered-by').hide();
                }

                //Update quantity - Plus to add
                $('.quantity-container .quantity-plus').click(function(e) {
                    e.preventDefault();

                    $('.voucher-code').children().remove();

                    $('.voucher-code').append(
                        "<span class='without-voucher' data-voucher-amount='0'>- No Voucher Apply -</span>"
                    );

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

                    $('.voucher-code').children().remove();

                    $('.voucher-code').append(
                        "<span class='without-voucher' data-voucher-amount='0'>- No Voucher Apply -</span>"
                    );

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
                        title: 'ARE YOU SURE?',
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

    //Update cart sub total
    function updateGrandTotal() {
        var subTotal = 0;

        $.each($('.cart-item .item-price'), function(i, value) {
            subTotal += parseFloat($(value).html().trim());
        });
        $('.subtotal').html(subTotal.toFixed(2));

        calculatePaymentTotal();
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
                        "<span class='contact' id='checkout-name'>" + value.contact_name + "</span>" +
                        "<span class='contact' id='checkout-contact'>" + value.contact_no + "</span>" +
                        "<span class='contact' id='checkout-email'>" + value.email + "</span>" +

                        "<span class='details' id='checkout-address'>" + value.address_line1 + ", " + value.address_line2 + ", " + "</span>" +
                        "<span class='details' id='checkout-address-details'>" + value.city + ", " + value.postcode + ", " + value.state + ", " + value.country + "</span>" +
                        "<span class='note'>Note: Kindly make sure your selected address is correct.</span>"
                    );
                });

            }
        });
    }

    function getAvailableRedeemVouchers() {
        $.ajax({
            url: "<?php echo site_url('voucher/get-available-claimed-vouchers') ?>",
            encrypt: "",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $('.claimed-shipping-voucher').children().remove();
                $('.claimed-discount-voucher').children().remove();

                $.each(JSON.parse(data), function(i, value) {
                    
                    var today = new Date();
                    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                    var dateTime = date + ' ' + time;
                    if (value.voucher_status == 1) {
                        if (new Date(value.end_date) >= new Date(dateTime) && new Date(value.start_date) <= new Date(dateTime)) {
                            if (value.voucher_type == 'Shipping') {
                                $('.claimed-shipping-voucher').append(
                                    "   <div class='coupon-card' data-voucher='" + value.id + "'>" +
                                    "       <div class='voucher-icon'>" +
                                    "           <img class='logo' src='https://img.icons8.com/material-rounded/96/null/truck--v1.png' />" +
                                    "           <span class='discount-value'>MYR" + value.capped_amount + " OFF</span>" +
                                    "           <span class='discount-type'>SHIPPING</span>" +
                                    "           <span class='min-spend'>(Min.spend MYR" + value.min_spend + ")</span>" +
                                    "       </div>" +

                                    "       <div class='coupon-row'>" +
                                    "           <span id='cpnCode'> " + value.voucher_code + " </span>" +
                                    "           <span id='cpnBtn' class='apply-btn' >APPLY</span>" +
                                    "       </div>" +

                                    "       <div class='valid-date'>" +
                                    "           <span class='expired-date'> " + value.end_date + " </span><br>" +
                                    "       </div>" +
                                    "       <a href='' class='tnc'>T&C Apply</a>" +

                                    "</div>" +
                                    "<hr>",
                                );

                            } else if (value.voucher_type == 'Discount') {
                                $('.claimed-discount-voucher').append(
                                    "<div class='coupon-card' data-voucher='" + value.id + "'>" +
                                    "   <div class='voucher-icon'>" +
                                    "       <img class='logo' src='https://img.icons8.com/glyph-neue/64/null/discount-ticket.png' />" +
                                    "       <span class='discount-value'>MYR" + value.capped_amount + " OFF</span>" +
                                    "       <span class='discount-type'>PRODUCT</span>" +
                                    "       <span class='min-spend'>(Min.spend MYR" + value.min_spend + ")</span>" +
                                    "   </div>" +

                                    "   <div class='coupon-row'>" +
                                    "       <span id='cpnCode'> " + value.voucher_code + " </span>" +
                                    "       <span id='cpnBtn' class='apply-btn'>Apply</span>" +
                                    "   </div>" +

                                    "   <div class='valid-date'>" +
                                    "       <span class='expired-date'> " + value.end_date + " </span><br>" +
                                    "   </div>" +
                                    "   <span class='tnc'>T&C Apply</span>" +

                                    "</div>",

                                );
                            }
                        }
                    }
                });
            }
        });
    }

    // Display available voucher
    function getAvailableVouchers() {

        $.ajax({
            url: "<?php echo site_url('voucher/get-available-redeem-vouchers') ?>",
            encrypt: "",
            cache: false,
            contentType: false,
            processData: false,
            method: "POST",
            success: function(data) {
                
                $('.shipping-voucher').children().remove();
                $('.discount-voucher').children().remove();
                
                $.each(JSON.parse(data), function(i, value) {
                    
                    var today = new Date();
                    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                    var dateTime = date + ' ' + time;
                    
                    if (value.voucher_status == 1) {
                        if (new Date(value.end_date) >= new Date(dateTime) && new Date(value.start_date) <= new Date(dateTime)) {
                            if (value.voucher_type == 'Shipping') {
                                $('.shipping-voucher').append(
                                    "   <div class='coupon-card' data-voucher='" + value.id + "'>" +
                                    "       <div class='voucher-icon'>" +
                                    "           <img class='logo' src='https://img.icons8.com/material-rounded/96/null/truck--v1.png' />" +
                                    "           <span class='discount-value'>MYR" + value.capped_amount + " OFF</span>" +
                                    "           <span class='discount-type'>SHIPPING</span>" +
                                    "           <span class='min-spend'>(Min.spend MYR" + value.min_spend + ")</span>" +
                                    "       </div>" +
    
                                    "       <div class='coupon-row'>" +
                                    "           <span id='cpnCode'> " + value.voucher_code + " </span>" +
                                    "           <span id='cpnBtn' class='claim-btn' >CLAIM</span>" +
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
                                    "<div class='coupon-card' data-voucher='" + value.id + "'>" +
                                    "   <div class='voucher-icon'>" +
                                    "       <img class='logo' src='https://img.icons8.com/glyph-neue/64/null/discount-ticket.png' />" +
                                    "       <span class='discount-value'>MYR" + value.capped_amount + " OFF</span>" +
                                    "       <span class='discount-type'>PRODUCT</span>" +
                                    "       <span class='min-spend'>(Min.spend MYR" + value.min_spend + ")</span>" +
                                    "   </div>" +
    
                                    "   <div class='coupon-row'>" +
                                    "       <span id='cpnCode'> " + value.voucher_code + " </span>" +
                                    "       <span id='cpnBtn' class='claim-btn'>CLAIM</span>" +
                                    "   </div>" +
    
                                    "   <div class='valid-date'>" +
                                    "       <span class='expired-date'> " + value.end_date + " </span><br>" +
                                    "   </div>" +
                                    "   <span class='tnc'>T&C Apply</span>" +
    
                                    "</div>",
    
                                );
                            }
                        }
                    }

                    // if (new Date(value.end_date) >= new Date(dateTime) && new Date(value.start_date) <= new Date(dateTime)) {
                    //     if (value.voucher_type == 'Shipping') {
                    //         $('.shipping-voucher').append(
                    //             "   <div class='coupon-card' data-voucher='" + value.id + "'>" +
                    //             "       <div class='voucher-icon'>" +
                    //             "           <img class='logo' src='https://img.icons8.com/material-rounded/96/null/truck--v1.png' />" +
                    //             "           <span class='discount-value'>MYR" + value.capped_amount + " OFF</span>" +
                    //             "           <span class='discount-type'>SHIPPING</span>" +
                    //             "           <span class='min-spend'>(Min.spend MYR" + value.min_spend + ")</span>" +
                    //             "       </div>" +

                    //             "       <div class='coupon-row'>" +
                    //             "           <span id='cpnCode'> " + value.voucher_code + " </span>" +
                    //             "           <span id='cpnBtn' class='apply-btn' >APPLY</span>" +
                    //             "       </div>" +

                    //             "       <div class='valid-date'>" +
                    //             "           <span class='expired-date'> " + value.end_date + " </span><br>" +
                    //             "       </div>" +
                    //             "       <a href='' class='tnc'>T&C Apply</a>" +

                    //             "</div>" +
                    //             "<hr>",
                    //         );

                    //     } else if (value.voucher_type == 'Discount') {
                    //         $('.discount-voucher').append(
                    //             "<div class='coupon-card' data-voucher='" + value.id + "'>" +
                    //             "   <div class='voucher-icon'>" +
                    //             "       <img class='logo' src='https://img.icons8.com/glyph-neue/64/null/discount-ticket.png' />" +
                    //             "       <span class='discount-value'>MYR" + value.capped_amount + " OFF</span>" +
                    //             "       <span class='discount-type'>PRODUCT</span>" +
                    //             "       <span class='min-spend'>(Min.spend MYR" + value.min_spend + ")</span>" +
                    //             "   </div>" +

                    //             "   <div class='coupon-row'>" +
                    //             "       <span id='cpnCode'> " + value.voucher_code + " </span>" +
                    //             "       <span id='cpnBtn' class='apply-btn'>Apply</span>" +
                    //             "   </div>" +

                    //             "   <div class='valid-date'>" +
                    //             "       <span class='expired-date'> " + value.end_date + " </span><br>" +
                    //             "   </div>" +
                    //             "   <span class='tnc'>T&C Apply</span>" +

                    //             "</div>",

                    //         );
                    //     }
                    // }
                });
            }
        });

      
    }

    //Calculate Payment Total
    function calculatePaymentTotal() {
        var sub_total = parseFloat($('.subtotal').html());
        var shipping_amount = parseFloat($('#choose-courier').val());
        var voucher_amount = parseFloat($('.applied-voucher-value').attr('data-voucher-amount'));
        if (isNaN(voucher_amount)) {
            voucher_amount = 0;
        }

        $('.checkout-details').children().remove();

        $('.checkout-details').append(
            "<div>" +
            "   <span class='title'>Subtotal</span>" +
            "   <span class='subtotal-amount'>MYR " + sub_total.toFixed(2) + "</span>" +
            "</div>" +

            "<div>" +
            "   <span class='title'>Shipping Fee</span>" +
            "   <span class='shipping-amount'>(+) MYR " + shipping_amount.toFixed(2) + "</span>" +
            "</div>"
        );

        if (voucher_amount > 0) {
            if ($('.applied-voucher-value').attr('data-voucher-type') == "Shipping") {
                voucher_amount = Math.min(voucher_amount, shipping_amount); //Compare two amount and get the smallest amount
            } else if ($('.applied-voucher-value').attr('data-voucher-type') == "Discount") {
                voucher_amount = Math.min(voucher_amount, sub_total); //Compare two amount and get the smallest amount
            }

            $('.checkout-details').append(
                "<div>" +
                "   <span class='title'>Voucher Applied</span>" +
                "   <span class='voucher-amount'>(-) MYR " + voucher_amount.toFixed(2) + "</span>" +
                "</div>"
            );
        }

        $('.checkout-details').append(
            "<div class='checkout-content'>" +
            "   <span class='title'>Total</span>" +
            "   <span class='checkout-total'>MYR " + (sub_total + shipping_amount - voucher_amount).toFixed(2) + "</span>" +
            "</div>"
        );
    }

    // var cpnBtn = document.getElementById("cpnBtn");
    // var cpnCode = document.getElementById("cpnCode");

    // cpnBtn.onclick = function() {
    //     navigator.clipboard.writeText(cpnCode.innerHTML);
    //     cpnBtn.innerHTML = "DONE";
    //     setTimeout(function() {
    //         cpnBtn.innerHTML = "APPLY";
    //     }, 3000);
    // }
</script>

</html>