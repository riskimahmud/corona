<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>COVID - 19</title>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets_front/img/kota-gorontalo.png" />

    <meta name="description" content="">

    <!-- CSS -->
    <link href="<?php echo base_url(); ?>/assets_front/css/preload.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets_front/css/vendors.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets_front/css/syntaxhighlighter/shCore.css" rel="stylesheet" >

    <link href="<?php echo base_url(); ?>/assets_front/css/style-blue.css" rel="stylesheet" title="default">
    <link href="<?php echo base_url(); ?>/assets_front/css/width-full.css" rel="stylesheet" title="default">
    <link href="<?php echo base_url(); ?>/assets_front/css/index.css" rel="stylesheet" title="default">
	<?php 
		if(empty($map)){
		
		}else{
			echo $map['js'];
		}
	?>

    <script src="<?php echo base_url(); ?>/assets_front/lib/jquery.js" type="text/javascript"></script>

    <!-- Lightbox galeri -->
    <script src="<?php echo base_url(); ?>/assets_front/js/lc_lightbox.lite.js" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets_front/css/lc_lightbox.css" />


	<!-- SKINS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets_front/skins/minimal.css" />
	<script type="text/javascript" src=https://widget.kominfo.go.id/gpr-widget-kominfo.min.js></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="<?php echo base_url(); ?>/assets_front/js/html5shiv.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets_front/js/respond.min.js"></script>
    <![endif]-->
</head>

<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>