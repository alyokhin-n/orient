<?php
	include("lang.php");
	include("admin/config/dbconnect_site.php");

	if($_GET['lang'] != ''){
		$lang_now = $_GET['lang'];
	}else{
		$lang_now = 'en';
	}

	if($lang_now == 'en'){
		$en_style = "background: rgb(243,243,243);";
		$ru_style = "";
	}else{
		$en_style = "";
		$ru_style = "background: rgb(243,243,243);";
	}

	if ($_SESSION['client'] == "")
	{
		header('Location: login.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="uk">
	
    <head>
        <meta charset="utf-8" />
        <title>DOWNLOADS | OrienteeringPro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		
        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="template/default/assets/images/favicon.ico"> -->
        <link rel="icon" sizes="192x192" href="admin/images/417db9_fb249605780b4e528723e28b4fb4943c_mv2.png">
        <link rel="shortcut icon" href="admin/images/417db9_fb249605780b4e528723e28b4fb4943c_mv2.png" type="image/png">
        <link rel="apple-touch-icon" href="admin/images/417db9_fb249605780b4e528723e28b4fb4943c_mv2.png" type="image/png">
		
        <!-- App css -->
        <link href="admin/template/default/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="admin/template/default/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="admin/template/plugins/toastr.min.css" rel="stylesheet"/>
        <link rel="preload" src="admin/images/01.webp" as="image"/>
        <link rel="preload" src="admin/images/02.webp" as="image"/>
        <link rel="preload" src="admin/images/03.webp" as="image"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css\fm.revealator.jquery.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- <link href="admin/template/default/assets/css/app.min.css" rel="stylesheet" type="text/css" /> -->

    	<script src="admin/template/default/assets/js/jquery.min.js"></script>
    	<script src="admin/template/plugins/toastr.min.js"></script>

    	<?php if($lang_now == 'ru'){ ?>
    		<style>
    			.works .app .option span{
    				max-width: 260px;
    			}
    		</style>
    	<?php } ?>
		
	</head>
	
    <body>

    	<?php if($_SESSION['message'] == 1){ ?>
    		<script>
    			Command: toastr["success"]("Successfully authorized.")

    			toastr.options = {
    				"closeButton": false,
    				"debug": false,
    				"newestOnTop": false,
    				"progressBar": false,
    				"positionClass": "toast-top-right",
    				"preventDuplicates": false,
    				"onclick": null,
    				"showDuration": "300",
    				"hideDuration": "1000",
    				"timeOut": "1000",
    				"extendedTimeOut": "1000",
    				"showEasing": "swing",
    				"hideEasing": "linear",
    				"showMethod": "fadeIn",
    				"hideMethod": "fadeOut"
    			}
    		</script>
    	<?php $_SESSION['message'] = 0;} ?>

    	<header class="header">
    		<div class="container">
		    	<nav class="navbar navbar-expand-lg navbar-light">
		    		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="padding-left: 0px;border: none;outline: none;">
		    			<div style="height: 2px;width: 13px;background: rgba(255,96,2);transition: transform .45s cubic-bezier(.9,-.6,.3,1.6),width .2s ease .2s;margin-bottom: 7px;"></div>
		    			<div style="height: 2px;width: 26px;background: rgba(255,96,2);transition: transform .45s cubic-bezier(.9,-.6,.3,1.6),width .2s ease .2s;margin-bottom: 7px;"></div>
		    			<div style="height: 2px;width: 18px;background: rgba(255,96,2);transition: transform .45s cubic-bezier(.9,-.6,.3,1.6),width .2s ease .2s;"></div>
		    		</button>
		    		<ul class="navbar-nav mobile-menu">
		    			<li class="nav-item nav-item-head">
		    				<a class="site-head" href="#">ORIENTEERING.PRO</a>
		    			</li>
		    			<li class="nav-item nav-item-language" style="height: 47px;border-radius: 15px; border: 1px solid rgb(149, 149, 149);display: flex;">
		    				<a class="nav-link" href="/" style="<?php echo $en_style; ?>border-top-left-radius: 15px;border-bottom-left-radius: 15px;padding-top: 11px;padding-left: 15px;padding-right: 15px;">EN</a>
		    				<a class="nav-link" href="/?lang=ru" style="<?php echo $ru_style; ?>border-top-right-radius: 15px;border-bottom-right-radius: 15px;padding-top: 11px;padding-left: 15px;padding-right: 15px;">RU</a>
		    			</li>
		    		</ul>
		    		<div class="collapse navbar-collapse" id="navbarNav">
		    			<ul class="navbar-nav mx-auto">
		    				<li class="nav-item" style="width: 174px;text-align: center;">
		    					<a class="nav-link" href="/"><?=$lang[$lang_now]['menu_item1']?><span class="sr-only">(current)</span></a>
		    				</li>
		    				<li class="nav-item" style="width: 174px;text-align: center;">
		    					<a class="nav-link" href="/blog.php?lang=<?php echo $lang_now; ?>"><?=$lang[$lang_now]['menu_item2']?></a>
		    				</li>
		    				<li class="nav-item active">
		    					<a class="nav-link" href="/login.php?lang=<?php echo $lang_now; ?>"><?=$lang[$lang_now]['menu_item3']?></a>
		    				</li>
		    			</ul>

		    			<ul class="nav navbar-nav navbar-language">
		    				<li class="nav-item language-change" style="height: 47px;border-radius: 15px; border: 1px solid rgb(149, 149, 149);display: flex;">
		                		<a class="nav-link" href="/" style="<?php echo $en_style; ?>border-top-left-radius: 15px;border-bottom-left-radius: 15px;padding-top: 11px;padding-left: 15px;padding-right: 15px;">EN</a>
		                		<a class="nav-link" href="/?lang=ru" style="<?php echo $ru_style; ?>border-top-right-radius: 15px;border-bottom-right-radius: 15px;padding-top: 11px;padding-left: 15px;padding-right: 15px;">RU</a>
		            		</li>
		    			</ul>
		    		</div>
		    	</nav>
	    	</div>
    	</header>

    	<section class="balance">
    		<div style="background: #FFFFFF;">
	    		<div class="container">
	    			<div class="row justify-content-center">
	    				<div class="col-md-6">
	    					<div class="client-info">
	    						<div class="image-block">
		    						<img src="admin/images/Ellipse 6.png" class="avatar">
		    						<h4>Boris 109</h4>
		    					</div>
		    					<div class="my-balance">
		    						<p><img src="admin/images/prism.png" class="icon"> 100</p>
		    						<span>my balance</span>
		    					</div>
		    					<div class="logout-block">
		    						<a class="btn btn-block btn-danger logout" href="?logout=1"><i class="fas fa-sign-out-alt align-self-center menu-icon"></i> Logout</a>
		    					</div>
	    					</div>
	    				</div>
	    			</div>
	    			<div class="row justify-content-center">
	    				<div class="col-md-6">
	    					<h1>Add to balance</h1>
	    					<div class="money">
	    						<div class="option">
	    							<button class="btn btn-block btn-type radio-type" data-eur="7" data-prism="50"><img src="admin/images/prism.png" class="icon">50</button>
	    							<p>€ <span>7</span></p>
	    						</div>
	    						<div class="option">
	    							<button class="btn btn-block btn-type radio-type" data-eur="15" data-prism="100"><img src="admin/images/prism.png" class="icon">100</button>
	    							<p>€ <span>15</span></p>
	    						</div>
	    						<div class="option">
	    							<button class="btn btn-block btn-type radio-type" data-eur="75" data-prism="500"><img src="admin/images/prism.png" class="icon">500</button>
	    							<p>€ <span>75</span></p>
	    						</div>
	    					</div>
	    					<p class="under-text">incl. VAT, other taxes and commissions</p>
	    					<h4>PAYMENT METHOD</h4>
	    					<div class="methods">
	    						<div class="option">
	    							<button class="btn btn-block btn-type radio-method" data-id="applepay"><img src="admin/images/apple.png" class="icon" style="position: relative;bottom: 2px;"> Pay</button>
	    						</div>
	    						<div class="option">
	    							<button id="googlepay" class="btn btn-block btn-type radio-method" data-id="googlepay"><img src="admin/images/google.png" class="icon"> Pay</button>
	    						</div>
	    						<div class="option">
	    							<button class="btn btn-block btn-type radio-method" data-id="cardpay"><img src="admin/images/card.png" class="icon"></button>
	    						</div>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
    		</div>
    		<div class="pay" style="background: #EDF1F4;">
    			<div id="parent_div" class="ticket-border">
    			</div>
    			<div class="container">
    				<div class="row justify-content-center">
    					<div class="col-md-6">
    						<div class="bank-card">
    							<p>num card</p>
    							<input id="ccn" type="tel" class="form-control" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="16" placeholder="xxxx xxxx xxxx xxxx">
    							<div class="info">
	    							<div class="card-date">
	    								<p>Exp date</p>
	    								<input type="text" id="exp" class="form-control" name="expdate" placeholder="MM/YY" minlength="5" maxlength="5">
	    							</div>
	    							<div class="card-cvv">
	    								<p>CVV</p>
	    								<input id="cvv" type="password" class="form-control" name="cvv" placeholder="&#9679;&#9679;&#9679;" minlength="3" maxlength="3">
	    							</div>
    							</div>
    						</div>
    						<button class="btn btn-block pay-btn">Pay</button>
    						<!-- <button class="btn btn-block pay-btn">
    							<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  								Loading...
    						</button> -->
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>

    	<footer class="footer">
    		<p style="margin-bottom: 18px;"><?=$lang[$lang_now]['footer_title']?></p>
    		<div class="social-links" style="margin-bottom: 20px;">
    			<a href="https://t.me/orienteeringpro"><img src="admin/images/telegram.webp" alt="Telegram Icon"></a>
    			<a href="https://www.facebook.com/orienteering.pro.official"><img src="admin/images/facebook.webp" alt="Facebook Icon"></a>
    			<a href="https://twitter.com/OrienteeringPro"><img src="admin/images/twitter.webp" alt="Twitter Icon"></a>
    			<a href="https://www.instagram.com/orienteering.pro/" style="margin-right: 0px;"><img src="admin/images/instagram.webp" alt="Instagram Icon"></a>
    		</div>
    		<p style="margin-bottom: 0px;">© <?php echo date("Y"); ?> ORIENTEERING.PRO</p>
    		<p style="margin-bottom: 0px;"><?=$lang[$lang_now]['footer_subtitle']?></p>
    	</footer>

    	<script src="admin/template/default/assets/js/bootstrap.bundle.min.js"></script>
        <script src="admin/template/default/assets/js/waves.js"></script>
        <script src="admin/template/default/assets/js/feather.min.js"></script>
        <script src="admin/template/default/assets/js/simplebar.min.js"></script>
		<script src="js\fm.revealator.jquery.min.js"></script>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<!-- <script src="js/balance.js"></script> -->
        
		<script type="text/javascript">
			AOS.init();

			$(".program-block").mouseover(function(){
				$(".program-block").css("transition","all 600ms!important");
				$(".program-block").css("transform","translateX(0)translateY(0)scaleX(1.1)scaleY(1.1)rotate(0deg)skewX(0deg)skewY(0deg)!important");
				$(".program-block").css("transition","all 0.4s ease-in-out 0s");
			});

			var expDate = document.getElementById('exp');
			expDate.onkeyup = function (e) {
				if (this.value == this.lastValue) return;
				var caretPosition = this.selectionStart;
				var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
				var parts = [];

				for (var i = 0, len = sanitizedValue.length; i < len; i +=2) { parts.push(sanitizedValue.substring(i, i + 2)); } for (var i=caretPosition - 1; i>= 0; i--) {
					var c = this.value[i];
					if (c < '0' || c> '9') {
						caretPosition--;
					}
				}
				caretPosition += Math.floor(caretPosition / 2);

				this.value = this.lastValue = parts.join('/');
				this.selectionStart = this.selectionEnd = caretPosition;
			}

			function createElement(obj) {
				var div_obj = document.getElementById(obj);

				var span_obj = document.createElement("span");
				span_obj.setAttribute("class", "ticket-shape");

				div_obj.appendChild(span_obj);
			}

			if($(window).width() <= 480){
				for (var i = 0; i <= 15; i++) {
					createElement("parent_div");
				}
			}else{
				for (var i = 0; i <= 100; i++) {
					createElement("parent_div");
				}
			}

			var eur = 0;
			var prism = 0;
			var method = "";

			$('.radio-type').click(function(){
				eur = $(this).attr("data-eur");
				prism = $(this).attr("data-prism");
				$(this).parent().parent().find('.radio-type').removeClass('selected');
				$(this).addClass('selected');
			});
			$('.radio-method').click(function(){
				method = $(this).attr("data-id");
				if(method == 'cardpay'){
					$(".bank-card").show();
				}else{
					$(".bank-card").hide();
				}
				$(this).parent().parent().find('.radio-method').removeClass('selected');
				$(this).addClass('selected');
			});

			$.post( "api/api.php", { type: "get_client_info", client_id: "<?php echo $_SESSION['client']; ?>" })
			.done(function( data ) {
				var string1 = JSON.stringify(data);
				const obj = JSON.parse(string1);

				if(obj[0]["error"] != true){
					$(".image-block .avatar").attr("src", obj[0]["client_avatar"]);
					var balance = 0;
					if(obj[0]["balance"] != '' && obj[0]["balance"] != null){
						balance = obj[0]["balance"];
					}
					$(".my-balance p").html('<img src="admin/images/prism.png" class="icon"> ' + balance);
					$(".image-block h4").html(obj[0]["client_login"]);
				}
			});

			$(".pay-btn").click(function(){
				var number = $("#ccn").val();
				var exp = $("#exp").val();
				var cvv = $("#cvv").val();

				if(eur > 0){
					if(method == 'cardpay'){
						if(number != '' && exp != '' && cvv != ''){
							const date = exp.split("/");
							var month = date[0];
							var year = Number(date[1]) + 2000;

							if(number.length == 16){
								if(month >= 1 && month <= 12){
									if(year >= new Date().getFullYear()){
										$(".pay-btn").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
										$.post( "admin/scripts/stripe.php", { number: number, month: month, year: year, cvv: cvv, eur: eur })
										.done(function( data ) {
											var string1 = JSON.stringify(data);
											const obj = JSON.parse(string1);

											if(obj[0]["error"] == false){
												$.post( "api/api.php", { type: "add_balance", count: prism, client_id: "<?php echo $_SESSION['client']; ?>" })
												.done(function( data ) {
													var string2 = JSON.stringify(data);
													const obj2 = JSON.parse(string2);

													$(".pay-btn").html('Pay');

													if(obj2[0]["error"] != true){
														$(".my-balance p").html('<img src="admin/images/prism.png" class="icon"> ' + obj2[0]["balance"]);
														Command: toastr["success"](obj2[0]["description"])

														toastr.options = {
															"closeButton": false,
															"debug": false,
															"newestOnTop": false,
															"progressBar": false,
															"positionClass": "toast-top-right",
															"preventDuplicates": false,
															"onclick": null,
															"showDuration": "300",
															"hideDuration": "1000",
															"timeOut": "1000",
															"extendedTimeOut": "1000",
															"showEasing": "swing",
															"hideEasing": "linear",
															"showMethod": "fadeIn",
															"hideMethod": "fadeOut"
														}
													}else{
														Command: toastr["error"](obj2[0]["description"])

														toastr.options = {
															"closeButton": false,
															"debug": false,
															"newestOnTop": false,
															"progressBar": false,
															"positionClass": "toast-top-right",
															"preventDuplicates": false,
															"onclick": null,
															"showDuration": "300",
															"hideDuration": "1000",
															"timeOut": "1000",
															"extendedTimeOut": "1000",
															"showEasing": "swing",
															"hideEasing": "linear",
															"showMethod": "fadeIn",
															"hideMethod": "fadeOut"
														}
													}
												});
											}else{
												Command: toastr["error"](obj[0]["description"])

												toastr.options = {
													"closeButton": false,
													"debug": false,
													"newestOnTop": false,
													"progressBar": false,
													"positionClass": "toast-top-right",
													"preventDuplicates": false,
													"onclick": null,
													"showDuration": "300",
													"hideDuration": "1000",
													"timeOut": "1000",
													"extendedTimeOut": "1000",
													"showEasing": "swing",
													"hideEasing": "linear",
													"showMethod": "fadeIn",
													"hideMethod": "fadeOut"
												}
											}
										});
									}else{
										Command: toastr["error"]("Year is incorect.")

										toastr.options = {
											"closeButton": false,
											"debug": false,
											"newestOnTop": false,
											"progressBar": false,
											"positionClass": "toast-top-right",
											"preventDuplicates": false,
											"onclick": null,
											"showDuration": "300",
											"hideDuration": "1000",
											"timeOut": "1000",
											"extendedTimeOut": "1000",
											"showEasing": "swing",
											"hideEasing": "linear",
											"showMethod": "fadeIn",
											"hideMethod": "fadeOut"
										}
									}
								}else{
									Command: toastr["error"]("Month is incorect.")

									toastr.options = {
										"closeButton": false,
										"debug": false,
										"newestOnTop": false,
										"progressBar": false,
										"positionClass": "toast-top-right",
										"preventDuplicates": false,
										"onclick": null,
										"showDuration": "300",
										"hideDuration": "1000",
										"timeOut": "1000",
										"extendedTimeOut": "1000",
										"showEasing": "swing",
										"hideEasing": "linear",
										"showMethod": "fadeIn",
										"hideMethod": "fadeOut"
									}
								}
							}else{
								Command: toastr["error"]("Num card is incorect.")

								toastr.options = {
									"closeButton": false,
									"debug": false,
									"newestOnTop": false,
									"progressBar": false,
									"positionClass": "toast-top-right",
									"preventDuplicates": false,
									"onclick": null,
									"showDuration": "300",
									"hideDuration": "1000",
									"timeOut": "1000",
									"extendedTimeOut": "1000",
									"showEasing": "swing",
									"hideEasing": "linear",
									"showMethod": "fadeIn",
									"hideMethod": "fadeOut"
								}
							}
						}else{
							Command: toastr["error"]("Not all parameters were passed(Num card, Exp date, CVV).")

							toastr.options = {
								"closeButton": false,
								"debug": false,
								"newestOnTop": false,
								"progressBar": false,
								"positionClass": "toast-top-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "1000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							}
						}
					}else{
						Command: toastr["error"]("We are so sorry, Google Pay and Apple Pay are not working now.")

						toastr.options = {
							"closeButton": false,
							"debug": false,
							"newestOnTop": false,
							"progressBar": false,
							"positionClass": "toast-top-right",
							"preventDuplicates": false,
							"onclick": null,
							"showDuration": "300",
							"hideDuration": "1000",
							"timeOut": "1000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut"
						}
					}
				}else{
					Command: toastr["error"]("Please select the number of prisms.")

					toastr.options = {
						"closeButton": false,
						"debug": false,
						"newestOnTop": false,
						"progressBar": false,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "1000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
				}
			});
		</script>

	</body>
	
</html>