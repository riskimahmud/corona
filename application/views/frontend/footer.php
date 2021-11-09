<aside id="footer-widgets">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 class="footer-widget-title">Sitemap</h3>
                <ul class="list-unstyled three_cols">
                    <li><a href="<?php echo site_url(); ?>">Beranda</a></li>
                    <li><a href="<?php echo site_url("frontend/data"); ?>">Data</a></li>
                    <li><a href="<?php echo site_url("frontend/publikasi"); ?>">Publikasi</a></li>
                    <li><a href="<?php echo site_url("frontend/faq"); ?>">FAQ</a></li>
                    <li><a href="<?php echo site_url("frontend/kontak"); ?>">Kontak</a></li>
                    <li><a href="<?php echo site_url("login"); ?>">Login</a></li>
                </ul>
            </div>
            <div class="col-md-8">
				<h3 class="footer-widget-title">Kunjungan</h3>
				<div class="row" style="margin-top:-50px;">
					<div class="col-md-6">
						<ul class="list-group margin-top" style="background-color:transparent;">
							<li class="list-group-item" style="background-color:transparent;">
								Hari Ini
								<span class="pull-right" style="font-size:30px; font-weight:bold;"><?php echo $kunjungan['hari_ini']; ?></span>
							</li>
							<li class="list-group-item" style="background-color:transparent;">
								Kemarin
								<span class="pull-right" style="font-size:30px; font-weight:bold;"><?php echo $kunjungan['kemarin']; ?></span>
							</li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="list-group margin-top" style="background-color:transparent;">
							<li class="list-group-item" style="background-color:transparent;">
								Bulan Ini
								<span class="pull-right" style="font-size:30px; font-weight:bold;"><?php echo $kunjungan['bulan_ini']; ?></span>
							</li>
							<li class="list-group-item" style="background-color:transparent;">
								Tahun Ini
								<span class="pull-right" style="font-size:30px; font-weight:bold;"><?php echo $kunjungan['tahun_ini']; ?></span>
							</li>
						</ul>
					</div>
				</div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</aside> <!-- footer-widgets -->
<footer id="footer">
    <p>&copy; 2020 <a href="#">Diskominfo Kota Gorontalo</a>, inc. All rights reserved.</p>
</footer>



</div> <!-- boxed -->
</div> <!-- sb-site -->

<div class="sb-slidebar sb-right">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
        </span>
    </div><!-- /input-group -->

    <h2 class="slidebar-header no-margin-bottom">Navigation</h2>
    <ul class="slidebar-menu">
        <li><a href="index.html">Home</a></li>
        <li><a href="portfolio_topbar.html">Portfolio</a></li>
        <li><a href="page_about3.html">About us</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li><a href="page_contact.html">Contact</a></li>
    </ul>

    <h2 class="slidebar-header">Social Media</h2>
    <div class="slidebar-social-icons">
        <a href="#" class="social-icon-ar rss"><i class="fa fa-rss"></i></a>
        <a href="#" class="social-icon-ar facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="social-icon-ar twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="social-icon-ar pinterest"><i class="fa fa-pinterest"></i></a>
        <a href="#" class="social-icon-ar instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="social-icon-ar wordpress"><i class="fa fa-wordpress"></i></a>
        <a href="#" class="social-icon-ar linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="#" class="social-icon-ar flickr"><i class="fa fa-flickr"></i></a>
        <a href="#" class="social-icon-ar vine"><i class="fa fa-vine"></i></a>
        <a href="#" class="social-icon-ar dribbble"><i class="fa fa-dribbble"></i></a>
    </div>
</div> <!-- sb-slidebar sb-right -->
<div id="back-top">
    <a href="#header"><i class="fa fa-chevron-up"></i></a>
</div>


<script src="<?php echo base_url(); ?>/assets_front/js/vendors.js"></script>

<script src="<?php echo base_url(); ?>/assets_front/js/styleswitcher.js"></script>

<!-- Syntaxhighlighter -->
<script src="<?php echo base_url(); ?>/assets_front/js/syntaxhighlighter/shCore.js"></script>
<script src="<?php echo base_url(); ?>/assets_front/js/syntaxhighlighter/shBrushXml.js"></script>
<script src="<?php echo base_url(); ?>/assets_front/js/syntaxhighlighter/shBrushJScript.js"></script>

<script src="<?php echo base_url(); ?>/assets_front/js/app.js"></script>
<script src="<?php echo base_url(); ?>/assets_front/js/index.js"></script>
<script src="<?php echo base_url(); ?>/assets_front/js/carousels.js"></script>
<script>
	function detail_sebaran(id){
		$.ajax({
		  url		: 	"<?= site_url("frontend/detail_sebaran/")?>",
		  data		: 	'id='+id,
		  type		:	"POST",
		  beforeSend: function(html){
			$("#detail_sebaran").html('<hr><i class="fa fa-spinner fa-spin"></i> Tunggu sebentar...');
		  },
		  success	: function(html){
			$("#detail_sebaran").html(html);
		  }
		});

	}
</script>
<script type="text/javascript">
$(document).ready(function(e) {
   
	// live handler
	lc_lightbox('.elem', {
		wrap_class: 'lcl_fade_oc',
		gallery : true,	
		thumb_attr: 'data-lcl-thumb', 
		
		skin: 'light',
		radius: 0,
		padding	: 0,
		border_w: 0,
	});	

});
</script>

</body>

</html>