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
        }

        body .create-voucher-page .card-body .voucher-form {
            width: 50%;
            max-height: 700px;
            padding: 20px;
            border: 1px solid #eee;
            overflow-y: auto;
        }

        body .create-voucher-page .card-body .voucher-view {
            width: 50%;
            padding: 40px;
        }
        body .create-voucher-page .card-body .voucher-view .view-container{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px 30px 40px 0;
            border: 1px dashed #999966;
            background: #eee;
        }

        body .create-voucher-page .card-body .voucher-view .title {
            display: block;
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: 600;
            text-align: center;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card {
            padding: 20px;
            margin-bottom: 10px;
            width: 200px;
            height: 250px;
            text-align: center;
            color: #fff;
            background: linear-gradient(135deg, #ff9933, #e67300);
            border-radius: 15px;
            box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.15);
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .voucher-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
            height: 120px;
            border-radius: 5px;
            background: #ffe6cc;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .voucher-icon img {
            width: 50px;
            height: 50px;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .voucher-icon .discount-value {
            font-size: 18px;
            font-weight: 700;
            color: #13221C;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .voucher-icon .discount-type {
            font-size: 15px;
            font-weight: 700;
            color: #13221C;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .voucher-icon .min-spend {
            font-size: 12px;
            font-weight: 300;
            color: #13221C;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .valid-date {
            font-weight: 600;
            font-size: 14px;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .valid-date .tnc {
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .coupon-row {
            display: flex;
            align-items: center;
            margin: 0 0 5px 0;
            width: 100%;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card #cpnCode {
            padding: 10px;
            border: 1px dashed #fff;
            border-right: 0;
            width: 60%;
            height: 38px;
            font-size: 12px;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card #cpnBtn {
            border: 1px solid #fff;
            padding: 10px;
            width: 40%;
            font-size: 12px;
            color: #ff5c33;
            background: #fff;
            cursor: pointer;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card #cpnBtn:hover {
            background: #f2f2f2;
            color: #59b300;
        }

        body .create-voucher-page .card-body .voucher-view .coupon-card .tnc {
            margin-top: 20px;
            font-weight: 600;
            font-size: 14px;
            color: #d6d6c2;
            text-decoration: none;
        }

        body .create-voucher-page .card-body .voucher-view .tnc {
            margin: 10px 0;
            font-weight: 600;
            font-size: 18px;
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

        .voucher-view .tnc-details {
            font-size: 14px;
            margin-left: 40px;
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
                <div class="voucher-form">
                    <!-- <?php if ($this->session->flashdata('errors')) { ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('errors'); ?>
                        </div>
                    <?php } ?> -->

                    <div class="form-group" class="voucher-type">

                        <label for="description">Voucher Type</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="voucherType" id="shippingVoucher" value="Shipping" checked>
                            <label class="form-check-label" for="shippingVoucher">
                                Shipping Voucher
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="voucherType" id="discountVoucher" value="Discount">
                            <label class="form-check-label" for="discountVoucher">
                                Discount Voucher
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="campaignName">Campaign Name</label>
                        <input type="text" class="form-control" id="campaignName" name="campaignName" placeholder="eg. Countdown 23">
                    </div>

                    <div class="form-group" class="discount-type">

                        <label for="description">Discount Type</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discountType" id="typeAmount" value="Amount" checked>
                            <label class="form-check-label" for="typeAmount">
                                Amount (MYR)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discountType" id="typePercentage" value="Percentage" disabled>
                            <label class="form-check-label" for="typePercentage">
                                Percentage (%)
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="minSpend">Minimum Spend Amount (MYR)</label>
                        <input type="number" class="form-control" id="minSpend" name="minSpend" min="0.00" value="0.00" step="any"></input>
                    </div>

                    <div class="form-group">
                        <label for="cappedAmount">Capped Amount (MYR)</label>
                        <input type="number" class="form-control" id="cappedAmount" name="cappedAmount" min="0.00" value="0.00" step="any"></input>
                    </div>

                    <div class="form-group">
                        <div style="display:flex; justify-content:space-between;align-items:center">
                            <label for="voucherCode" >Prefixed Code</label>
                            <!-- <button class="btn btn-primary" id="generateCode">Generate Code <img src="https://img.icons8.com/external-tal-revivo-bold-tal-revivo/20/e6e6e6/external-click-to-add-more-with-plus-sign-isolated-on-white-background-touch-bold-tal-revivo.png"/></button> -->
                        </div>
                        <input type="text" class="form-control" id="voucherCode" name="voucherCode" placeholder="eg. VOUxxxxxx" style="margin-top:5px"></input>
                    </div>

                    <div class="form-group">
                        <label for="voucherQuantity">Voucher Quantity </label>
                        <input type="number" class="form-control" id="voucherQuantity" name="voucherQuantity"></input>
                    </div>

                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="datetime-local" class="form-control" id="startDate" name="startDate"></input>
                    </div>

                    <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="datetime-local" class="form-control" id="endDate" name="endDate"></input>
                    </div>

                    <div class="cta">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="voucher_status" name="voucher_status">
                            <label class="custom-control-label" for="voucher_status">Published This <b>Voucher</b>?</label>
                        </div>

                        <button class="btn btn-save btn-outline-primary" id="submitBtn">Save Voucher</button>
                    </div>
                </div>

                <div class="voucher-view">
                    <span class="title">Voucher Preview</span>
                    <div class="view-container">
                        <div class="coupon-card">
                            <div class="voucher-icon">
                                <div class="voucher-image">
                                    <img class='logo' src='https://img.icons8.com/material-rounded/96/null/truck--v1.png' />
                                </div>
                                <!-- <img class="logo" src="https://img.icons8.com/external-others-zufarizal-robiyanto/64/null/external-coupon-online-shopping-others-zufarizal-robiyanto.png" /> -->
                                <span class="discount-value">MYR ___ OFF</span>
                                <span class="discount-type">SHIPPING</span>
                                <span class="min-spend">( Min.spend MYR ___ )</span>
                            </div>
    
                            <span class="title"></span>
                            <span class="description"></span>
    
                            <div class="coupon-row">
                                <span id="cpnCode">STEALDEAL20</span>
                                <span id="cpnBtn">APPLY</span>
                            </div>
    
                            <div class="valid-date">
                                <span class='expired-date'>YYYY-MM-DD HH:MM</span>
                                <br>
                                <a href='#' class='tnc'>T&C Apply</a>
                            </div>
                        </div>

                        <span class="tnc">Terms & Conditions Apply.</span>
                        <ol class="tnc-details">
                            <li>Enjoy <b>MYR<span class="tnc-discount-value">___</span> off</b> with minimum <b>MYR<span class="tnc-min-spend">___</span> spend</b>.</li>
                            <li>Voucher usage is limited, on a first come first served basis.</li>
                            <li>Voucher Application :</li>
                            <ol type="a" style="padding-left:14px">
                                <li>No. of times usable: 999 times</li>
                                <li>Store : Jolles' Mainsite Only</li>
                                <li>Eligibility : All Buyers</li>
                                <li>Brands : Selected Sellers Only</li>
                                <li>Delivery Locations : Nationwide</li>
                            </ol>
                        </ol>
                    </div>
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
   $(document).ready(function() {
        $("#generateCode").click(function(e) {
            e.preventDefault();

            var voucher = generateVoucher();
            $("#voucherCode").val(voucher);
            $("#cpnCode").html(voucher);
        });
    });

    function generateVoucher() {
        var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var codeLength = 8;
        var voucher = "";

        for (var i = 0; i < codeLength; i++) {
            voucher += chars.charAt(Math.floor(Math.random() * chars.length));
        }

        return voucher;
    }

    //Store - created new voucher
    $('#submitBtn').click(function(e) {

        var form_data = new FormData();

        form_data.append("voucher_type", $("[name='voucherType']:checked").val());
        form_data.append("campaign_name", $('#campaignName').val());
        form_data.append("discount_type", $("[name='discountType']:checked").val());
        form_data.append("min_spend", $('#minSpend').val());
        form_data.append("capped_amount", $('#cappedAmount').val());
        form_data.append("voucher_code", $('#voucherCode').val());
        form_data.append("voucher_quantity", $('#voucherQuantity').val());
        form_data.append("start_date", $('#startDate').val());
        form_data.append("end_date", $('#endDate').val());
        form_data.append("voucher_status", $('input[name="voucher_status"]').is(':checked') == true ? 1 : 0);


        $.ajax({
            url: "<?php echo site_url('voucher/store') ?>",
            data: form_data,
            encrypt: "",
            cache: false,
            contentType: false,
            processData: false,
            method: "POST",
            success: function(data) {
                console.log("success:",data);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'VOUCHER CREATED',
                    showConfirmButton: false,
                    timer: 2000,
                })
                // window.setTimeout(function() {
                //     window.location.href = "<?php echo site_url('voucher') ?>";
                // }, 1000);
            }
        });
    });

    var cpnBtn = document.getElementById("cpnBtn");
    var cpnCode = document.getElementById("cpnCode");

    cpnBtn.onclick = function() {
        navigator.clipboard.writeText(cpnCode.innerHTML);
        cpnBtn.innerHTML = "DONE";
        setTimeout(function() {
            cpnBtn.innerHTML = "APPLY";
        }, 3000);
    }

    // var radioBtn = $("[name='voucherType']:checked").val();
    $("#discountVoucher").click(function(e) {
        $('.voucher-image').children().remove();

        $('.voucher-image').html(
            "<img class='logo' src='https://img.icons8.com/glyph-neue/64/null/discount-ticket.png' />",
        );

        $('.discount-type').html(
            "PRODUCT",
        );
    });

    $("#shippingVoucher").click(function(e) {
        $('.voucher-image').children().remove();

        $('.voucher-image').html(
            "<img class='logo' src='https://img.icons8.com/material-rounded/96/null/truck--v1.png' />",
        );

        $('.discount-type').html(
            "SHIPPING",
        );
    });

    //Key up function - Display while texting
    $('#voucherCode').keyup(function() {
        $('#cpnCode').html($('#voucherCode').val())
    });

    $('#minSpend').keyup(function() {
        $('.min-spend').html("(Min.spend MYR" + $('#minSpend').val() + ")");
    });

    $('#cappedAmount').keyup(function() {
        $('.discount-value').html("MYR" + $('#cappedAmount').val() + " OFF");
    });

    $('#minSpend').keyup(function() {
        $('.tnc-min-spend').html($('#minSpend').val());
    });

    $('#cappedAmount').keyup(function() {
        $('.tnc-discount-value').html($('#cappedAmount').val());
    });

    $('#endDate').on("keyup change", function() {
        var end_date = $('#endDate').val();

        var copy_end_date = end_date.replace('T', ' ');
        $('.expired-date').html(copy_end_date);

    });

</script>

</html>