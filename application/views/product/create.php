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
        // $('#photo').on('change', function() {
        //     var formData = new FormData();
        //     formData.append('multipartFile', this.files[0]);

        //     $.ajax({
        //         url: "<?php echo site_url('home/upload') ?>",
        //         type: 'POST',
        //         data: formData,
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         success: function(response) {
        //             // $('#response').html(response);
        //             console.log('s: ' + response);

        //         },
        //         error: function() {
        //             // $('#response').html('Error: Unable to upload the image.');
        //             console.log('Error: Unable to upload the image.');
        //         }
        //     });
        // });

        // $('#photo').change(function(e) {
        //     e.preventDefault();

        //     // Select the file input element
        //     const fileInput = $('input[type="file"]');

        //     // Get the selected file from the input element
        //     const file = fileInput[0].files[0];

        //     // Create a new FormData object
        //     const formData = new FormData();

        //     // Append the file to the FormData object
        //     formData.append('file', file);

        //     // Make the Ajax request
        //     $.ajax({
        //         url: 'https://storage-api-ten.vercel.app/files/',
        //         type: 'POST',
        //         data: formData,
        //         processData: false,
        //         contentType: false,
        //         processData: false,
        //         crossDomain: true,
        //         beforeSend: function(xhr) {
        //             xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
        //         },
        //         success: function(response) {
        //             console.log("response",response); // Log the response to the console
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             console.log("failed")
        //             console.error(errorThrown); // Log any errors to the console
        //         }
        //     });
        // });


        $('#photo').change(function(e) {
            e.preventDefault();

            if ($(e.target)[0].files[0]) {
                // var form_data = new FormData();

                // form_data.append("multipartFile", $(e.target)[0].files[0]);

                var formData = new FormData();
                formData.append('multipartFile', $('#photo')[0].files[0]);

                $.ajax({
                    url: "<?php echo site_url('product/upload') ?>",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // data = JSON.parse(data);
                        $('#preview-photo').append("<div class='wrapper'><img data-value='" + data + "'src='https://storage-api-ten.vercel.app/files/" + data + "'><button class='btn btn-danger remove'>Remove</button></div>");

                        $('.remove').click(function(e) {
                            e.preventDefault();
                            
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    
                                    $(this).closest('.wrapper').remove();

                                    updateProductPhoto();

                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                }
                            })
                        });

                        updateProductPhoto();
                    },

                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
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