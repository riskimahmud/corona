<section>
	<header id="header-full">
    <div class="wrap-primary">
        <div class="container">
            <h1 class="head-title animated bounceInDown animation-delay-8" style="margin-top:100px;">GORONTALO SIAGA COVID-19</h1>
            <h2 class="secondary-color text-center head-subtitle animated fadeInUp animation-delay-14">LAWAN HOAX</h2>
            <div class="row header-full-icons text-center" style="margin-bottom:100px;">
                
            </div>
		</div>
	</div>
	</header>
</section> <!-- carousel -->

<section class="margin-bottom margin-top">
    <div class="container">
		<div class="row"> 
			<div class="col-md-12">
				<section>
					<h2 class="page-header no-margin-top no-margin-bottom"><?php echo $data->judul; ?></h2>
					<span><i class="fa fa-clock-o"></i> <?php echo tgl_full($data->create_at); ?></span><br>
					<img src="<?php echo base_url("uploads/hoax/".$data->gambar); ?>" class="img-responsive imageborder margin-top" alt="Image">
					<div align="justify">
						<?php echo $data->isi; ?>
					</div>
				</section>
			</div>
			<!-- AddToAny BEGIN -->
			<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
			<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
			<a class="a2a_button_facebook"></a>
			<a class="a2a_button_twitter"></a>
			<a class="a2a_button_email"></a>
			<a class="a2a_button_whatsapp"></a>
			</div>
			<script async src="https://static.addtoany.com/menu/page.js"></script>
			<!-- AddToAny END -->
		</div>
	</div>
</section>