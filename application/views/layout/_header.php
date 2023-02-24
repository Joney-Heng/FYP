<!DOCTYPE html>
<html>

<head>
    <title>Header</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .header {
            display: flex;
            flex-direction: row;
            background: #13221C;
            position: sticky;
            top: 0;
            left: 0;
            height: 91px;
            z-index: 999;
        }

        .header .logo {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 20px;
            background: #4D4D33;
            flex: 1;
        }

        .header .logo img{
            width: 100px;
            height: 90px;
        }

        .header .logo .horizontal-line {
            margin: 0 10px;
            height: 25px;
            border-left: 2px solid #CC9900;
        }

        .header .logo .site {
            color: #CC9900;
            font-weight: 600;
            font-size: 18px;
        }

        .header .search {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            background: #7a7a52;
            width: 450px;
        }

        .header .search #search-container {
            display: flex;
            align-items: center;
            margin-left: 20px;
            flex: 1;
        }

        .header .search #search-container>img {
            width: 30px;
            height: 30px;
            margin-bottom: 2px;
            margin-right: 12px;
        }

        .header .search #search-container .search-product {
            background: transparent;
            color: #fff;
            border: 0;
            flex: 1;
        }

        .header .search #search-container .search-product:focus-visible {
            outline: none;
            box-shadow: none;
        }

        .header .search #search-container .search-product::placeholder {
            color: #fff;
        }

        .header .search #search-container .btn-search {
            display: flex;
            align-items: center;
            padding: 0;
            margin-left: 10px;
            cursor: pointer;
            border: 0;
        }

        .header .search #search-container .btn-search:focus-visible {
            outline: none;
            box-shadow: none;
        }

        .header .search #search-container .btn-search >span {
            display: none;
        }

        .header .search #search-container .btn-search.active >span {
            display: block;
            color: #1F6247;
            font-weight: 700;
            margin-right: 5px;
        }

        .header .search #search-container .btn-search.active >svg {
            display: none;
        }

        .header .search #search-container .btn-search >svg {
            display: block;
            margin-right: 20px;
        }

        .header .search #search-container .btn-search >img {
            display: none;
        }

        .header .search #search-container .btn-search.active >img {
            display: block;
            margin-right: 20px;
        }

        .header .search #search-container .btn-search >img {
            display: none;
            background: #1F6247;
            width: 40px;
            height: 40px;
            padding: 8px;
        }

        .header .search .product-selected {
            display: none;
        }

        .header .search .product-selected.active {
            display: flex;
            align-items: center;
            flex: 1;
            margin: 0 15px;
        }

        .header .search .product-selected .product-details {
            margin-left: 12px;
            color: #4EB600;
            font-weight: 700;
            line-height: 19px;
            flex: 1;
        }

        .header .product-selected .cancel {
            cursor: pointer;
        }
        
        .header .user-options {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            align-items: center;
            min-width: 180px;
            background: #4D4D33;
        }

        .header .user-options a {
            text-decoration: none;
            cursor: pointer;
        }

        .header .user-options img {
            width: 25px;           
            height: 25px;
        }

    </style>
