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
            justify-content: flex-end;
            align-items: center;
            min-width: 180px;
            background: #4D4D33;
			padding: 20px
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
        
        <a href="<?php echo base_url("home")?>"><img src='<?php echo base_url()?>images/store-logo.png'/></a>
            
        <div class="horizontal-line"></div>
        <span class="site"><i>Explore Your Needs.</i></span>
    </div>

    <div class="user-options">
        <a href="<?php echo base_url("mainsite")?>"><img src="https://img.icons8.com/external-inkubators-basic-outline-inkubators/64/e5e5e5/external-user-profile-user-interface-inkubators-basic-outline-inkubators.png"/></a>
    </div>
</div>

</html>