	<style>
		.kop{
			background-image: url("<?php echo base_url(); ?>/assets_front/img/kota-gorontalo.png");
			background-repeat: no-repeat;
			padding-left: 18px !important;
			background-size: 7%;
			background-position-y: 20%;
		}
		
		.tdd{
			text-align:center;
		}
		.tdd img{
			top:0;
			margin-top:0;
			padding:10px;
		}
		
		.ntd{
			text-align:center;
		}
		.ntd img{
			top:0;
			margin-top:0;
			padding:10px;
		}
		
		.petunjuk li{
			background-image: url("<?php echo base_url(); ?>/assets_front/img/checklist.png");
			background-repeat: no-repeat;
			padding-left: 60px !important;
			padding-bottom:45px;
			background-size: 7%;
			background-position-y: 20%;
			font-size:15pt;
			font-family:verdana;
			color:#20a5de;
		}
		
		.kotak {
		  padding: 30px;
		  margin: 30px;
		  box-shadow: 0px 2px 5px 5px grey;
		}
		
		.font{
			font-family: Arial;
		}
	</style>
<body>


<div id="sb-site">
<div class="boxed">

<header id="header-full-top" class="hidden-xs header-full">
    <div class="container kop">
        <div class="header-full-title">
            <h1 class="animated fadeInRight"><a href="<?php echo site_url(); ?>">Corona <span>Gorontalo</span></a></h1>
            <p class="animated fadeInRight">Pantauan Terkini Perkembangan Covid-19</p>
        </div>
        <nav class="top-nav">
            <ul class="top-nav-social hidden-sm">
                <li><a href="#" class="animated fadeIn animation-delay-6 rss"><i class="fa fa-rss"></i></a></li>
                <li><a href="#" class="animated fadeIn animation-delay-7 twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="animated fadeIn animation-delay-8 facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="animated fadeIn animation-delay-9 google-plus"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" class="animated fadeIn animation-delay-9 instagram"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#" class="animated fadeIn animation-delay-8 vine"><i class="fa fa-vine"></i></a></li>
                <li><a href="#" class="animated fadeIn animation-delay-7 linkedin"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" class="animated fadeIn animation-delay-6 flickr"><i class="fa fa-flickr"></i></a></li>
            </ul>

            <div class="dropdown animated fadeInDown animation-delay-11">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Login</a>
                <div class="dropdown-menu dropdown-menu-right dropdown-login-box animated fadeInUp">
                    <form role="form" action="<?php echo site_url("login/do_login"); ?>" method="POST" autocomplete="off">
                        <h4>Login Form</h4>

                        <div class="form-group">
                            <div class="input-group login-input">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                            <br>
                            <div class="input-group login-input">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="checkbox pull-left">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-ar btn-primary pull-right">Login</button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div> <!-- dropdown -->
        </nav>
    </div> <!-- container -->
</header> <!-- header-full -->
<nav class="navbar navbar-static-top navbar-default navbar-header-full navbar-dark yamm" role="navigation" id="header">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <a id="ar-brand" class="navbar-brand hidden-lg hidden-md hidden-sm" href="<?php echo site_url(); ?>">Corona <span>Gorontalo</span></a>
        </div> <!-- navbar-header -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo site_url(); ?>">Beranda</a>
                </li>
                <li>
                    <a href="<?php echo site_url("frontend/data"); ?>">Data</a>
                </li>
                <li>
                    <a href="<?php echo site_url("frontend/lawanhoax"); ?>">Lawan HOAX</a>
                </li>
                <li>
                    <a href="<?php echo site_url("frontend/publikasi"); ?>">Publikasi</a>
                </li>
                <li>
                    <a href="<?php echo site_url("frontend/faq"); ?>">FAQ</a>
                </li>
                <li>
                    <a href="<?php echo site_url("frontend/kontak"); ?>">Kontak</a>
                </li>
             </ul>
        </div><!-- navbar-collapse -->
    </div><!-- container -->
</nav>