<?php
	include("lang.php");

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
    	<script src="admin/template/default/assets/js/jquery.min.js"></script>

    	<?php if($lang_now == 'ru'){ ?>
    		<style>
    			.works .app .option span{
    				max-width: 260px;
    			}
    		</style>
    	<?php } ?>
		
	</head>
	
    <body>

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
		    				<li class="nav-item active" style="width: 174px;text-align: center;">
		    					<a class="nav-link" href="/"><?=$lang[$lang_now]['menu_item1']?><span class="sr-only">(current)</span></a>
		    				</li>
		    				<li class="nav-item" style="width: 174px;text-align: center;">
		    					<a class="nav-link" href="/blog.php?lang=<?php echo $lang_now; ?>"><?=$lang[$lang_now]['menu_item2']?></a>
		    				</li>
		    				<li class="nav-item">
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

    	<section class="slider" style="height: 700px;position: relative;">
    		<div class="slider-text" data-aos="fade-in" data-aos-delay="50" data-aos-duration="3000">
    			<img src="admin/images/logo.webp" style="width: 79px;height: 90px;object-fit: cover;object-position: 50% 50%;margin-bottom: 30px;">
    			<h1 style="font-family: montserrat,sans-serif;font-size: 50px;color: white;font-weight: bold;margin-bottom: 20px;"><?=$lang[$lang_now]['slider_title']?></h1>
    			<h6 style="font-family: montserrat,sans-serif;font-size: 16px;color: white;font-weight: bold;"><?=$lang[$lang_now]['slider_subtitle']?></h6>
    		</div>
    		<div class="slider-cube" data-aos="fade-left"  data-aos-delay="50" data-aos-duration="3000" style="font-family: montserrat,sans-serif;color: white;font-size: 16px;">
    			<span>AR</span>
    			<svg data-bbox="2 2 28 28" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" data-type="shape" style="width: 40px;height: 40px;fill: white;margin-bottom: 2px;">
    				<g>
    					<path d="M26.57 20.82a1 1 0 1 0-1.14-1.64L17 25.08v-8.51l8-4.8V16a1 1 0 0 0 2 0v-6a.93.93 0 0 0 0-.29v-.07a.92.92 0 0 0-.13-.24l-.05-.07a.82.82 0 0 0-.25-.2l-10-5a1 1 0 0 0-.9 0l-6 3a1 1 0 1 0 .9 1.78L16 6.12l7.92 4L16 14.83 6.51 9.14A1 1 0 0 0 5 10v10a1 1 0 0 0 .43.82l10 7h.05l.06.05h.05a.89.89 0 0 0 .82 0h.05l.06-.05h.05zM7 11.77l8 4.8v8.51l-8-5.6z"/>
    					<path d="M3 9a1 1 0 0 0 1-1V4h4a1 1 0 0 0 0-2H3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"/>
    					<path d="M29 2h-5a1 1 0 0 0 0 2h4v4a1 1 0 0 0 2 0V3a1 1 0 0 0-1-1z"/>
    					<path d="M29 23a1 1 0 0 0-1 1v4h-4a1 1 0 0 0 0 2h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1z"/>
    					<path d="M8 28H4v-4a1 1 0 0 0-2 0v5a1 1 0 0 0 1 1h5a1 1 0 0 0 0-2z"/>
    				</g>
    			</svg>
    			<span> based</span>
    		</div>
	    	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	    		<ol class="carousel-indicators">
	    			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	    		</ol>
	    		<div class="carousel-inner">
	    			<div class="carousel-item active">
	    				<img class="d-block w-100" src="admin/images/01.webp" alt="First slide" style="height: 700px;object-fit: cover;">
	    			</div>
	    			<div class="carousel-item">
	    				<img class="d-block w-100" src="admin/images/02.webp" alt="Second slide" style="height: 700px;object-fit: cover;">
	    			</div>
	    			<div class="carousel-item">
	    				<img class="d-block w-100" src="admin/images/03.webp" alt="Third slide" style="height: 700px;object-fit: cover;">
	    			</div>
	    		</div>
	    		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    			<span class="sr-only">Previous</span>
	    		</a>
	    		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    			<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    			<span class="sr-only">Next</span>
	    		</a>
	    	</div>
    	</section>

    	<section class="program-type">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-6 col-sm-12 text-center program-block program-block-mobile-coach" data-aos="fade-in" data-aos-delay="50" data-aos-duration="3000">
    					<img src="admin/images/AR_Orientiring_Pro_SET_[512].png" alt="Coach App" class="logo">
    					<h2 style=""><?=$lang[$lang_now]['coach_title']?></h2>
    					<div class="row">
    						<div class="col-md-6 col-sm-6 program-block-mobile">
    							<img src="admin/images/coach_01.svg" alt="Coach App Type One" class="logo-type logo-type-left">
    							<span class="span-left"><?=$lang[$lang_now]['coach_subtitle1']?></span>
    						</div>
    						<div class="col-md-6 col-sm-6 program-block-mobile">
    							<img src="admin/images/coach_02.svg" alt="Coach App Type Two" class="logo-type logo-type-right">
    							<span class="span-right"><?=$lang[$lang_now]['coach_subtitle2']?></span>
    						</div>
    					</div>
    					<div class="row">
    						<div class="btn-block" data-aos="fade-right"  data-aos-delay="150" data-aos-duration="3000">
    							<a href="https://www.apple.com/ru/app-store/"><img src="admin/images/app-store.webp" class="download-app-store" alt="App Store Download"></a>
    							<a href="https://play.google.com/store"><img src="admin/images/google-play.webp" class="download-google-play" alt="Google Play Download"></a>
    						</div>
    					</div>
    				</div>
    				<div class="col-md-6 col-sm-12 text-center program-block program-block-mobile-athlete" data-aos="fade-in" data-aos-delay="50" data-aos-duration="3000">
    					<img src="admin/images/AR_Orientiring_Pro_RUN_[512].png" alt="Athlete App" class="logo">
    					<h2><?=$lang[$lang_now]['athlete_title']?></h2>
    					<div class="row">
    						<div class="col-md-6 col-sm-6 program-block-mobile">
    							<img src="admin/images/athlete_01.svg" alt="Athlete App Type Two" class="logo-type logo-type-left">
    							<span class="span-left"><?=$lang[$lang_now]['athlete_subtitle1']?></span>
    						</div>
    						<div class="col-md-6 col-sm-6 program-block-mobile">
    							<img src="admin/images/athlete_02.svg" alt="Athlete App Type Two" class="logo-type logo-type-right">
    							<span class="span-right"><?=$lang[$lang_now]['athlete_subtitle2']?></span>
    						</div>
    					</div>
    					<div class="row">
    						<div class="btn-block" data-aos="fade-right"  data-aos-delay="150" data-aos-duration="3000">
    							<a href="https://www.apple.com/ru/app-store/"><img src="admin/images/app-store.webp" class="download-app-store" alt="App Store Download"></a>
    							<a href="https://play.google.com/store"><img src="admin/images/google-play.webp" class="download-google-play" alt="Google Play Download"></a>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>

    	<section class="works">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-12 col-sm-12">
    					<h2 data-aos="fade-in" data-aos-delay="50" data-aos-duration="3000"><?=$lang[$lang_now]['how_title']?></h2>
    					<div class="line"></div>
    					<div class="phones-block">
    						<img src="admin/images/phone2.webp" alt="App in phone one" class="phone-one" data-aos="fade-in" data-aos-delay="50" data-aos-duration="3000">
    						<img src="admin/images/phone1.webp" alt="App in phone two" class="phone-two" data-aos="fade-in" data-aos-delay="50" data-aos-duration="3000">
    					</div>
    				</div>
    			</div>
    			<div class="row" style="position: relative;bottom: 200px;z-index: 999;" data-aos="fade-in" data-aos-delay="50" data-aos-duration="3000">
    				<div class="col-md-6 col-sm-12">
    					<div class="app justify-content-center">
    						<div class="name">
    							<img src="admin/images/AR_Orientiring_Pro_SET_[512].png" alt="Coach App" class="logo">
    							<h2 data-aos="fade-in" data-aos-delay="50" data-aos-duration="3000"><?=$lang[$lang_now]['coachapp_title']?></h2>
    							<div class="btn-block" data-aos="fade-right"  data-aos-delay="150" data-aos-duration="3000">
    								<a href="https://www.apple.com/ru/app-store/"><img src="admin/images/app-store.webp" class="download-app-store" alt="App Store Download"></a>
    								<a href="https://play.google.com/store"><img src="admin/images/google-play.webp" class="download-google-play" alt="Google Play Download"></a>
    							</div>
    						</div>
    						<div class="option">
    							<h2><?=$lang[$lang_now]['coachapp_subtitle1']?></h2>
    							<span><?=$lang[$lang_now]['coachapp_subtitle1_span']?></span>
    						</div>
    						<div class="option">
    							<h2><?=$lang[$lang_now]['coachapp_subtitle2']?></h2>
    							<span><?=$lang[$lang_now]['coachapp_subtitle2_span']?></span>
    						</div>
    						<div class="option">
    							<h2><?=$lang[$lang_now]['coachapp_subtitle3']?></h2>
    							<span><?=$lang[$lang_now]['coachapp_subtitle3_span']?></span>
    						</div>
    						<div class="option">
    							<h2><?=$lang[$lang_now]['coachapp_subtitle4']?></h2>
    							<span><?=$lang[$lang_now]['coachapp_subtitle4_span']?></span>
    						</div>
    						<div class="youtube-block" data-aos="fade-right"  data-aos-delay="50" data-aos-duration="3000">
    							<img src="admin/images/youtube1.webp" class="youtube-img" alt="Yotube Video One">
    							<a href="https://www.youtube.com/watch?v=I-w5lQY9RZE&ab_channel=OrienteeringPro">
    								<img src="admin/images/watch.webp" class="watch-img" alt="Yotube Video One Watch">
    							</a>
    						</div>
    						<div class="btn-block" data-aos="fade-right"  data-aos-delay="150" data-aos-duration="3000">
    							<a href="https://www.apple.com/ru/app-store/"><img src="admin/images/app-store.webp" class="download-app-store" alt="App Store Download"></a>
    							<a href="https://play.google.com/store"><img src="admin/images/google-play.webp" class="download-google-play" alt="Google Play Download"></a>
    						</div>
    					</div>
    				</div>
    				<div class="col-md-6 col-sm-12">
    					<div class="app justify-content-center">
    						<div class="name">
    							<img src="admin/images/AR_Orientiring_Pro_RUN_[512].png" alt="Athlete App" class="logo">
    							<h2 data-aos="fade-in" data-aos-delay="50" data-aos-duration="3000"><?=$lang[$lang_now]['athleteapp_title']?></h2>
    							<div class="btn-block" data-aos="fade-right"  data-aos-delay="150" data-aos-duration="3000">
    								<a href="https://www.apple.com/ru/app-store/"><img src="admin/images/app-store.webp" class="download-app-store" alt="App Store Download"></a>
    								<a href="https://play.google.com/store"><img src="admin/images/google-play.webp" class="download-google-play" alt="Google Play Download"></a>
    							</div>
    						</div>
    						<div class="option">
    							<h2><?=$lang[$lang_now]['athleteapp_subtitle1']?></h2>
    							<span><?=$lang[$lang_now]['athleteapp_subtitle1_span']?></span>
    						</div>
    						<div class="option">
    							<h2><?=$lang[$lang_now]['athleteapp_subtitle2']?></h2>
    							<span><?=$lang[$lang_now]['athleteapp_subtitle2_span']?></span>
    						</div>
    						<div class="option">
    							<h2><?=$lang[$lang_now]['athleteapp_subtitle3']?></h2>
    							<span><?=$lang[$lang_now]['athleteapp_subtitle3_span']?></span>
    						</div>
    						<div class="option">
    							<h2><?=$lang[$lang_now]['athleteapp_subtitle4']?></h2>
    							<span><?=$lang[$lang_now]['athleteapp_subtitle4_span']?></span>
    						</div>
    						<div class="youtube-block" data-aos="fade-left"  data-aos-delay="50" data-aos-duration="3000">
    							<img src="admin/images/youtube2.webp" class="youtube-img" alt="Yotube Video Two">
    							<a href="https://www.youtube.com/watch?v=UW8dXc57C2s&ab_channel=OrienteeringPro">
    								<img src="admin/images/watch.webp" class="watch-img" alt="Yotube Video Two Watch">
    							</a>
    						</div>
    						<div class="btn-block" data-aos="fade-left"  data-aos-delay="150" data-aos-duration="3000">
    							<a href="https://www.apple.com/ru/app-store/"><img src="admin/images/app-store.webp" class="download-app-store" alt="App Store Download"></a>
    							<a href="https://play.google.com/store"><img src="admin/images/google-play.webp" class="download-google-play" alt="Google Play Download"></a>
    						</div>
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

		<script src="admin/template/plugins/toastr.min.js"></script>

    	<script src="admin/template/default/assets/js/bootstrap.bundle.min.js"></script>
        <script src="admin/template/default/assets/js/waves.js"></script>
        <script src="admin/template/default/assets/js/feather.min.js"></script>
        <script src="admin/template/default/assets/js/simplebar.min.js"></script>
		<script src="js\fm.revealator.jquery.min.js"></script>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

		<script>
			AOS.init();

			$(".program-block").mouseover(function(){
				$(".program-block").css("transition","all 600ms!important");
				$(".program-block").css("transform","translateX(0)translateY(0)scaleX(1.1)scaleY(1.1)rotate(0deg)skewX(0deg)skewY(0deg)!important");
				$(".program-block").css("transition","all 0.4s ease-in-out 0s");
			});

			console.log($(window).width());

			if($(window).width() <= 480){
				$(".works .app .youtube-block").attr("data-aos","fade-right");
				$(".works .app .btn-block").attr("data-aos","fade-right");
			}
		</script>
        
	</body>
	
</html>