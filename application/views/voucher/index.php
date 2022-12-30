<!DOCTYPE html>
<html>

<head>
    <title>Voucher Management - INDEX</title>
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
        <h2 class="text-center mt-5 mb-3"><?php echo $title ?></h2>
        <div class="card">
            <div class="card-header">
                <a class="btn btn-outline-primary" href="<?php echo base_url('home'); ?>">
                    Back to Home
                </a>
                <a class="btn btn-outline-success" href="<?php echo base_url('voucher/create/'); ?>">
                    Create New Voucher
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
                        <th>Voucher Type</th>
                        <th>Campaign Name</th>
                        <th>Discount Type</th>
                        <th>Voucher Code</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>

                        <th width="240px">Action</th>
                    </tr>

                    <?php foreach ($vouchers as $voucher) { ?>
                        <tr>
                            <td><?php echo $voucher->voucher_type; ?></td>
                            <td><?php echo $voucher->campaign_name; ?></td>
                            <td><?php echo $voucher->discount_type; ?></td>
                            <td><?php echo $voucher->voucher_code; ?></td>
                            <td><?php echo $voucher->start_date; ?></td>
                            <td><?php echo $voucher->end_date; ?></td>
                            <td><?php echo $voucher->voucher_status == 1 ? 'ENABLE' : 'DISABLE' ?></td>

                            <!-- <td><?php echo number_format($voucher->price, 2, '.', ''); ?></td> -->

                            <td class="action-container">
                                <a href="<?php echo base_url('voucher/show/' . $voucher->id) ?>">
                                    <img src="https://img.icons8.com/color/48/000000/ingredients-list.png" />
                                </a>
                                <a href="<?php echo base_url('voucher/edit/' . $voucher->id) ?>">
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
</body>

<!-- jquery & sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- form-validation -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

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



</html>