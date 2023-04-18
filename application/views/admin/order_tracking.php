<!DOCTYPE html>
<html>

<head>
    <title>Tracking Management</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
              body .container {
            margin-bottom: 50px;
        }

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
                <a class="btn btn-outline-primary" href="<?php echo base_url('admin/dashboard'); ?>">
                    Back to Home
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
                        <th>Order Number</th>
                        <th>Receiver Name</th>
                        <th>Receiver Contact</th>
                        <th>Created Date</th>
                        <th>Order Total</th>
                        <th>Status</th>
                        <th width="240px">Action</th>
                    </tr>

                    <?php foreach ($orders as $order) { ?>
                        <?php if($order['order_status'] == 'PREPARING TO SHIP' || $order['order_status'] == 'DELIVERED') {?>
                            <tr>
                                <td><a href="<?php echo base_url('orders/tracking/show/' . $order['id']) ?>"><?php echo $order['order_number'] ?></a></td>
                                <td><?php echo $order['receiver_name']; ?></td>
                                <td><?php echo $order['receiver_contact_no']; ?></td>
                                <td><?php echo $order['order_created']; ?></td>
                                <td><?php echo $order['order_total']; ?></td>
                                <td><?php echo $order['order_status']; ?></td>

                                <td class="action-container" data-order-id="<?php echo $order['id']?>">
                                    <a href="https://www.tracking.my/track/<?php echo $order['parcel_id']?>" target="_blank">https://www.tracking.my/track/<?php  echo $order['parcel_id']?></a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>
</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


</html>