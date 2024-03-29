<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Shopping Mall</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <script src="<?php echo base_url('assets/js/noscreenshot.js'); ?>"></script>

    <style type="text/css">

        .no-screenshot {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        body.p-3 {
            display: block;
            padding: 0 !important;
            background: #fff7e6;
            margin: 0 auto !important;
        }

        .title {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            color: #bf8040;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
        }
        .carousel-item img{
            height: calc(100vh - 71px);
            width: 95% !important;
            margin: 0 auto;
        }
        .card-container.content{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 0 auto;
            max-width: 1200px;
        }

        .card-container .filter {
            display: none;
        }

        .card-container a{
           text-decoration: none;
        }

        .card-container .card {
            margin: 0 5px 10px;
        }

        .card-container .card:hover{
            border: 2px solid #ffa500
        }

        .card-container .card .card-body {
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 160px;
        }

        .card-container .card .card-body .card-title{
            flex: 1;
            font-size: 12px;
            font-weight: 700;
            color:  #000000;
        }

        .card-container .card .card-body .card-text{
            font-size: 18px;
            font-weight: 600;
            color:  #ff8000;
        }

        .card-container .card .card-body .ori-price{
            font-size: 15px;
            color:  #979797;
            text-decoration: line-through;
        }

        nav {
            margin: 20px;
        }

        .product-list{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 0 auto;
            max-width: 1200px;
        }

        .card-container {
            cursor: pointer !important;
        }

        .filter-action {
            display: block;
            margin: 20px auto;
            text-align: center;
        }
    </style>
</head>

<body class="p-3 m-0 border-0 no-screenshot">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" >
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url("images/banner_3.jpeg")?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url("images/banner_2.jpeg")?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url("images/banner_1.jpeg")?>" class="d-block w-100" alt="...">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Show Product -->
    <span class="title">RECOMMENDED PRODUCTS</span>

    <div class="filter-action">
        <button class="btn btn-primary" onclick="filterProducts()">Sort by Name (A to Z)</button>
        <button class="btn btn-danger reset">Reset</button>
    </div>
        

    <div class="product-list" id="product-list"></div>

    <div class="card-container content">
        <?php foreach ($products as $product) { ?>
            <?php if ($product->product_status == '1') { ?>
                <a href="<?php echo base_url('mainsite/product-details/' . $product->id) ?>">
                    <div class="card" style="width: 18rem;">
                        <img class="bd-placeholder-img card-img-top" src="https://storage-api-ten.vercel.app/files/<?php echo explode(',', $product->photo)[0] ?>"/>

                        <div class="card-body">
                            <span class="card-title"><?php echo $product->name ?></span>
                            <span class="card-text">MYR <?php echo number_format($product->price, 2, '.', '') ?></span>
                            <span class="ori-price">MYR <?php echo number_format($product->price, 2, '.', '') ?></span>
                        </div>
                    </div>
                </a>
            <?php } ?>
        <?php } ?>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    $(document).ready(function() {
        $('.reset').click(function(e) {
            e.preventDefault();

            $('#product-list').children().remove();
            $('.card-container').show();
        });

        $('.no-screenshot').addClass('no-screenshot');

        
    });
    
    //Filter from A-Z
    function filterProducts() {
        $.ajax({
            url: '<?php echo base_url('mainsite/sortby/a-z') ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                // Update the product list on your web page with the sorted products
                $('.card-container').hide();
                $('#product-list').children().remove();

                var productList = $('#product-list');
                // productList.empty();
                $.each(data, function(index, product) {
                    if(product.product_status == 1) {
                        productList.append(
                            '<a style="text-decoration:none" href="<?= site_url('/')?>mainsite/product-details/' + product.id + ' ">'+
                                '<div class="card-container">'+
                                        '<div class="card" style="width: 18rem;">'+
                                                '<img class="bd-placeholder-img card-img-top" src="https://storage-api-ten.vercel.app/files/' + product.photo.split(',')[0] + '">' +
                                            '<div class="card-body">'+
                                                '<span class="card-title">' + product.name + '</span>'+
                                                '<span class="card-text">MYR' + parseFloat(product.price).toFixed(2) +'</span>'+
                                                '<span class="ori-price">MYR' + parseFloat(product.price).toFixed(2) +'</span>'+
                                            '</div>'+
                                        '</div>'+
                                '</div>' +
                            '</a>',
                        );
                    }
                });
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }

    // Prevent to Right Click save Image
    $(document).on('keyup keydown', function(e) {
        if (e.keyCode == 44) { // 44 is the keycode for the "Print Screen" key
            alert('Screenshots are not allowed on this website.');
            e.preventDefault();
            return false;
        }
    });

    $(document).on("contextmenu",function(){
        Swal.fire(
            'Save Image?',
            'To protect our original content,<br>This action we are strictly prohibited.',
            'question'
        )
        return false;
    });

</script>
</html>