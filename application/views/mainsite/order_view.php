<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
		<title>Orders</title>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
		<link
			href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js"
			rel="stylesheet"
		/>
		<link
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
			crossorigin="anonymous"
		/>

		<style type="text/css">
			body {
				height: 100vh;
				background: #fff7e6 !important;
			}

			body h4 {
				font-size: 40px;
				font-weight: 700;
				text-align: center;
				margin-top: 30px;
			}

			body .order {
				padding: 40px;
			}

			body .order table {
				border: 1px solid black;
			}

			body .order th {
				background: #4D4D33;
				color: #cccc00;
				font-weight: 700;
			}

			body tr:nth-child(even) {
				background: #b8b894
			}

			body tr:nth-child(odd) {
				background: #ebebe0
			}

			body a {
				font-weight: 700;
				color: 
			}
		</style>
	</head>

	<body>
		<h4>Orders </h4>
		<div class="order">
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
					<?php if ($order['order_status'] == 'PREPARING TO SHIP' || $order['order_status'] == 'DELIVERED' || $order['order_status'] == 'PAYMENT RECEIVED') {?>
						<tr>
							<td><a href="<?php echo base_url('mainsite/orders/user/tracking/show/' . $order['id']) ?>"><?php echo $order['order_number'] ?></a></td>
							<td><?php echo $order['receiver_name']; ?></td>
							<td><?php echo $order['receiver_contact_no']; ?></td>
							<td><?php echo $order['order_created']; ?></td>
							<td><?php echo $order['order_total']; ?></td>
							<td><?php echo $order['order_status']; ?></td>

							<td class="action-container" data-order-id="<?php echo $order['id']?>">
								<?php if ($order['parcel_id'] != null) {?>
									<a href="https://www.tracking.my/track/<?php echo $order['parcel_id']?>" target="_blank">https://www.tracking.my/track/<?php  echo $order['parcel_id']?></a>
								<?php } ?>
							</td>
						</tr>
					<?php } ?>
				<?php } ?>
				
			</table>
		</div>
	</body>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>

	</script>
</html>
