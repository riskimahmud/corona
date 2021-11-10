<?php
//error_reporting(1);
// $this->load->view("frontend/header"); 
// $this->load->view("frontend/menu"); 
// $this->load->view("frontend/$page"); 
// $this->load->view("frontend/footer"); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>News | Codrop | Landing Page App Template</title>
	<meta name="description" content="">
	<script src="<?= base_url(); ?>assets_front/themekit/scripts/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets_front/themekit/scripts/main.js"></script>
	<link rel="stylesheet" href="<?= base_url(); ?>assets_front/themekit/css/bootstrap-grid.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets_front/themekit/css/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets_front/themekit/css/glide.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets_front/themekit/css/magnific-popup.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets_front/themekit/css/content-box.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets_front/themekit/css/contact-form.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets_front/themekit/css/media-box.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets_front/themekit/css/social.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets_front/skin.css">
	<link rel="icon" href="<?= base_url(); ?>assets_front/media/favicon.png">
</head>

<body>
	<div id="preloader"></div>
	<nav class="menu-classic menu-fixed menu-transparent menu-one-page" data-menu-anima="fade-bottom" data-scroll-detect="true">
		<div class="container">
			<div class="menu-brand">
				<a href="#">
					<img class="logo-default" src="<?= base_url(); ?>assets_front/media/logo-dark.svg" alt="logo" />
					<img class="logo-retina" src="<?= base_url(); ?>assets_front/media/logo-dark.svg" alt="logo" />
				</a>
			</div>
			<i class="menu-btn"></i>
			<div class="menu-cnt">
				<ul>
					<li>
						<a href="#overview">Covid-19</a>
					</li>
					<li>
						<a href="#preview">Preview</a>
					</li>
					<li>
						<a href="#features">Features</a>
					</li>
					<li>
						<a href="#news">News</a>
					</li>
				</ul>
				<div class="menu-right">
					<ul class="lan-menu">
						<li class="dropdown">
							<a href="#"><img src="<?= base_url(); ?>assets_front/media/en.png" />EN </a>
							<ul>
								<li><a href="#"><img src="<?= base_url(); ?>assets_front/media/it.png" />IT</a></li>
								<li><a href="#"><img src="<?= base_url(); ?>assets_front/media/es.png" />ES</a></li>
							</ul>
						</li>
					</ul>
					<div class="menu-custom-area">
						<a class="btn btn-xs btn-border btn-circle" href="#">Sign up</a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</nav>
	<main>
		<section class="section-base section-full-width-right section-bottom-layer section-bottom-layer-color section-color">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<hr class="space-lg hidden-sm" />
						<hr class="space-sm" />
						<h1>
							Pantauan Covid-19 <br />Kota Gorontalo
						</h1>
						<p>
							Pastikan anda selalu mematuhi protoko kesehatan.
						</p>
						<hr class="space space-40" />
						<a href="#overview" class="btn btn-sm btn-circle btn-border text-bold shadow-1 full-width-sm">Selengkapnya</a><span class="space"></span>
						<!-- <a class="btn-store" href="#"><img src="<?= base_url(); ?>assets_front/media/store-google.png" /></a>
						<a class="btn-store" href="#"><img src="<?= base_url(); ?>assets_front/media/store-apple.png" /></a> -->
						<hr class="space-lg" />
					</div>
					<div class="col-lg-6 align-right hidden-desktop">
						<img class="margin-23 width-min-900" src="<?= base_url(); ?>assets_front/img/undraw_empty_street_sfxm.svg" alt="Alternate Text" />
					</div>
				</div>
			</div>
		</section>
		<section id="overview" class="section-base section-top-overflow">
			<div class="container">
				<div class="grid-list" data-columns="4" data-columns-md="2" data-columns-xs="1">
					<div class="grid-box">
						<div class="grid-item">
							<div class="cnt-box cnt-box-top-icon boxed">
								<i class="im-business-mens"></i>
								<div class="caption">
									<p>200</p>
									<span class="text-error">Jumlah Kasus</span>
								</div>
							</div>
						</div>
						<div class="grid-item">
							<div class="cnt-box cnt-box-top-icon boxed">
								<i class="im-hospital"></i>
								<div class="caption">
									<p>100</p>
									<span>Dirawat</span>
								</div>
							</div>
						</div>
						<div class="grid-item">
							<div class="cnt-box cnt-box-top-icon boxed">
								<i class="im-ambulance" style="color: red;"></i>
								<div class="caption">
									<p>100</p>
									<span>Meninggal</span>
								</div>
							</div>
						</div>
						<div class="grid-item">
							<div class="cnt-box cnt-box-top-icon boxed">
								<i class="im-smile" style="color:green;"></i>
								<div class="caption">
									<p>1000</p>
									<span>Sembuh</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr class="space-lg" />
				<div class="row">
					<div class="col-lg-6">
						<div class="grid-list" data-columns="2" data-columns-lg="1" data-columns-md="2" data-columns-sm="1">
							<div class="grid-box">
								<div class="grid-item">
									<a href="#" class="media-box media-box-half">
										<img src="http://via.placeholder.com/600x650" alt="">
										<div class="caption">
											<h2>Jessica Adams Exibition</h2>
											<div class="extra-field">Technology</div>
											<p>
												Lorem ipsum dolore incididunto pertinole adio.
											</p>
										</div>
									</a>
								</div>
								<div class="grid-item">
									<a href="#" class="media-box media-box-half">
										<img src="http://via.placeholder.com/600x650" alt="">
										<div class="caption">
											<h2>How to change your business mind</h2>
											<div class="extra-field">Business</div>
											<p>
												Lorem ipsum dolore mio consectetur adio pertinole.
											</p>
										</div>
									</a>
								</div>
								<div class="grid-item">
									<a href="#" class="media-box media-box-half">
										<img src="http://via.placeholder.com/600x650" alt="">
										<div class="caption">
											<h2>Jessica Adams Exibition</h2>
											<div class="extra-field">Technology</div>
											<p>
												Lorem ipsum dolore conseididunto pertine.
											</p>
										</div>
									</a>
								</div>
								<div class="grid-item">
									<a href="#" class="media-box media-box-half">
										<img src="http://via.placeholder.com/600x650" alt="">
										<div class="caption">
											<h2>How to change your business mind</h2>
											<div class="extra-field">Business</div>
											<p>
												Lorem ipsum dolore consectetur pertinole.
											</p>
										</div>
									</a>
								</div>
							</div>
							<div class="list-pagination">
								<ul class="pagination" data-page-items-lg="1" data-page-items="2" data-pagination-anima="fade-left"></ul>
							</div>
						</div>
					</div>
					<div class="col-lg-6 order-md-first">
						<h2>News from all over <br />the world for all main topics.</h2>
						<p>
							Lorem ipsum dolor sit ametno sea takimata sanctus est Lorem ipsum dolor sit amete.
							Ut enim ad minim veniam, quis nostrud exercitation ullamco sea takimata sanctus eslaboriso.
							Aipsum dolor sit amete sanctus artequis nostrud exercitation ullamco sea tassa.
						</p>
						<a href="#" class="btn btn-sm btn-border btn-circle">Open the app</a>
						<hr class="space-sm visible-md" />
					</div>
				</div>
			</div>
		</section>
		<section class="section-base section-color section-bottom-layer section-full-width-left">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<img class="margin-23 width-min-835" src="<?= base_url(); ?>assets_front/media/news/news-2.svg" alt="Alternate Text" />
					</div>
					<div class="col-lg-6">
						<h2>
							Choose one subscription <br />and change in a later time.
						</h2>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboriso.
						</p>
						<hr class="space-sm" />
						<ul class="accordion-list">
							<li>
								<a href="#">In what countries is the app available and in what not?</a>
								<div class="content">
									<p>
										Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
										Utenim ad minim veniam quis nostrud exercitation ullamco laboris.
									</p>
								</div>
							</li>
							<li>
								<a href="#">
									When I book a room can I cancel the reservation in a late time?
								</a>
								<div class="content">
									<p>
										Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
										Utenim ad minim veniam quis nostrud exercitation ullamco laboris.
									</p>
								</div>
							</li>
							<li>
								<a href="#">Where can I contact the support team?</a>
								<div class="content">
									<p>
										Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
										Utenim ad minim veniam quis nostrud exercitation ullamco laboris.
									</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section id="preview" class="section-base">
			<div class="container">
				<h2 class="align-center">One app for all your world news.</h2>
				<p class="align-center width-650">
					Lorem ipsum dolor sit amet no sea takimata sanctus est Lorem ipsum dolor sit amete
					sare nostrud exercitation ullamco sea takiquis nostrud exercitatio.
				</p>
				<hr class="space" />
				<ul class="slider" data-options="type:carousel,perView:4,perViewSm:2,perViewXs:1,gap:15,nav:true,controls:out,autoplay:30000">
					<li>
						<img src="<?= base_url(); ?>assets_front/media/phone-screen-14.png" alt="">
					</li>
					<li>
						<img src="<?= base_url(); ?>assets_front/media/phone-screen-2.png" alt="">
					</li>
					<li>
						<img src="<?= base_url(); ?>assets_front/media/phone-screen-5.png" alt="">
					</li>
					<li>
						<img src="<?= base_url(); ?>assets_front/media/phone-screen-1.png" alt="">
					</li>
					<li>
						<img src="<?= base_url(); ?>assets_front/media/phone-screen-4.png" alt="">
					</li>
					<li>
						<img src="<?= base_url(); ?>assets_front/media/phone-screen-11.png" alt="">
					</li>
				</ul>
			</div>
		</section>
		<section id="features" class="section-base section-color">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<h2>The most features rich app on the market.</h2>
						<p>
							Lorem ipsum dolor sit amet no sea takimata sanctus est Lorem ipsum dolor sit amete
							sare nostrud exercitation ullamco sea takiquis nostrud exercitatio.
						</p>
					</div>
					<div class="col-lg-4">
						<div class="icon-links icon-social social-colors align-right align-left-md">
							<a data-social="share-facebook" class="facebook"><i class="icon-facebook"></i></a>
							<a data-social="share-twitter" class="twitter"><i class="icon-twitter"></i></a>
							<a data-social="share-linkedin" class="linkedin"><i class="icon-linkedin"></i></a>
							<a data-social="share-pinterest" class="pinterest"><i class="icon-pinterest"></i></a>
						</div>
					</div>
				</div>
				<hr class="space" />
				<div class="tab-box tab-icon tab-vertical" data-tab-anima="fade-right">
					<ul class="tab-nav">
						<li class="active"><a href="#"><i class="im-folder-favorite"></i>Organise news by categories</a></li>
						<li><a href="#"><i class="im-newspaper"></i>Create your personal stream</a></li>
						<li><a href="#"><i class="im-thumb"></i>Social features for instant news</a></li>
					</ul>
					<div class="panel active">
						<div class="grid-list" data-columns="3" data-columns-md="2" data-columns-xs="1">
							<div class="grid-box">
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-bar-chart4"></i>
										<div class="caption">
											<h2>Real time chars</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-cool-guy"></i>
										<div class="caption">
											<h2>Premium support</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-laptop-3"></i>
										<div class="caption">
											<h2>Cross platform</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-lock-user"></i>
										<div class="caption">
											<h2>Security features</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-shuffle-4"></i>
										<div class="caption">
											<h2>Business network</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-security-settings"></i>
										<div class="caption">
											<h2>Validation</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel">
						<div class="grid-list" data-columns="3" data-columns-md="2" data-columns-xs="1">
							<div class="grid-box">
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-bar-chart4"></i>
										<div class="caption">
											<h2>Real time chars</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-cool-guy"></i>
										<div class="caption">
											<h2>Premium support</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-laptop-3"></i>
										<div class="caption">
											<h2>Cross platform</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-lock-user"></i>
										<div class="caption">
											<h2>Security features</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-shuffle-4"></i>
										<div class="caption">
											<h2>Business network</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-security-settings"></i>
										<div class="caption">
											<h2>Validation</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel">
						<div class="grid-list" data-columns="3" data-columns-md="2" data-columns-xs="1">
							<div class="grid-box">
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-bar-chart4"></i>
										<div class="caption">
											<h2>Real time chars</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-cool-guy"></i>
										<div class="caption">
											<h2>Premium support</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-laptop-3"></i>
										<div class="caption">
											<h2>Cross platform</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-lock-user"></i>
										<div class="caption">
											<h2>Security features</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-shuffle-4"></i>
										<div class="caption">
											<h2>Business network</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-top-icon">
										<i class="im-security-settings"></i>
										<div class="caption">
											<h2>Validation</h2>
											<p>
												Lorem ipsum dolor sitamet consect sed do eiusmod tempore.
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="section-base">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<form action="<?= base_url(); ?>assets_front/themekit/scripts/contact-form/contact-form.php" class="form-box form-ajax form-inline" method="post" data-email="example@domain.com">
							<div class="row">
								<div class="col-lg-8">
									<p>Type your email</p>
									<input id="email" name="email" placeholder="" type="email" class="input-text" required>
								</div>
								<div class="col-lg-4">
									<p></p>
									<button class="btn btn-sm" type="submit">Subscribe</button>
								</div>
							</div>
							<div class="form-checkbox">
								<input type="checkbox" id="check" name="check" value="check" required>
								<label for="check">You accept the terms of service and the privacy policy</label>
							</div>
							<div class="success-box">
								<div class="alert alert-success">Congratulations. Your message has been sent successfully</div>
							</div>
							<div class="error-box">
								<div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
							</div>
						</form>
					</div>
					<div class="col-lg-4 order-md-first">
						<h2>Subscribe now.</h2>
						<hr class="space-xs" />
						<p>Sare nostrud exercitation ullamco sea takiquis nostrud message bareteso exercitatio.</p>
					</div>
				</div>
			</div>
		</section>
		<section id="news" class="section-base section-color">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<h2>A taste of your news, hand picked for you.</h2>
						<p>
							Lorem ipsum dolor sit amet no sea takimata sanctus est Lorem ipsum dolor sit amete
							sare nostrud exercitation ullamco sea takiquis nostrud exercitatio.
						</p>
					</div>
					<div class="col-lg-4 align-right align-left-md">
						<a href="#" class="btn btn-circle btn-border btn-sm">View all news</a>
					</div>
				</div>
				<hr class="space" />
				<div class="row">
					<div class="col-lg-8">
						<div class="grid-list" data-columns="2" data-columns-sm="1">
							<div class="grid-box">
								<div class="grid-item">
									<div class="cnt-box cnt-box-blog-top boxed">
										<a href="#" class="img-box">
											<div class="blog-date">
												<span>23</span>
												<span>JAN 2018</span>
											</div>
											<img src="http://via.placeholder.com/800x600" alt="" />
										</a>
										<div class="caption">
											<h2>See Ariana Grande and Barbra Streisand in Chicago</h2>
											<ul class="icon-list icon-list-horizontal">
												<li><i class="icon-bookmark"></i><a href="#">Events</a></li>
												<li class="icon-links">
													<a href="#" data-social="share-fadebook" data-social-url=""><i class="icon-facebook"></i></a>
													<a href="#" data-social="share-twitter" data-social-url=""><i class="icon-twitter"></i></a>
													<a href="#" data-social="share-linkedin" data-social-url=""><i class="icon-linkedin"></i></a>
												</li>
											</ul>
											<p>
												Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore.
												Duis aute irure dolor in reprehenderit in velie.
											</p>
										</div>
									</div>
								</div>
								<div class="grid-item">
									<div class="cnt-box cnt-box-blog-top boxed">
										<a href="#" class="img-box">
											<div class="blog-date">
												<span>12</span>
												<span>JAN 2018</span>
											</div>
											<img src="http://via.placeholder.com/800x600" alt="" />
										</a>
										<div class="caption">
											<h2>Watch Tyler Childers Sing Intense House Fire on Fallon</h2>
											<ul class="icon-list icon-list-horizontal">
												<li><i class="icon-bookmark"></i><a href="#">Events</a></li>
												<li class="icon-links">
													<a href="#" data-social="share-fadebook" data-social-url=""><i class="icon-facebook"></i></a>
													<a href="#" data-social="share-twitter" data-social-url=""><i class="icon-twitter"></i></a>
													<a href="#" data-social="share-linkedin" data-social-url=""><i class="icon-linkedin"></i></a>
												</li>
											</ul>
											<p>
												Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore.
												Duis aute irure dolor in reprehenderit in velie.
											</p>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="scroll-box" data-height="628" data-rail-color="#F1F5F7" data-bar-color="#0F3049">
							<div class="social-feed social-feed-tw" data-social-id="twitter" data-options="count:8"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="section-base">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="cnt-box cnt-box-testimonials-bubble rating-5">
							<p>
								Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore artisio meto.
							</p>
							<div class="thumb-bar">
								<img src="http://via.placeholder.com/450x450" alt="" />
								<p>
									<span>Robert Junior</span>
									<span>Slack</span>
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="cnt-box cnt-box-testimonials-bubble rating-5">
							<p>
								Lorem ipsum dolor sitamet consectetur adipisicinge stratone elito sed do eiusmod tempore.
							</p>
							<div class="thumb-bar">
								<img src="http://via.placeholder.com/450x450" alt="" />
								<p>
									<span>Brad Manson</span>
									<span>Google</span>
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="cnt-box cnt-box-testimonials-bubble rating-4">
							<p>
								Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore eclessio.
							</p>
							<div class="thumb-bar">
								<img src="http://via.placeholder.com/450x450" alt="" />
								<p>
									<span>Jessica Poster</span>
									<span>Facebook</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<i class="scroll-top-btn scroll-top show"></i>
	<footer class="footer-parallax light">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<h4>Company and team</h4>
					<div class="menu-inner menu-inner-vertical">
						<ul>
							<li>
								<a href="#">Company details and team</a>
							</li>
							<li>
								<a href="#">News and blog</a>
							</li>
							<li>
								<a href="#">Press area</a>
							</li>
							<li>
								<a href="#">Affiliates and marketing</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3">
					<h4>Help and support</h4>
					<div class="menu-inner menu-inner-vertical">
						<ul>
							<li>
								<a href="#">Help centre</a>
							</li>
							<li>
								<a href="#">Feedbacks</a>
							</li>
							<li>
								<a href="#">Request new features</a>
							</li>
							<li>
								<a href="#">Contact us</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3">
					<h4>Learn more</h4>
					<div class="menu-inner menu-inner-vertical">
						<ul>
							<li>
								<a href="#">Apps stores</a>
							</li>
							<li>
								<a href="#">Partners</a>
							</li>
							<li>
								<a href="#">Privacy and terms</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3">
					<h4>Follow us</h4>
					<div class="icon-links icon-social icon-links-grid social-colors">
						<a class="facebook"><i class="icon-facebook"></i></a>
						<a class="twitter"><i class="icon-twitter"></i></a>
						<a class="linkedin"><i class="icon-linkedin"></i></a>
						<a class="youtube"><i class="icon-youtube"></i></a>
						<a class="instagram"><i class="icon-instagram"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bar">
			<div class="container">
				<span>© Codrop LTD 2019. Codrop is a powerful Landing Page App Template built with <a target="_blank" href="https://<?= base_url(); ?>assets_front/themekit.dev/code/"><?= base_url(); ?>assets_front/themekit</a> by the <a target="_blank" href="https://schiocco.com/">Schiocco</a> Team. </span>
				<span><img src="<?= base_url(); ?>assets_front/media/logo-light.svg" /></span>
			</div>
		</div>
		<link rel="stylesheet" href="<?= base_url(); ?>assets_front/themekit/media/icons/iconsmind/line-icons.min.css">
		<script src="<?= base_url(); ?>assets_front/themekit/scripts/parallax.min.js"></script>
		<script src="<?= base_url(); ?>assets_front/themekit/scripts/glide.min.js"></script>
		<script src="<?= base_url(); ?>assets_front/themekit/scripts/slimscroll.min.js"></script>
		<script src="<?= base_url(); ?>assets_front/themekit/scripts/tab-accordion.js"></script>
		<script src="<?= base_url(); ?>assets_front/themekit/scripts/imagesloaded.min.js"></script>
		<script src="<?= base_url(); ?>assets_front/themekit/scripts/contact-form/contact-form.js"></script>
		<script src="<?= base_url(); ?>assets_front/themekit/scripts/social.min.js"></script>
		<script src="<?= base_url(); ?>assets_front/themekit/scripts/pagination.min.js"></script>
		<script src="<?= base_url(); ?>assets_front/media/custom.js"></script>
	</footer>
</body>

</html>