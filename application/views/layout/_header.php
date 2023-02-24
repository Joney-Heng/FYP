<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .header {
            position: sticky;
            top: 0;
            left: 0;
            height: 91px;
            background: #999966;
            z-index: 999;
        }
        .header .content {
            display: flex;
            align-items: center;
            margin: 0 auto;
            padding: 20px 50px;
            max-width: 1560px;
        }
        .header .content >a img {
            width: 218px;
        }
        .header .content .horizontal-line {
            margin: 0 30px;
            height: 25px;
            border-left: 1px solid #ccccb3;
        }
        .header .content .site {
            flex: 1;
            padding-right: 20px;
            font-size: 12px;
            font-weight: 600;
            line-height: 14px;
            color: #ccccb3;
        }
        .header .content nav {
            display: flex;
        }
        .header .content nav a {
            padding-right: 34px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            color: #fff;
        }
        .header .content nav a:last-child {
            padding-right: 0;
        }
            .header .content .search,
            .header .content .cart,
        .header .content .user {
            padding: 4px;
        }
            .header .content .search img,
            .header .content .cart img,
        .header .content .user img {
            width: 28px;
        }
            .header .content .search,
        .header .content .cart {
            margin-right: 22px;
        }
        .header .content .search {
            margin-left: 53px;
        }
        .header .content .cart >a {
            position: relative;
        }
        .header .content .cart >a .cart-quantity {
            position: absolute;
            left: 8px;
            top: 1px;
            width: 12px;
            text-align: center;
            font-size: 10px;
            font-weight: 700;
            line-height: 14px;
            color: #999966;
        }
        .header .content .hamburger {
            display: none;
        }
        #modal-shopping-cart {
            display: flex;
            flex-direction: column;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-header {
            display: flex;
            align-items: center;
            padding: 35px 25px;
            border-bottom: 1px solid #88cc00;
            background-color: #fff;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-header h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-header .close {
            background-color: #fff;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-header .close:before {
            content: url("../icons/black-close.svg");
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-body {
            padding: 0;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-body .cart-header {
            margin: 0 auto;
            padding: 36px 20px;
            background-image: url("../images/banner-pattern.png");
            background-size: 55px;
            font-size: 14px;
            font-weight: 700;
            line-height: 23px;
            text-align: center;
            color: #dfbf9f;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-body .cart-header .code {
            display: inline-block;
            margin-top: 10px;
            padding: 3px 9px;
            color: #fff;
            background-color: #000000;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-footer {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            padding: 20px 25px 30px;
            box-shadow: 0px -10px 10px rgba(106,116,112,0.2);
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-footer .order-summary .order-summary-item {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-footer .order-summary .order-summary-item.pv-container {
            justify-content: flex-end;
            margin-top: 5px;
        }
            #modal-shopping-cart .modal-dialog .modal-content .modal-footer .order-summary .order-summary-item.pv-container .pv strong,
        #modal-shopping-cart .modal-dialog .modal-content .modal-footer .order-summary .order-summary-item.pv-container .bv strong {
            margin-right: 2px;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-footer .order-summary .order-summary-item.pv-container .pv {
            color:#e6ccff;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-footer .order-summary .order-summary-item.pv-container .bv {
            margin-left: 10px;
            color: #b3d9ff;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-footer .order-summary .order-summary-item .title {
            display: inline-block;
            width: 75px;
            font-size: 14px;
            font-weight: 700;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-footer .order-summary .order-summary-item .amount {
            display: flex;
            flex-direction: column;
            font-size: 22px;
            text-align: right;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-footer .order-summary .order-summary-item .amount .price {
            display: block;
            font-weight: 700;
            line-height: 28px;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-footer .order-summary .order-summary-item .amount .market-price {
            font-size: 14px;
            line-height: 20px;
            text-decoration: line-through;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-footer .note {
            margin-top: 5px;
            font-size: 12px;
            text-align: center;
        }
        #modal-shopping-cart .modal-dialog .modal-content .modal-footer .btn-primary {
            margin-top: 5px;
            border: 0 solid transparent;
            background-color: #ffe0b3;
        }
        #modal-search-product {
            display: flex;
            flex-direction: column;
        }
        #modal-search-product .modal-dialog {
            position: absolute;
            top: calc(50% - 100px);
            left: calc(50% - 250px);
            width: 100%;
        }
        #modal-search-product .modal-dialog .modal-content .modal-header {
            display: none;
            align-items: center;
            padding: 35px 25px;
            border-bottom: 1px solid #88cc00;
        }
        #modal-search-product .modal-dialog .modal-content .modal-header h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }
        #modal-search-product .modal-dialog .modal-content .modal-header .close {
            background-color: #fff;
        }
        #modal-search-product .modal-dialog .modal-content .modal-header .close:before {
            content: url("../icons/black-close.svg");
        }
        #modal-search-product .modal-dialog .modal-content .modal-body {
            display: flex;
            flex-direction: column;
            padding: 0;
        }
        #modal-search-product .modal-dialog .modal-content .modal-body .form-group {
            display: flex;
        }
        #modal-search-product .modal-dialog .modal-content .modal-body .form-group .form-control {
            padding: 35px 20px;
            border: 0px solid transparent;
            font-size: 16px;
            font-weight: 500;
            color: #999966;
        }
            #modal-search-product .modal-dialog .modal-content .modal-body .form-group .form-control:active,
            #modal-search-product .modal-dialog .modal-content .modal-body .form-group .form-control:focus,
        #modal-search-product .modal-dialog .modal-content .modal-body .form-group .form-control:hover {
            outline: none;
            box-shadow: none;
            border: 0px solid transparent;
        }
        #modal-search-product .modal-dialog .modal-content .modal-body .form-group .form-control::placeholder {
            color: $mzy_green_medium_color;
        }
        #modal-search-product .modal-dialog .modal-content .modal-body .form-group button {
            width: 75px;
            padding: 25px;
            background-color: transparent;
            border: 0 solid transparent;
        }
        #modal-search-product .modal-dialog .modal-content .modal-body .form-group button:before {
            content: url("../icons/black-search-900.svg");
        }
        #modal-search-product .modal-dialog .modal-content .modal-body .search-result .item {
            display: block;
            padding: 11px 20px;
            border-bottom: 1px solid #88cc00;
            border-left: 1px solid #88cc00;
            border-right: 1px solid #88cc00;
            color: #999966;
            text-decoration: none;
            background-color: #fff;
        }
        body.mobile .header .content {
            padding: 20px;
        }
        body.mobile .header .content >a img {
            width: 50px;
            content: url("../images/logo-mobile.svg");
        }
        body.mobile .header .content .horizontal-line {
            margin: 0 15px;
        }
        body.mobile .header .content nav {
            display: none;
        }
            body.mobile .header .content .search img,
            body.mobile .header .content .cart img,
        body.mobile .header .content .user img {
            width: 36px;
        }
            body.mobile .header .content .search,
        body.mobile .header .content .cart {
            margin-right: 10px;
        }
        body.mobile .header .content .search {
            margin-left: 0;
        }
        body.mobile .header .content .cart >a .cart-quantity {
            left: 10px;
            top: 0;
            width: 16px;
        }
        body.mobile .header .content .user {
            display: none;
        }
        body.mobile .header .content .hamburger {
            display: block;
        }
        body.mobile #modal-search-product .modal-dialog {
            top: 0;
            left: 0;
        }
        body.mobile #modal-search-product .modal-dialog .modal-content .modal-header {
            display: flex;
        }
        body.mobile #modal-search-product .modal-dialog .modal-content .modal-body .search-result {
            flex-direction: column;
        }
        #modal-hamburger-menu {
            display: flex;
            flex-direction: column;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-header {
            display: flex;
            align-items: center;
            padding: 35px 25px;
            border-bottom: 1px solid #88cc00;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-header h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-header .close {
            background-color: #fff;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-header .close:before {
            content: url("../icons/black-close.svg");
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-body {
            display: flex;
            flex-direction: column;
            padding: 0;
            background-color: #fff;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-body a {
            padding: 15px;
            border-top: 1px solid #88cc00;
            width: 100%;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            color: #999966;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-body a:last-child:visible {
            border-bottom: 1px solid #88cc00;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-body a.gray {
            background-color: #fff;
            border-top: 0 solid transparent;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-body a.cart {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-body a.cart:after {
            content: attr(data-cart-item-quantity);
            display: inline-block;
            margin-left: 10px;
            padding-top: 2px;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            font-weight: 700;
            text-align: center;
            color: #fff;
            background-color: #ccccb3;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-body a.my-account {
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid #88cc00;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-body a.my-account:after {
            content: '';
            background-image: url("../icons/black-arrow-down.svg");
            background-repeat: no-repeat;
            background-position: center;
            margin-left: 10px;
            width: 20px;
            height: 20px;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-body a.my-account.show {
            border-bottom: 0 solid transparent;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-body .my-account-pages {
            display: none;
            flex-direction: column;
        }
        #modal-hamburger-menu .modal-dialog .modal-content .modal-body .my-account-pages a {
            border-top: 0 solid transparent;
            font-size: 16px;
            font-weight: 600;}

    </style>
</head>

    <div class="header">
    <div class="content">
        <a href="index.php"><img src="assets/market/images/logo.svg"></a>
        <div class="horizontal-line"></div>
        <span class="site">SHOP<br>SINGAPORE</span>

        <nav>
            <a href="series.php">KANG SERIES</a>
            <a href="series.php">GOLD SERIES</a>
            <a href="specialised-series.php">SPECIALISED SERIES</a>
        </nav>

        <div class="search">
            <a href="#"><img src="assets/market/images/search-icon.svg"></a>
        </div>
        <div class="cart">
            <a href="shopping-cart.php">
                <img src="assets/market/images/cart-icon.svg">
                <span class="cart-quantity">5</span>
            </a>
        </div>
        <div class="user">
            <a href="account-dashboard.php"><img src="assets/market/images/profile-icon.svg"></a>
        </div>
        <div class="hamburger">
            <a href="#"><img src="assets/market/images/hamburger-menu.svg"></a>
        </div>
    </div>
    </div>

    <!-- <div class="modal fade" id="modal-hamburger-menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MENU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <a class="gray" href="index.php">HOME</a>
                <a class="gray" href="series.php">KANG</a>
                <a class="gray" href="series.php">GOLD</a>
                <a class="gray" href="specialised-series.php">SPECIALISED</a>
                <a class="cart" href="shopping-cart.php" data-cart-item-quantity="5">MY CART</a>
                <a class="my-account" href="#">MY ACCOUNT</a>
                <div class="my-account-pages">
                    <a href="account-voucher-herbal-soup.php">RM20 Cash Voucher</a>
                    <a href="account-dashboard.php">Dashboard</a>
                    <a href="account-profile.php">Profile</a>
                    <a href="account-order.php">Orders</a>
                    <a href="account-address.php">Addresses</a>
                    <a href="account-network.php">Network</a>
                    <a href="account-income.php">Income</a>
                    <a href="#">Bonus Calculator</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade modal-full-height" id="modal-shopping-cart" tabindex="-1" role="dialog" aria-labelledby="modal-shopping-cart-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-shopping-cart-title">MY CART</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="cart-header">
                    Payday Sale<br />
                    FREE Delivery Over SGD111<br />
                    Extra 11% OFF<br />

                    <div class="code">
                        Use code: 1111DEALS
                    </div>
                </div>

                <div class="cart-item-popup">
                    <div class="item">
                        <img src="assets/market/runtime-images/product-item-image.png" />
                        <div class="details">
                            <span class="discount">20% OFF</span>
                            <span class="product-title">Basic - Kang 12 Series For Men</span>
                            <div class="price">
                                <span class="selling-price">$1,120</span>
                                <span class="market-price">$1,380</span>
                            </div>
                            <div class="pv-container">
                                <span class="pv"><strong>PV</strong>1,380</span>
                                <span class="bv"><strong>BV</strong>2,760</span>
                            </div>
                        </div>
                        <span class="quantity">2</span>
                    </div>
                </div>
                <?php include 'component/cart-item-popup.php' ?>
                <?php include 'component/cart-item-popup.php' ?>
                <?php include 'component/cart-item-popup.php' ?>

            </div>
            <div class="modal-footer">
                <div class="order-summary">
                    <div class="order-summary-item">
                        <span class="title">Subtotal</span>
                        <div class="amount">
                            <span class="price">$4,480</span>
                            <span class="market-price">$4,480</span>
                        </div>
                    </div>
                    <div class="order-summary-item pv-container">
                        <span class="pv"><strong>PV</strong>5,640</span>
                        <span class="bv"><strong>BV</strong>11,280</span>
                    </div>
                </div>
                <span class="note">Your promotional discounts / gifts will be reflected on the next page</span>
                <button type="button" class="btn btn-primary" id="modal-shopping-cart-go-cart">GO TO CART</button>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="modal-search-product" tabindex="-1" role="dialog" aria-labelledby="modal-search-product-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-search-product-title">SEARCH</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group normal">
                    <input type="text" class="form-control" placeholder="Type keyword here" />
                    <button class="btn btn-primary"></button>
                </div>
                <div class="search-result">
                    <a class="item" href="individual-product.php">M13, <strong>Spine</strong> Care For Men, 8 Extraordinary - Governing Vessel </a>
                    <a class="item" href="individual-product.php">L13, <strong>Spine</strong> Care For Ladies, 8 Extraordinary - Governing Vessel </a>
                </div>
            </div>
        </div>
    </div>
    </div> -->

</html>