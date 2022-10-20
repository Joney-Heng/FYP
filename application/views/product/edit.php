<!DOCTYPE html>
<html>

<head>
    <title>Products Management - CRUD</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
        <div class="card">
            <div class="card-header">
                <a class="btn btn-outline-info float-right" href="<?php echo base_url('product/'); ?>">
                    View All Products
                </a>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('errors')) { ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('errors'); ?>
                    </div>
                <?php } ?>

                <form action="<?php echo base_url('product/update/' . $product->id); ?>" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $product->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"><?php echo $product->description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" min="0.00" value="<?php echo $product->price; ?>" step="any">
                    </div>
                    <div class="form-group">
                        <label for="price">Quantity</label>
                        <input type="number" class="form-control" id="stock-quantity" name="stock_quantity" min="0.00" value="<?php echo $product->price; ?>" step="any">
                    </div>
                    <div class="form-group">
                        <label for="price">SKU Number</label>
                        <input type="text" class="form-control" id="sku_number" name="sku_number"value="<?php echo $product->sku_number; ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="photo">Example Product Image</label>
                        <input type="file" class="form-control-file" id="photo" name="photo" value="<?php echo $product->photo; ?>">
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="product_status" name="product_status" <?php echo $product->product_status == 1 ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="product_status">Launch This Product?</label>
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Save Product</button>
                </form>

            </div>
        </div>
    </div>


</body>

</html>


