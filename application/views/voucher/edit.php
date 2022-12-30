<!DOCTYPE html>
<html>

<head>
    <title>Voucher Management - CREATE</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            background: #ecedee;
        }

        body .create-voucher-page {
            margin: 40px auto;
            max-width: 1200px;
        }

        body .create-voucher-page .card-body {
            display: flex;
            justify-content: center;
            padding: 0;
            background: #f0fff3;

        }

        body .create-voucher-page .card-body .voucher-form {
            width: 50%;
            max-height: 700px;
            padding: 20px;
            border: 1px solid #eee;
            overflow-y: auto;
        }

        body .create-voucher-page .card-body .voucher-view {
            display: flex;
            flex-direction: column;
            width: 50%;
            padding: 40px;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card {
            background: linear-gradient(135deg, #ff9933, #e67300);
            color: #fff;
            text-align: center;
            padding: 20px 80px;
            border-radius: 15px;
            box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.15);
            position: relative;

        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .voucher-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background: #ffe6cc;
            border-radius: 5px;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .voucher-icon .logo {
            margin-bottom: 10px;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .voucher-icon .discount-value {
            font-weight: 600;
            font-size: 16px;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .voucher-icon .discount-value {
            font-weight: 600;
            font-size: 16px;
        }

        body .create-voucher-page .card-body .voucher-view .tnc {
            margin-top: 20px;
            font-weight: 600;
            font-size: 16px;
        }

        .coupon-card h3 {
            font-size: 28px;
            font-weight: 400;
            line-height: 40px;

        }

        .coupon-card p {
            font-size: 15px;

        }

        .coupon-row {
            display: flex;
            align-items: center;
            margin: 25px auto;
            width: fit-content;

        }

        #cpnCode {
            border: 1px dashed #fff;
            padding: 10px 20px;
            border-right: 0;

        }

        #cpnBtn {
            border: 1px solid #fff;
            background: #fff;
            padding: 10px 20px;
            color: #7158fe;
            cursor: pointer;
        }

        .circle1,
        .circle2 {
            background: #f0fff3;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);

        }

        .circle1 {
            left: -25px;
        }

        .circle2 {
            right: -25px;
        }


        body .create-voucher-page a.back-btn {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #000;
            font-weight: 500;
        }

        body .create-voucher-page a img {
            text-decoration: none;
            margin-right: 4px;
        }

        body .create-voucher-page .card label {
            font-size: 16px;
            font-weight: 500;
        }

        body .create-voucher-page .card .form-group label {
            color: #e69900;
            font-weight: 700;
        }

        body .create-voucher-page .card .photo-container {
            display: flex;
            justify-content: space-between;
        }

        body .create-voucher-page .card .form-group.upload {
            margin: 20px 0;
        }

        body .create-voucher-page .card .custom-control {
            display: flex;
            align-items: center;
        }

        body .create-voucher-page .card .cta {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #ccc;
        }

        body .create-voucher-page .card .btn-save {
            margin: 30px 0;
            float: right;
        }
    </style>
</head>

<body>
    <div class="create-voucher-page">
        <h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
        <div class="card">
            <div class="card-header">
                <a class="float-left back-btn" href="<?php echo base_url('voucher'); ?>">
                    <img src="https://img.icons8.com/windows/32/000000/circled-left-2.png" />
                    BACK
                </a>
            </div>

            <div class="card-body">
                <!-- <?php echo json_encode($voucherDetails)?> -->
                <div class="voucher-form">
                    <!-- <?php if ($this->session->flashdata('errors')) { ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('errors'); ?>
                        </div>
                    <?php } ?> -->
                    <form action="<?php echo base_url('voucher/update/' . $voucherDetails->id); ?>" method="POST">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group" class="voucher-type">

                            <label for="description">Voucher Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="voucherType" id="shippingVoucher" value="Shipping" <?php echo $voucherDetails->voucher_type == 'Shipping' ? "checked=checked" : "" ;?> >
                                <label class="form-check-label" for="shippingVoucher">
                                    Shipping Voucher
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="voucherType" id="discountVoucher" value="Discount" <?php echo $voucherDetails->voucher_type == 'Discount' ? "checked=checked" : "" ;?>>
                                <label class="form-check-label" for="discountVoucher">
                                    Discount Voucher
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="campaignName">Campaign Name</label>
                            <input type="text" class="form-control" id="campaignName" name="campaignName" value="<?php echo $voucherDetails->campaign_name?>">
                        </div>

                        <div class="form-group" class="discount-type">

                            <label for="description">Discount Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="discountType" id="typePercentage" value="Percentage" <?php echo $voucherDetails->discount_type == 'Percentage' ? "checked=checked" : "" ;?>>
                                <label class="form-check-label" for="typePercentage">
                                    Percentage (%)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="discountType" id="typeAmount" value="Amount" <?php echo $voucherDetails->discount_type == 'Amount' ? "checked=checked" : "" ;?> >
                                <label class="form-check-label" for="typeAmount">
                                    Amount (MYR)
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="minSpend">Minimum Spend Amount (MYR)</label>
                            <input type="number" class="form-control" id="minSpend" name="minSpend" min="0.00" value="<?php echo number_format($voucherDetails->min_spend, 2, '.', ''); ?>" step="any"></input>
                        </div>

                        <div class="form-group">
                            <label for="cappedAmount">Capped Amount (MYR)</label>
                            <input type="number" class="form-control" id="cappedAmount" name="cappedAmount" min="0.00" value="<?php echo number_format($voucherDetails->capped_amount, 2, '.', ''); ?>" step="any"></input>
                        </div>

                        <div class="form-group">
                            <label for="voucherCode">Voucher Code</label>
                            <input type="text" class="form-control" id="voucherCode" name="voucherCode" value="<?php echo $voucherDetails->voucher_code ?>"></input>
                        </div>

                        <div class="form-group">
                            <label for="voucherQuantity">Voucher Quantity </label>
                            <input type="number" class="form-control" id="voucherQuantity" name="voucherQuantity" value="<?php echo $voucherDetails->voucher_quantity ?>"></input>
                        </div>

                        <div class="form-group">
                            <label for="startDate">Start Date</label>
                            <input type="datetime-local" class="form-control" id="startDate" name="startDate" value="<?php echo $voucherDetails->start_date ?>"></input>
                        </div>

                        <div class="form-group">
                            <label for="endDate">End Date</label>
                            <input type="datetime-local" class="form-control" id="endDate" name="endDate" value="<?php echo $voucherDetails->end_date ?>"></input>
                        </div>

                        <div class="cta">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="voucher_status" name="voucher_status" <?php echo $voucherDetails->voucher_status == 1 ? 'checked' : '' ?>>
                                <label class="custom-control-label" for="voucher_status">Published This <b>Voucher</b></label>
                            </div>

                            <button class="btn btn-save btn-outline-primary" id="submitBtn">Save Voucher</button>
                        </div>
                    </form>
                </div>

                <div class="voucher-view">
                    <span class="title">Voucher Preview</span>
                    <div class="coupon-card">
                        <div class="voucher-icon">
                            <!-- <img class="logo" src="https://img.icons8.com/external-others-zufarizal-robiyanto/64/null/external-coupon-online-shopping-others-zufarizal-robiyanto.png" /> -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="120px" height="60px" class="logo">
                                <path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM208 416c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48zm272 48c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48z" />
                            </svg>
                            <span class="discount-value">10% OFF</span>
                            <span class="discount-type">SHIPPING</span>
                        </div>

                        <span class="title"></span>
                        <span class="description"></span>

                        <div class="coupon-row">
                            <span id="cpnCode">STEALDEAL20</span>
                            <span id="cpnBtn">Copy Code</span>
                        </div>

                        <div>Valid Till:
                            <span class="expired-date"> 20 Dec, 2022</span><br>
                            <span>T&C Apply</span>
                        </div>

                        <span class="circle1"></span>
                        <span class="circle2"></span>
                    </div>

                    <span class="tnc">Terms & Conditions Apply.</span>
                </div>
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
    $(document).ready(function($) {

    });

    //Store - created new voucher
    // $('#submitBtn').click(function(e) {
    //     e.preventDefault();

    //     var form_data = new FormData();

    //     form_data.append("voucher_type", $("[name='voucherType']:checked").val());
    //     form_data.append("campaign_name", $('#campaignName').val());
    //     form_data.append("discount_type", $("[name='discountType']:checked").val());
    //     form_data.append("min_spend", $('#minSpend').val());
    //     form_data.append("capped_amount", $('#cappedAmount').val());
    //     form_data.append("voucher_code", $('#voucherCode').val());
    //     form_data.append("voucher_quantity", $('#voucherQuantity').val());
    //     form_data.append("start_date", $('#startDate').val());
    //     form_data.append("end_date", $('#endDate').val());

    //     $.ajax({
    //         url: "<?php  ?>",
    //         data: form_data,
    //         encrypt: "",
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         method: "POST",
    //         success: function(data) {
    //             Swal.fire({
    //                 position: 'center',
    //                 icon: 'success',
    //                 title: 'Update Address Successful!',
    //                 showConfirmButton: false,
    //                 timer: 2000
    //             })
    //         }
    //     });
    // });

    var cpnBtn = document.getElementById("cpnBtn");
    var cpnCode = document.getElementById("cpnCode");

    cpnBtn.onclick = function() {
        navigator.clipboard.writeText(cpnCode.innerHTML);
        cpnBtn.innerHTML = "COPIED";
        setTimeout(function() {
            cpnBtn.innerHTML = "COPY CODE";
        }, 3000);
    }
</script>

</html>