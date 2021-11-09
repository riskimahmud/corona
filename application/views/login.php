<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Login Page - Web Satgas Corona</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--modal styles-->
		<link href="<?php echo base_url(); ?>assets/css/modal.css" rel="stylesheet" />
		
		<!--basic styles-->

		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />

		<!--ac-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.3.custom.min.css" />
		
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<link href='<?php echo base_url();?>assets/css/jquery.autocomplete.css' rel='stylesheet' />
		
		<!--ace styles-->

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css" />
		<style>
			html{
			}
			body{
				background-color:white;
				font-family: Verdana, Geneva, sans-serif;
				font-style: normal;
				font-variant: normal;
				font-weight: 100;
              	font-size: 15px;
				line-height: 20px;
			}
		</style>

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body class="login-layout">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
							<div class="row-fluid" width="100%">
								<div class="center">
									<img src="<?php echo base_url("assets_front/img/kota-gorontalo.png"); ?>" width="100" style="margin-top:10px;">
									<a href="<?php echo site_url(); ?>">
									<h1 style="font-size:25px;">
										<span class="white">Pantauan Corona Kota Gorontalo</span></span>
									</h1>
									</a>
								</div>
							</div>

						<div class="login-container">
							
							
							<div class="space-6"></div>

							<div class="row-fluid">
								
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<?php
													$notif = $this->session->flashdata("notifikasi");
													if(!empty($notif)){
														echo get_notif($notif['status'],$notif['pesan']);
													}
												?>
												<h5 class="header green lighter bigger">
													<i class="icon-user green"></i>
													Masukkan username dan password <!--Please Enter Your Information-->
												</h5>

												<div class="space-6"></div>

												<form action="<?php echo site_url("login/do_login"); ?>" method="POST" autocomplete="off">
													
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" name="username" class="span12" placeholder="Username" />
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" name="password" class="span12" placeholder="Password" />
																<i class="icon-lock"></i>
															</span>
														</label>

														<div class="space"></div>

														<div class="clearfix">
															<button onclick="return true;" class="width-35 pull-right btn btn-small btn-success">
																<i class="icon-key"></i>
																Masuk
															</button>
														</div>

														<div class="space-4"></div>
													</fieldset>
												</form>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/login-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->

		<!--basic scripts-->

		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>
	</body>
</html>
