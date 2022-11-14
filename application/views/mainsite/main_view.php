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

    <style type="text/css">
        body.p-3 {
            display: block;
            padding: 0 !important;
            max-width: 1300px;
            background: #e5e5e5;
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
        
        .card-container {
            display: flex;
            flex-wrap: wrap;
            margin: 0 auto;
            max-width: 1200px;
        }

        .card-container a{
           text-decoration: none;
        }

        .card-container .card {
            margin: 0 5px 10px;
            border: 1px solid #ffa500
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
    </style>
</head>

<body class="p-3 m-0 border-0">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url("images/banner_1.jfif")?>" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide" preserveAspectRatio="xMidYMid slice" focusable="false">

            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url("images/banner_2.jfif")?>" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide" preserveAspectRatio="xMidYMid slice" focusable="false">

            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url("images/banner_3.jfif")?>" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide" preserveAspectRatio="xMidYMid slice" focusable="false">

            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Show Product -->
    <span class="title">RECOMMENDED PRODUCTS</span>
    <div class="card-container">
        <?php foreach ($products as $product) { ?>
            <?php if ($product->product_status == '1') { ?>
                <a href="<?php echo base_url('mainsite/product-details/' . $product->id) ?>">
                    <div class="card" style="width: 18rem;">
                        <img class="bd-placeholder-img card-img-top" src="http://joney-fyp-app.herokuapp.com/files/<?php echo $product->photo?>"/>

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

</html>