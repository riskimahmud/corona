<section>
	<header id="header-full">
    <div class="wrap-primary">
        <div class="container">
            <h1 class="head-title animated bounceInDown animation-delay-8" style="margin-top:100px;">GORONTALO SIAGA COVID-19</h1>
            <h2 class="secondary-color text-center head-subtitle animated fadeInUp animation-delay-14">GALERI</h2>
            <div class="row header-full-icons text-center" style="margin-bottom:100px;">
                
            </div>
		</div>
	</div>
	</header>
</section> <!-- carousel -->

<section class="margin-bottom">
	<div class="container">
        <div class="row">
            <div class="col-md-12 margin-top">
                <div class="content">
					<?php foreach($data as $d){ ?>
					<a class="elem" href="<?php echo base_url("uploads/galeri/".$d->gambar) ?>" title="Galeri Sosialisasi" data-lcl-txt="<?php echo $d->judul ?>" data-lcl-author="corona.gorontalokota.go.id" data-lcl-thumb="<?php echo base_url("uploads/galeri/thumb/".$d->gambar) ?>">
						<span style="background-image: url(<?php echo base_url("uploads/galeri/thumb/".$d->gambar) ?>);"></span>
					</a>
					<?php } ?>
				</div>
            </div>
       </div>
	</div>
</section>