<section>
	<header id="header-full">
    <div class="wrap-primary">
        <div class="container">
            <h1 class="head-title animated bounceInDown animation-delay-8" style="margin-top:100px;">GORONTALO SIAGA COVID-19</h1>
            <h2 class="secondary-color text-center head-subtitle animated fadeInUp animation-delay-14">PUBLIKASI</h2>
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
                <ul class="nav nav-tabs nav-justified">
					<li class="active"><a href="#infografik" data-toggle="tab"><h2>Infografik</h2></a></li>
					<li><a href="#dokumen" data-toggle="tab"><h2>Dokumen</h2></a></li>
				</ul>
				 
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="infografik">
						<h2 class="margin-top">Infografik</h2>
						<p>Lihat dan unduh infografik seputar informasi COVID-19 di Kota Gorontalo. 
						Infografik yang ditampilkan berdasarkan informasi resmi dari Pemkot Kota Gorontalo.</p>
						<div class="row margin-top">
							<?php 
							    $i=1; foreach($infografik as $in){
							?>
							<div class="col-md-4">
								<div class="content-box box-default" style="height:'100px;'">
									<img src="<?php echo base_url("uploads/berita/".$in->gambar); ?>" alt="" size="40" class="img-responsive">
									<h6 class="content-box-title"><?php echo $in->judul; ?></h6>
									<a href="<?php echo site_url("frontend/download/".$in->id_berita); ?>" class="btn btn-ar btn-danger">Unduh</a>
									<a href="#" class="btn btn-ar btn-default">Share</a>
								</div>
							</div>
							<?php
							$i++;
							    if(($i % 4) == 0){
							          echo '<div class="col-md-12"><hr></div>';
							    }
							}
							?>
						</div>
					</div>
					
					<div class="tab-pane" id="dokumen">
						<h2 class="margin-top">Dokumen</h2>
						<p>Lihat dan unduh dokumen seputar informasi COVID-19 di Kota Gorontalo. 
						Dokumen yang ditampilkan berdasarkan informasi resmi dari Pemkot Kot Gorontalo.</p>
						<div class="row margin-top">
							<div class="col-md-12">
								<table class="table">
									<thead>
										<tr>
											<th>Tanggal</th>
											<th>Judul</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($dokumen as $dok){ ?>
										<tr>
											<td><?php echo tgl_full($dok->create_at); ?></td>
											<td>
												<a href="<?php echo site_url("frontend/download/".$in->id_berita); ?>">
													<?php echo $dok->judul; ?>
												</a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
            </div>
       </div>
	</div>
</section>