<section>
	<header id="header-full">
		<div class="wrap-primary">
			<div class="container">
				<h1 class="head-title animated bounceInDown animation-delay-8" style="margin-top:100px;">GORONTALO SIAGA COVID-19</h1>
				<h2 class="secondary-color text-center head-subtitle animated fadeInUp animation-delay-14">DATA</h2>
				<div class="row header-full-icons text-center" style="margin-bottom:100px;">

				</div>
			</div>
		</div>
	</header>
</section> <!-- carousel -->

<section class="margin-bottom">
	<div class="container">
		<div class="col-md-4">
			<h1 class="margin-top text-center text-danger">
				Pantauan Kasus Nasional
			</h1>
			<hr class="no-margin-bottom no-margin-bottom">
			<br>
			<small class="col-md-12">*Last Update <?php echo tgl_full($nasional['last_update']); ?></small>
			<br>
			<div class="panel panel-danger">
				<div class="panel-heading text-center" style="font-size:15pt;">Kasus Terkonfirmasi<br>COVID-19 Nasional</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12 text-center">
							<h2 class="text-danger"><?php echo $nasional['positif']; ?></h2>
							Kasus Positif
						</div>
						<div class="col-md-4 text-center">
							<h3 class="text-danger"><?php echo $nasional['dirawat']; ?></h3>
							Dirawat
						</div>
						<div class="col-md-4 text-center">
							<h3 class="text-danger"><?php echo $nasional['sembuh']; ?></h3>
							Sembuh
						</div>
						<div class="col-md-4 text-center">
							<h3 class="text-danger"><?php echo $nasional['meninggal']; ?></h3>
							Meninggal
						</div>
					</div>
				</div>
			</div>
			*Data kasus terkonfirmasi COVID-19 adalah data yang telah diumumkan secara resmi oleh Kementerian Kesehatan RI.
		</div>

		<div class="col-md-8">
			<div class="row">
				<h1 class="margin-top text-center text-primary">
					Pantauan Kasus Kota Gorontalo
				</h1>
				<div class="col-md-3">
					<div class="panel panel-danger text-center text-danger">
						<div class="panel-body">
							<b style="font-size:35px; margin-top:10px; font-weight:bold;"><?php echo $kasus->positif; ?></b>
							<br>Positif
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-primary text-center text-primary">
						<div class="panel-body">
							<b style="font-size:35px; margin-top:10px; font-weight:bold;"><?php echo $kasus->aktif; ?></b>
							<br>Dirawat
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-success text-center text-success">
						<div class="panel-body">
							<b style="font-size:35px; margin-top:10px; font-weight:bold;"><?php echo $kasus->sembuh; ?></b>
							<br>Sembuh
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default text-center text-default">
						<div class="panel-body">
							<b style="font-size:35px; margin-top:10px; font-weight:bold;"><?php echo $kasus->meninggal; ?></b>
							<br>Meninggal
						</div>
					</div>
				</div>
				<!-- <div class="col-md-6">
					<a href="<?php echo site_url("frontend/sebaran_all"); ?>" class="btn btn-block btn-primary">Lihat Sebaran di Semua Negara</a>
				</div>
				<div class="col-md-6">
					<a href="<?php echo site_url("frontend/sebaran_prov"); ?>" class="btn btn-block btn-success">Lihat Sebaran di Negara Indonesia (Provinsi)</a>
				</div> -->
			</div>
			<h1 class="margin-top text-center">
				Sebaran Kasus Di Kota Gorontalo
			</h1>
			<hr class="no-margin-bottom no-margin-bottom">
			<?php echo $map['html']; ?>

			<div id="detail_sebaran">
			</div>
		</div>
	</div>
</section>