</head>
<div class="header">
    <div class="logo">
        
        <a href="<?php echo base_url("mainsite") ?>"><img src="<?php echo base_url()?>images/store-logo.png"/></a>
            
        <div class="horizontal-line"></div>
        <span class="site"><i>Explore Your Needs.</i></span>
    </div>

    <div class="search got-product">
        <form id="search-container">
            <img src="https://img.icons8.com/ios/50/e5e5e5/open-delivered-box.png"/>
            <input type="text" class="search-product" placeholder="Search product (by Name)">

            <button class="btn btn-clear btn-search" type="submit">
                <span>Searching</span>

                <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" transform="translate(0 0.5)" fill="#7a7a52"/>
                    <path d="M29.2885 28.6234L24.76 24.0948C24.6514 23.9863 24.4997 23.9407 24.3613 23.9407H24.3435C25.4508 22.6204 26.1077 20.9652 26.1077 19.1225C26.1077 15.0285 22.7332 11.654 18.6392 11.654C14.5096 11.654 11.1707 15.029 11.1707 19.1225C11.1707 23.2516 14.5101 26.591 18.6392 26.591C20.4456 26.591 22.1269 25.9366 23.4224 24.8603C23.425 25.0205 23.4675 25.1694 23.5764 25.2784L28.105 29.8069C28.221 29.9229 28.3676 29.9873 28.5212 29.9873C28.6748 29.9873 28.8215 29.9229 28.9375 29.8069L29.2885 29.4558C29.4045 29.3398 29.469 29.1932 29.469 29.0396C29.469 28.886 29.4045 28.7393 29.2885 28.6234ZM18.6392 25.1343C15.291 25.1343 12.6274 22.4707 12.6274 19.1225C12.6274 15.8087 15.2916 13.1107 18.6392 13.1107C21.9523 13.1107 24.651 15.8094 24.651 19.1225C24.651 22.4701 21.9529 25.1343 18.6392 25.1343Z" fill="white" stroke="white" stroke-width="0.333333"/>
                </svg>

                <img src="assets/market/icons/swal-loading.svg" />
            </button>
        </form>

        <div class="searched-product-list"></div>

        <div class="product-selected">
            <svg width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.6289 10.9375C10.6094 10.9375 10.1523 11.5 8.5 11.5C6.8125 11.5 6.35547 10.9375 5.33594 10.9375C2.73438 10.9375 0.625 13.082 0.625 15.6836V16.5625C0.625 17.5117 1.36328 18.25 2.3125 18.25H14.6875C15.6016 18.25 16.375 17.5117 16.375 16.5625V15.6836C16.375 13.082 14.2305 10.9375 11.6289 10.9375ZM14.6875 16.5625H2.3125V15.6836C2.3125 13.9961 3.64844 12.625 5.33594 12.625C5.86328 12.625 6.67188 13.1875 8.5 13.1875C10.293 13.1875 11.1016 12.625 11.6289 12.625C13.3164 12.625 14.6875 13.9961 14.6875 15.6836V16.5625ZM8.5 10.375C11.2773 10.375 13.5625 8.125 13.5625 5.3125C13.5625 2.53516 11.2773 0.25 8.5 0.25C5.6875 0.25 3.4375 2.53516 3.4375 5.3125C3.4375 8.125 5.6875 10.375 8.5 10.375ZM8.5 1.9375C10.3281 1.9375 11.875 3.48438 11.875 5.3125C11.875 7.17578 10.3281 8.6875 8.5 8.6875C6.63672 8.6875 5.125 7.17578 5.125 5.3125C5.125 3.48438 6.63672 1.9375 8.5 1.9375Z" fill="#4EB600"/>
            </svg>
            
            <span class="product-details">TAN TEE HOW (MY123456789)</span>

            <svg class="cancel" width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="40" height="40" transform="translate(0 0.5)" fill="#1F6247"/>
                <path d="M20.7773 20.25L23.5938 17.4609L24.168 16.8867C24.25 16.8047 24.25 16.668 24.168 16.5586L23.5664 15.957C23.457 15.875 23.3203 15.875 23.2383 15.957L19.875 19.3477L16.4844 15.957C16.4023 15.875 16.2656 15.875 16.1562 15.957L15.5547 16.5586C15.4727 16.668 15.4727 16.8047 15.5547 16.8867L18.9453 20.25L15.5547 23.6406C15.4727 23.7227 15.4727 23.8594 15.5547 23.9688L16.1562 24.5703C16.2656 24.6523 16.4023 24.6523 16.4844 24.5703L19.875 21.1797L22.6641 23.9961L23.2383 24.5703C23.3203 24.6523 23.457 24.6523 23.5664 24.5703L24.168 23.9688C24.25 23.8594 24.25 23.7227 24.168 23.6406L20.7773 20.25Z" fill="white"/>
            </svg>
        </div>

            
    </div>

    <div class="user-options">
        <a href="<?php echo base_url("mainsite/shopping-cart") ?>"><img src="https://img.icons8.com/pastel-glyph/64/e5e5e5/shopping-cart--v1.png"/></a>
        <a href="<?php echo base_url("home") ?>"><img src="https://img.icons8.com/external-inkubators-basic-outline-inkubators/64/e5e5e5/external-user-profile-user-interface-inkubators-basic-outline-inkubators.png"/></a>
        <a href="#"><img src="https://img.icons8.com/ios-glyphs/64/e5e5e5/address-book.png"/></a>

    </div>
</div>

</html>