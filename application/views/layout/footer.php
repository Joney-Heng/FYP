
		<style>
			footer {
				background-color: #4D4D33;
			}
			footer .content {
				display: flex;
				margin: 0 auto;
				padding: 60px 50px;
				max-width: 1560px;
			}
			footer .content .contact {
				display: flex;
				flex-grow: 3;
				flex-direction: column;
				max-width: 350px;
			}
			footer .content .contact .title {
                display:flex;
                justify-content: flex-start;
                text-align: left;
				margin-bottom: 10px;
				margin-right: 41px;
				font-size: 28px;
				font-weight: 700;
				line-height: 32px;
				color: #CC9900;
			}
			footer .content .contact .sub-title {
				margin-bottom: 10px;
				font-size: 14px;
				color: #CC9900;
			}
			footer .content .contact .form-group {
				margin-bottom: 30px;
			}
			footer .content .contact .form-group .form-control {
				background-color: #fff;
			}
			footer .content .contact .follow-us {
				display: flex;
				flex-direction: column;
			}
			footer .content .contact .follow-us .social-media a {
				margin-right: 22px;
			}
			footer .content .contact .follow-us .social-media a img {
				width: 45px;
			}
			footer .content .space {
				flex-grow: 3;
				flex-shrink: 1;
			}
			footer .content .about,
			footer .content .help-center,
			footer .content .payment {
				display: flex;
				flex-direction: column;
				flex: 2;
				flex-shrink: 0;
				margin-left: 20px;
				min-width: 186px;
			}
			footer .content .about .title,
			footer .content .help-center .title,
			footer .content .payment .title {
                display: flex;
                justify-content: flex-start;
				margin-bottom: 10px;
				font-size: 18px;
				font-weight: 700;
				color: #CC9900;
			}
			footer .content .about a,
			footer .content .help-center a {
				margin-bottom: 10px;
				color: #cccc00;
				text-decoration: none;
			}
			footer .content .payment {
				max-width: 186px;
			}
			footer .content .payment .payment-with {
				min-height: 200px;
				flex-grow: 1;
			}
			footer .content .payment .payment-with img {
				width: 80px;
				height: 56px;
				margin: 0 10px 10px 0;
			}
			footer .content .payment .payment-with img:nth-child(2n) {
				margin-right: 0;
			}
			footer .content .desktop-container {
				display: flex;
				flex-direction: column;
				align-items: flex-end;
				margin-top: 15px;
			}
			footer .content .desktop-container img {
				width: 120px;
				height: 59px;
			}
			footer .content .desktop-container .copyright {
				margin-top: 15px;
				width: 350px;
				font-size: 12px;
				text-align: center;
				color: #4D4D33;
			}
			footer .content .mobile-container {
				display: none;
			}
			footer .content .more-info {
				display: none;
			}
			body.mobile footer .content {
				flex-wrap: wrap;
				padding: 30px;
			}
			body.mobile footer .content .about,
			body.mobile footer .content .help-center,
			body.mobile footer .content .payment {
				align-items: center;
				margin-left: 0;
			}
			body.mobile footer .content .contact {
				align-items: center;
				text-align: center;
				order: 2;
				width: 100%;
				max-width: none;
			}
			body.mobile footer .content .contact .title {
				margin-right: 0;
			}
			body.mobile footer .content .contact .form-group {
				margin-bottom: 0;
			}
			body.mobile footer .content .contact .follow-us {
				margin-top: 30px;
			}
			body.mobile footer .content .contact .follow-us .social-media {
				margin-bottom: 25px;
			}
			body.mobile footer .content .space {
				display: none;
			}
			body.mobile footer .content .payment {
				order: 1;
				flex: 0 1 auto;
				width: 100%;
				min-width: auto;
				max-width: none;
			}
			body.mobile footer .content .payment .payment-with {
				display: flex;
				justify-content: center;
				flex-wrap: wrap;
				margin-bottom: 25px;
				margin-right: -10px;
				min-height: 0;
			}
			body.mobile footer .content .payment .payment-with img {
				margin: 0 10px 10px 0;
			}
			body.mobile footer .content .payment .desktop-container {
				display: none;
			}
			body.mobile footer .content .about {
				order: 3;
			}
			body.mobile footer .content .help-center {
				order: 4;
			}
			body.mobile footer .content .mobile-container {
				order: 7;
				display: flex;
				flex-direction: column;
				align-items: center;
				margin-top: 15px;
				width: 100%;
			}
			body.mobile footer .content .mobile-container img {
				width: 120px;
				height: 59px;
			}
			body.mobile footer .content .mobile-container .copyright {
				margin-top: 25px;
				font-size: 12px;
				text-align: center;
				color: #4D4D33;
				width: 270px;
			}
			body.mobile footer .content .more-info {
				order: 6;
				display: flex;
				flex-direction: column;
				align-items: center;
				margin-bottom: 15px;
				width: 100%;
			}
			body.mobile footer .content .more-info span {
				margin-bottom: 10px;
				font-size: 18px;
				font-weight: 700;
				color: #86b300;
			}
			body.mobile footer .content .more-info img {
				width: 20px;
			}
		</style>

	<footer>
		<div class="content">
			<div class="contact">
				<span class="title">CONNECT WITH US</span>
				<span class="sub-title"
					>Get free shipping, discount vouchers and members only products when
					you're in!</span
				>
				<div class="follow-us">
					<span class="title">FOLLOW US</span>
					<div class="social-media">
						<a href="#" target="_blank"
							><img src="https://img.icons8.com/color/48/null/facebook-new.png"/>
						</a>
						<a href="#" target="_blank"
							><img src="https://img.icons8.com/fluency/48/null/instagram-new.png"/>
						</a>
					</div>
				</div>
			</div>
			<div class="space"></div>
			<div class="about">
				<span class="title">CORPORATE</span>
				<a href="#" target="_blank"
					>Our Story</a
				>
				<a
					href="#"
					target="_blank"
					>Our Philosophy</a
				>
				<a href="#" target="_blank"
					>Our Products</a
				>
				<!-- <a href="#">Blog</a> -->
			</div>
			<div class="help-center">
				<span class="title">HELP CENTER</span>

				<a href="#">Refund Policy</a>
				<a href="#">Privacy Policy</a>
				<a href="#">Shipping Policy</a>
				<a href="#">Terms & Conditions</a>
				<a href="#">Contact Us</a>

				<!-- <a href="#">Customer Services</a> -->
				<!-- <a href="#">Contact Us</a> -->
				<!-- <a href="#">Delivery</a> -->
				<!-- <a href="#">Track My Order</a> -->
				<!-- <a href="#">FAQs</a> -->
			</div>
			<div class="payment">
				<span class="title">PAY SECURELY WITH</span>
				<div class="payment-with">
					<img src="https://img.icons8.com/fluency/80/null/paypal.png"/>
					<img src="<?php echo base_url("images/paypal-icon.png")?>">
				</div>

				<div class="desktop-container">
					<img src='<?php echo base_url()?>images/store-logo.png'/>
					<span class="copyright"
						>© 2022 Jolles' E-Store Sdn Bhd (123456789-V) AJL 932403</span
					>
				</div>
			</div>

			<div class="more-info">
				<span>MORE INFO</span>
				<img src="assets/market/icons/arrow-down.svg" />
			</div>
		</div>
	</footer>
