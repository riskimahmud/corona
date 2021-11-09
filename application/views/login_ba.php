<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo base_url(config_item('assets_uri')) ?>/img/sipba_kecil.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url(config_item('assets_uri')) ?>/img/sipba_kecil.png" sizes="32x32">

    <title><?php echo $title; ?></title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url(config_item('bower_uri')) ?>/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="<?php echo base_url(config_item('assets_uri')) ?>/css/login_page.min.css" />

</head>
<body class="login_page login_page_v2" style="background-image: url('<?php echo site_url(config_item('assets_uri')); ?>/img/background2.jpg'); background-repeat: no-repeat; background-size: cover;">

    <div class="uk-container uk-container-center">
        <div class="md-card">
            <div class="md-card-content padding-reset">
                <div class="uk-grid uk-grid-collapse">
                    <div class="uk-width-large-2-3 uk-hidden-medium uk-hidden-small">
                        <div class="login_page_info uk-height-1-1" style="background-image: url('<?php echo site_url(config_item('assets_uri')); ?>/img/background2.jpg')">
                            <div class="info_content">
                                <h2 class="heading_b"><?php echo $config->singkatan_aplikasi; ?> - <?php echo $config->nama_aplikasi; ?></h2>
                                <?php echo $config->instansi; ?><br>
                                <?php echo $config->alamat_instansi; ?>
                            </div>
                        </div>
                    </div>
					<?php
						$notif = $this->session->flashdata("notifikasi");
						if(!empty($notif)){
							echo get_notif($notif['status'],$notif['pesan']);
						}
					?>
                    <div class="uk-width-large-1-3 uk-width-medium-2-3 uk-container-center">
                        <div class="login_page_forms">
                            <div id="login_card">
                                <div id="login_form">
									<p class="alert" id="responseDiv" style="margin:10px 0 0;display:none">

										<!--i class="uk-icon-spinner uk-icon-medium uk-icon-spin"></i-->
										<span id="message"></span>

									</p>
                                    <div class="login_heading">
                                        <div class="user_avata"></div>
										<img class="md-card-head-avatar" src="<?php echo config_item("assets_uri"); ?>/img/logo-kota.png" alt=""/>
										<img class="md-card-head-avatar" src="<?php echo base_url(); ?>/assets_laporan/logo-kementan-sosial.png" alt=""/>
                                    </div>
                                    <form autocomplete="off" id="logForm">
                                        <div class="uk-form-row">
                                            <label for="login_username">Username</label>
                                            <input class="md-input" type="text" id="login_username" name="username" required autofocus/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="login_password">Password</label>
                                            <input class="md-input" type="password" id="login_password" name="password" required/>
                                        </div>
                                        <div class="uk-margin-top">
                                            <span class="icheck-inline">
                                                <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
                                                <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
                                            </span>
                                        </div>
                                        <div class="uk-margin-medium-top">
											<button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" id="logText"></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

    <!-- common functions -->
    <script src="<?php echo base_url(config_item('assets_uri')) ?>/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url(config_item('assets_uri')) ?>/js/uikit_custom.min.js"></script>
    <!-- altair core functions -->
    <script src="<?php echo base_url(config_item('assets_uri')) ?>/js/altair_admin_common.min.js"></script>

    <!-- altair login page functions -->
    <script src="<?php echo base_url(config_item('assets_uri')) ?>/js/pages/login.min.js"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#logText').html('Login');
			$('#logForm').submit(function(e){
				e.preventDefault();
				$('#logText').html('<i class="uk-icon-spinner uk-icon-medium uk-icon-spin uk-text-white"></i>&nbsp; Checking...');
				var url = '<?php echo base_url(); ?>';
				var user = $('#logForm').serialize();
				var login = function(){
					$.ajax({
						type: 'POST',
						url: url + '/login/do_login',
						dataType: 'json',
						data: user,
						success:function(response){
							$('#message').html(response.message);
							$('#logText').html('Login');
							if(response.error){
								$('#responseDiv').removeClass('uk-alert-success').addClass('uk-alert-danger').show();
							}
							else{
								$('#responseDiv').removeClass('uk-alert-danger').addClass('uk-alert-success').show();
								$('#logForm')[0].reset();
								setTimeout(function(){
									location.reload();
								}, 3000);
							}
						}
					});
				};
				setTimeout(login, 3000);
			});

			$(document).on('click', '#clearMsg', function(){
				$('#responseDiv').hide();
			});
		});
	</script>
</html>