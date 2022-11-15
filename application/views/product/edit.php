<!DOCTYPE html>
<html>

<head>
    <title>Products Management - CRUD</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<style type="text/css">
    body {
        background: #ecedee;
    }

    body .container {
        margin-bottom: 40px;
    }

    body .container a.back-btn {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #000;
        font-weight: 500;
    }

    body .container a img {
        text-decoration: none;
        margin-right: 4px;
    }

    body .container .card label {
        font-size: 16px;
        font-weight: 500;
    }

    body .container .card .form-group label {
        color: #e69900;
        font-weight: 700;
    }

    body .container .card .photo-container {
        display: flex;
        justify-content: space-between;
    }

    body .container .card .form-group.upload {
        margin: 20px 0;
    }

    body .container .card .form-group.upload #preview-photo {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    body .container .card .form-group.upload #preview-photo .wrapper {
        display: flex;
        flex-direction: column;
    }

    body .container .card .form-group.upload #preview-photo .wrapper img {
        margin-top: 5px;
        margin-bottom: 2px;
        width: 200px;
        height: 200px;
        border: 2px solid #e69900 ;
        border-radius: 5px;
        object-fit: contain;
    }

    body .container .card .custom-control {
        display: flex;
        align-items: center;
    }

    body .container .card .cta {
        display: flex;
        justify-content: space-between;
        border-top: 1px solid #ccc;
    }

    body .container .card .btn-save {
        margin: 30px 0;
        float: right;
    }
</style>

<body>
    <div class="container">

        <h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
        <div class="card">
            <div class="card-header">
                <a class="float-left back-btn" href="<?php echo base_url('product'); ?>">
                    <img src="https://img.icons8.com/windows/32/000000/circled-left-2.png" />
                    BACK
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
                        <textarea class="form-control" id="description" rows="3" name="description"><?php echo preg_replace("/<br\W*?\/>/", "\n", $product->description); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" min="0.00" value="<?php echo number_format($product->price, 2, '.', ''); ?>" step="any">
                    </div>
                    <div class="form-group">
                        <label for="price">Quantity</label>
                        <input type="number" class="form-control" id="stock-quantity" name="stock_quantity" value="<?php echo $product->stock_quantity; ?>" step="any">
                    </div>
                    <div class="form-group">
                        <label for="price">SKU Number</label>
                        <input type="text" class="form-control" id="sku_number" name="sku_number" value="<?php echo $product->sku_number; ?>"></input>
                    </div>

                    <div class="form-group upload">
                        <label for="photo">Example Product Image</label>
                        <input type="file" class="form-control-file" id="photo" name="photo">

                        <input type="hidden" id="product_photo" name="product_photo" value="<?php echo $product->photo; ?>">
                        <div id="preview-photo">
                            <?php foreach (explode(',', $product->photo) as $photo) { ?>
                                <div class="wrapper">
                                    <img data-value='<?php echo $photo ?>' src="<?php echo ($photo != '') ? 'http://joney-fyp-app.herokuapp.com/files/' . $photo : ''; ?>" /><button class="btn btn-danger remove">Remove</button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="cta">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="product_status" name="product_status" <?php echo $product->product_status == 1 ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="product_status">Launch This Product?</label>
                        </div>

                        <button type="submit" class="btn btn-save btn-outline-primary">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>x

<script>
    $(document).ready(function() {
        $('#photo').change(function(e) {
            e.preventDefault();

            if ($(e.target)[0].files[0]) {
                var form_data = new FormData();

                form_data.append("multipartFile", $(e.target)[0].files[0]);

                $.ajax({
                    url: "<?php echo site_url('product/upload') ?>",
                    encrypt: "multipartFile/form-data",
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: "POST",
                    success: function(data) {
                        data = JSON.parse(data);
                        $('#preview-photo').append("<div class='wrapper'><img data-value='" + data.msg + "'src='http://joney-fyp-app.herokuapp.com/files/" + data.msg + "'><button class='btn btn-danger remove'>Remove</button></div>");

                        $('.remove').click(function(e) {
                            e.preventDefault();
                            $(this).closest('.wrapper').remove();

                            updateProductPhoto();
                        });

                        updateProductPhoto();
                    }
                });
            }
        });

        $('.remove').click(function(e) {
            e.preventDefault();
            $(this).closest('.wrapper').remove();
            updateProductPhoto();
        });
    });

    function updateProductPhoto() {
        var photo = [];

        $.each($('#preview-photo img'), function(i, value) {
            photo.push($(value).attr('data-value'));
            // console.log("haha",photo);
        });

        $('#product_photo').val(photo.join(','));

    }
</script>

</html>