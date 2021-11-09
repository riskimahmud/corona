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
			<div class="col-xs-12">
				<?php foreach($data as $d){ ?>
				<article class="post animated fadeInDown animation-delay-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="post-title"><a href="<?php echo site_url("frontend/detail_hoax/".$d->id_hoax); ?>" class="transicion"><?php echo $d->judul; ?></a></h3>
							<div class="row">
								<div class="col-md-6">
									<img src="<?php echo base_url("uploads/hoax/".$d->gambar); ?>" class="img-responsive imageborder" alt="Image">
								</div>
								<div class="col-md-6">
								    <p>
									<?php echo strip_tags(substr($d->isi,0,900)); ?>
                                    </p>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<div class="row">
								<div class="col-lg-10 col-md-9 col-sm-4">
									<i class="fa fa-clock-o"></i> <?php echo tgl_full($d->create_at); ?> <i class="fa fa-user"> </i> Admin.
								</div>
								<div class="col-lg-2 col-md-3 col-sm-4">
									<a href="<?php echo site_url("frontend/detail_hoax/".$d->id_hoax); ?>" class="pull-right">Baca Selengkapnya... &raquo;</a>
								</div>
							</div>
						</div>
					</div>
				</article> <!-- post -->
				<?php } ?>
				<div class="pagination">
				<?php 
					echo $this->pagination->create_links();
				?>
				</div>
			</div>
		</div>
	</div>
</section>