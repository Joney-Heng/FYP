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
                <a class="btn btn-outline-primary" href="<?php echo base_url('product/create/'); ?>">
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
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>SKU Number</th>
                        <th>Status</th>
                        <th width="240px">Action</th>
                    </tr>

                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td><img src="<?php echo $product->photo; ?>"/></td>
                            <td><?php echo $product->name; ?></td>
                            <td><?php echo $product->description; ?></td>
                            <td><?php echo $product->price; ?></td>
                            <td><?php echo $product->stock_quantity; ?></td>
                            <td><?php echo $product->sku_number; ?></td>
                            <td><?php echo $product->product_status == 1 ? 'ACTIVE' : 'DISABLED' ?></td>

                            <td>
                                <a class="btn btn-outline-info" href="<?php echo base_url('product/show/' . $product->id) ?>">
                                    Show
                                </a>
                                <a class="btn btn-outline-success" href="<?php echo base_url('product/edit/' . $product->id) ?>">
                                    Edit
                                </a>
                                <a class="btn btn-outline-danger delete" href="#">
                                    Delete
                                </a>
                                <!-- <?php echo base_url('product/delete/' . $product->id) ?> -->
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