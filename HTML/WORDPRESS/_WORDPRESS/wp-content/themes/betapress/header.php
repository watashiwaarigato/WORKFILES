<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php if ( is_single() ) { single_post_title('', true); } else { bloginfo('name'); echo " - "; bloginfo('description'); } ?>" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
		<meta name="author" content="freehtml5.co" />

		<!-- Facebook and Twitter integration -->
		<!--<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />-->

		<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
		
		<!-- Css -->
		<?php wp_head(); ?>
	</head>
	<body>

		<div class="fh5co-loader"></div>

		<div id="page">
			<nav class="fh5co-nav" role="navigation">
				<div class="top">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-right">
								<p class="num">Call: +01 123 456 7890</p>
								<ul class="fh5co-social">
									<li><a href="#"><i class="icon-twitter"></i></a></li>
									<li><a href="#"><i class="icon-dribbble"></i></a></li>
									<li><a href="#"><i class="icon-github"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="top-menu">
					<div class="container">
						<div class="row">
							<div class="col-xs-2">
								<div id="fh5co-logo"><a href="index.html">Stamina<span>.</span></a></div>
							</div>
							<div class="col-xs-10 text-right menu-1">
								<?php wp_nav_menu( array(
									'theme_location' => 'header-menu',
									'menu_class' => '0',
									'container' => false,
								)); ?>
								<!--<ul>
									<li class="active"><a href="index.html">Home</a></li>
									<li><a href="gallery.html">Gallery</a></li>
									<li><a href="about.html">Trainer</a></li>
									<li><a href="pricing.html">Pricing</a></li>
									<li class="has-dropdown">
										<a href="blog.html">Blog</a>
										<ul class="dropdown">
											<li><a href="#">Web Design</a></li>
											<li><a href="#">eCommerce</a></li>
											<li><a href="#">Branding</a></li>
											<li><a href="#">API</a></li>
										</ul>
									</li>
									<li><a href="contact.html">Contact</a></li>
								</ul>-->
							</div>
						</div>

					</div>
				</div>
			</nav>
			<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(<?php echo get_bloginfo('template_directory'); ?>/images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<div class="display-t">
								<div class="display-tc animate-box" data-animate-effect="fadeIn">
									<h1><?php echo get_bloginfo( 'name' ); ?></h1>
									<h2><?php echo get_bloginfo( 'description' ); ?></h2>
									<p><a href="https://vimeo.com/channels/staffpicks/93951774" class="btn btn-primary popup-vimeo">Watch Our Video</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>