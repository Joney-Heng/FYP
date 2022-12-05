<!DOCTYPE html>
<html>

<head>
    <title>Products Management - CRUD</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style type="text/css">
        body .container .card .card-header {
            display: flex;
            justify-content: space-between;
        }

        body .container .card .card-body {
            overflow-x: auto;
        }

        body .container .card .table td.product-desc {
            display: block;
            white-space: nowrap;
            overflow: hidden;
            height: 128px;
            width: 100%;
            text-overflow: ellipsis;
        }

        body .container .card .table .action-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
        <div class="card">
            <div class="card-header">
                <a class="btn btn-outline-primary" href="<?php echo base_url('home  '); ?>">
                    Back to Home
                </a>
                <a class="btn btn-outline-success" href="<?php echo base_url('product/create/'); ?>">
                    Create New Product
                </a>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?>

                <table class="table table-bordered">
                    <tr>
                        <th>Example Product</th>
                        <th>Name</th>
                        <th>Price(MYR)</th>
                        <th>Stock Quantity</th>
                        <th>SKU Number</th>
                        <th>Status</th>
                        <th width="240px">Action</th>
                    </tr>

                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td><img src="https://storage-api-ten.vercel.app/files/<?php echo explode(',', $product->photo)[0]; ?>" style="width:80px"/></td>
                            <td><?php echo $product->name; ?></td>
                            <td><?php echo number_format($product->price, 2, '.', ''); ?></td>
                            <td><?php echo $product->stock_quantity; ?></td>
                            <td><?php echo $product->sku_number; ?></td>
                            <td><?php echo $product->product_status == 1 ? 'PUBLISHED' : 'UNPUBULISHED' ?></td>

                            <td class="action-container">
                                <a href="<?php echo base_url('product/show/' . $product->id) ?>">
                                    <img src="https://img.icons8.com/color/48/000000/ingredients-list.png" />
                                </a>
                                <a href="<?php echo base_url('product/edit/' . $product->id) ?>">
                                    <img src="https://img.icons8.com/color/48/000000/edit-property.png" />
                                </a>
                                <a class="delete" href="#">
                                    <img src="https://img.icons8.com/color-glass/48/000000/delete-forever.png" />
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
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
                        $.ajax({
                            url: "<?php echo base_url('product/delete/' . $product->id) ?>",
                            cache: false,
                            type: 'POST',
                        });
                        location.reload();
                    }
                })
            });

        });
    </script>
</body>

</html>