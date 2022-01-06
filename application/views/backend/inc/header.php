<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets_front/img/kota-gorontalo.png" />
	<title>Pantauan Covid19 Kota Gorontalo | <?php echo $title; ?></title>

	<link rel="icon" href="<?= base_url(); ?>assets_front/media/kota-gorontalo.png">

	<meta name="description" content="Pantauan Covid19 Kota Gorontalo" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!--basic styles-->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.3.custom.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.css" />

	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/chosen.css" />

	<!-- notifikasi -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery.gritter.css" />

	<!--colorbox-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorbox.css" />

	<!-- datatable -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

	<!--ace styles-->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-responsive.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css" />

	<!-- highchart -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<link rel="stylesheet" href="<?= base_url('assets/hc/style.css'); ?>">

	<script>
		const url = '<?= base_url(); ?>';
	</script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a href="#" class="brand">
					<img src="<?= base_url("assets/img/kota-gorontalo.png"); ?>" class="padding-10" alt="logo-kota">
					Pantauan Covid19
				</a>
				<!--/.brand-->

				<ul class="nav ace-nav pull-right">

					<li class="light-blue">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="<?php echo base_url("assets/img/user.png"); ?>" alt="No Poto" />
							<span class="user-info">
								<small>Selamat Datang,</small>
								<?php echo get_userdata_user("nama"); ?>
							</span>

							<i class="icon-caret-down"></i>
						</a>

						<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
							<li>
								<a href="<?php echo site_url("admin/profil"); ?>">
									<i class="icon-user"></i>
									Profile
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<a href="<?php echo site_url("login/logout"); ?>">
									<i class="icon-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<!--/.ace-nav-->
			</div>
			<!--/.container-fluid-->
		</div>
		<!--/.navbar-inner-->
	</div>