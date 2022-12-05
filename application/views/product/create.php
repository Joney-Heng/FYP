<!DOCTYPE html>
<html>

<head>
    <title>Products Management - CRUD</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
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
        body .container .card .photo-container{
            display: flex;
            justify-content: space-between;
        }
        body .container .card .form-group.upload {
            margin: 20px 0;
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
        body .container .card .card-body .upload #preview-photo {
           display: flex;
           flex-wrap: wrap;
           gap: 15px;
        }
        body .container .card .card-body .upload #preview-photo .wrapper {
            display: flex;
            flex-direction: column;
        }
        body .container .card .card-body .upload img {
            margin-bottom: 2px;
            margin-top: 15px;
            width: 200px;
            height: 200px;
            border: 2px solid #e69900;
            border-radius: 5px;
        }
        body .container .card .btn-save {
            margin: 30px 0;
            float: right;
        }
    </style>
</head>

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
                <form action="<?php echo base_url('product/store'); ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price(MYR)</label>
                        <input type="number" class="form-control" id="price" name="price" min="0.00" value="0.00" step="any">
                    </div>
                    <div class="form-group">
                        <label for="date">Stock Quantity</label>
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity"></input>
                    </div>
                    <div class="form-group">
                        <label for="price">SKU Number</label>
                        <input type="text" class="form-control" id="sku_number" name="sku_number"></input>
                    </div>

                    <div class="form-group upload">
                        <label for="photo">Example Product Image</label>
                        <input type="file" class="form-control-file" id="photo" name="photo">
                        <input type="hidden" id="product_photo" name="product_photo">
                        <div id="preview-photo"></div>
                    </div>

                    <div class="cta">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="product_status" name="product_status">
                            <label class="custom-control-label" for="product_status">Published This Product?</label>
                        </div>

                        <button type="submit" class="btn btn-save btn-outline-primary">Save Product</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

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
                        $('#preview-photo').append("<div class='wrapper'><img data-value='" + data.msg + "'src='https://storage-api-ten.vercel.app/files/" + data.msg + "'><button class='btn btn-danger remove'>Remove</button></div>");

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
        });

        $('#product_photo').val(photo.join(','));

    }
</script>

</html>