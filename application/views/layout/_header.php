
    <style>
        .header {
            display: flex;
            flex-direction: row;
            background: #13221C;
            position: sticky;
            top: 0;
            left: 0;
            height: 71px;
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

        .header .search #search_form {
            display: flex;
            align-items: center;
            margin: 0 20px;
            flex: 1;
        }

        .header img.remove-search{
            width: 25px !important;
            height: 25px !important;

        }

        .header .search #search_form>img {
            margin-right: 12px;
            width: 30px;
            height: 30px;
        }

        .header .search #search_form .search-product {
            background: transparent;
            color: #fff;
            border: 0;
            flex: 1;
        }

        .header .search #search_form .search-product:focus-visible {
            outline: 0;
            box-shadow: 0;
            border: 0;
        }

        .header .search #search_form .search-product::placeholder {
            color: #fff;
        }

        .header .search #search_form .btn-search {
            display: flex;
            align-items: center;
            padding: 0;
            margin-left: 10px;
            cursor: pointer;
            border: 0;
        }

        .header .search #search_form .btn-search:focus-visible {
            outline: none;
            box-shadow: none;
        }

        .header .search #search_form .btn-search >span {
            display: none;
        }

        .header .search #search_form .btn-search.active >span {
            display: block;
            color: #1F6247;
            font-weight: 700;
            margin-right: 5px;
        }

        .header .search #search_form .btn-search >img {
            display: none;
            background: #1F6247;
            width: 40px;
            height: 40px;
            padding: 8px;
        }

        .header .searched-product-list {
            position: fixed;
            display: flex;
            flex-direction: column;
            width: 450px;
            max-height: 450px;
            overflow-y: auto;   
            z-index: 1;
            top: 71px;
            font-weight: 700;
        }

        .header .searched-product-list .searced-item {
            padding: 10px 15px;
            color: #13221C;
            background: #fff;
            text-align: left;
            border: 1px solid #DADAD2;
            text-decoration: none;
            cursor: pointer;
        }

        .header .searched-product-list .searced-item{
            padding: 10px 15px;
            color: #13221C;
            background: #fff;
            text-align: left;
            border: 1px solid #DADAD2;
            text-decoration: none;
        }

        .header .searched-product-list .searced-item{
            padding: 10px 15px;
            color: #13221C;
            background: #fff;
            text-align: left;
            border: 1px  solid #DADAD2;
            border-top: 0 solid transparent;
            text-decoration: none;
        }

        .header .searched-product-list .searced-item:hover {
            color: #13221C;
        }

        .header .searched-product-list .searced-item:first-child {
            border: 1px solid #6A7470;
            background: #ECF8E3;
        }

        .header .searched-product-list .searced-item .product-details {
            display: block;
            font-weight: 500;
            font-size: 12px;
        }

        .header .remove-search {
            cursor: pointer;
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

<div class="header">
    <div class="logo">
        
        <a href="<?php echo base_url("mainsite") ?>"><img src="<?php echo base_url()?>images/store-logo.png"/></a>
            
        <div class="horizontal-line"></div>
        <span class="site"><i>Explore Your Needs.</i></span>
    </div>

    <div class="search got-product">
        <form id="search_form">
            <img src="https://img.icons8.com/ios/50/e5e5e5/open-delivered-box.png"/>
            <input type="text" class="search-product" id="search_query" name="search_query" placeholder="Search product (by Name)">

            <button class="btn btn-clear btn-search" type="submit">
                <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" transform="translate(0 0.5)" fill="#7a7a52"/>
                    <path d="M29.2885 28.6234L24.76 24.0948C24.6514 23.9863 24.4997 23.9407 24.3613 23.9407H24.3435C25.4508 22.6204 26.1077 20.9652 26.1077 19.1225C26.1077 15.0285 22.7332 11.654 18.6392 11.654C14.5096 11.654 11.1707 15.029 11.1707 19.1225C11.1707 23.2516 14.5101 26.591 18.6392 26.591C20.4456 26.591 22.1269 25.9366 23.4224 24.8603C23.425 25.0205 23.4675 25.1694 23.5764 25.2784L28.105 29.8069C28.221 29.9229 28.3676 29.9873 28.5212 29.9873C28.6748 29.9873 28.8215 29.9229 28.9375 29.8069L29.2885 29.4558C29.4045 29.3398 29.469 29.1932 29.469 29.0396C29.469 28.886 29.4045 28.7393 29.2885 28.6234ZM18.6392 25.1343C15.291 25.1343 12.6274 22.4707 12.6274 19.1225C12.6274 15.8087 15.2916 13.1107 18.6392 13.1107C21.9523 13.1107 24.651 15.8094 24.651 19.1225C24.651 22.4701 21.9529 25.1343 18.6392 25.1343Z" fill="white" stroke="white" stroke-width="0.333333"/>
                </svg>
            </button>

            <img class="remove-search" src="https://img.icons8.com/ios-glyphs/48/e5e5e5/clear-symbol.png"/>
        </form>

        <div class="searched-product-list"  id="search_results"></div>
            
    </div>

    <div class="user-options">
        <a href="<?php echo base_url("mainsite/shopping-cart") ?>"><img src="https://img.icons8.com/pastel-glyph/64/e5e5e5/shopping-cart--v1.png"/></a>
        <a href="<?php echo site_url('mainsite/user/order'); ?>"><img src="https://img.icons8.com/ios-glyphs/64/e5e5e5/purchase-order.png"/></a>
        <a href="<?php echo base_url('user/logout'); ?>"><img src="https://img.icons8.com/material-outlined/64/e5e5e5/exit.png"/></a>
        <span><?php echo $this->session->userdata('user_name'); ?></span>


    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // handle the search form submission
      $('#search_form').submit(function(event) {

        $('#search_results').children().remove();

        event.preventDefault(); // prevent the form from submitting normally
        var search_query = $('#search_query').val(); // get the search query
        searchProducts(search_query); // call the AJAX function to search for products
      });

      $('.remove-search').click(function(e) {
        e.preventDefault();

        $('#search_results').children().remove();
        $('#search_query').val("");
      });

      // function to search for products using AJAX
      function searchProducts(search_query) {
        $.ajax({
          url: '<?php echo site_url('mainsite/search-product'); ?>', // URL of the search function in the controller
          type: 'POST',
          dataType: 'json',
          data: {search_query: search_query},
          success: function(results) {
            // display the search results
            $('#search_results').children().remove();
            $.each(results, function(i, product) {
              $('#search_results').append('<a class="searced-item" href="<?= site_url('/')?>mainsite/product-details/' + product.id + ' ">' + product.name+ '</a>');
            });
          }
        });
      }
    });
  </script>