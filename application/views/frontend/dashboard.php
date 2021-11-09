<section>
	<header id="header-full">
		<div class="wrap-primary">
			<div class="container">
				<h1 class="head-title animated bounceInDown animation-delay-8" style="margin-top:100px;">GORONTALO SIAGA COVID-19</h1>
				<h2 class="secondary-color text-center head-subtitle animated fadeInUp animation-delay-14">Hubungi Layanan Gorontalo Siaga COVID-19</h2>
				<div class="row header-full-icons text-center" style="margin-bottom:100px;">
					<div class="col-sm-3 animated fadeInDown animation-delay-19">
					</div>
					<div class="col-sm-6 animated fadeInDown animation-delay-22 text-center">
						<p>
							<a href="tel:081143101000" class="btn btn-ar btn-primary btn-lg btn-block"><i class="fa fa-phone"></i> 081143101000</a>
						</p>
					</div>
					<div class="col-sm-3 animated fadeInDown animation-delay-20">
					</div>
				</div>
			</div>
		</div>
	</header>
</section> <!-- carousel -->

<section class="margin-bottom margin-top">
	<div class="container">
		<div class="com-md-12 animated fadeInDown animation-delay-12">
			<div class="panel kotak">
				<div class="panel-body">
					<h2 class="text-center">Data Pantauan COVID-19 Gorontalo</h2>
					<p class="text-center"><i class="fa fa-calendar"></i> 21 Januari 2020 sampai hari ini</p>
					<hr>
					<div class="col-md-6">
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
					</div>
					<div class="col-md-6">
						<small class="col-md-12">*Last Update <?php echo tgl_full($kasus->last_update); ?></small>
						<br>
						<div class="panel panel-primary">
							<div class="panel-heading text-center" style="font-size:15pt;">Kasus Terkonfirmasi<br>COVID-19 Kota Gorontalo</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12 text-center">
										<h2 class="text-primary"><?php echo $kasus->positif; ?></h2>
										Kasus Positif
									</div>
									<div class="col-md-4 text-center">
										<h3 class="text-primary"><?php echo $kasus->aktif; ?></h3>
										Dirawat
									</div>
									<div class="col-md-4 text-center">
										<h3 class="text-primary"><?php echo $kasus->sembuh; ?></h3>
										Sembuh
									</div>
									<div class="col-md-4 text-center">
										<h3 class="text-primary"><?php echo $kasus->meninggal; ?></h3>
										Meninggal
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="col-md-4">
						<small>*Last Update <?php echo tgl_full($positif->create_at); ?></small>
						<div class="panel panel-success">
							<div class="panel-heading text-center" style="font-size:15pt;">Kasus Terkonfirmasi<br>COVID-19 Kota Gorontalo</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12 text-center">
										<h2 class="text-success"><?php echo $positif->positif; ?></h2>
										Kasus Positif
									</div>
									<div class="col-md-4 text-center">
										<h3 class="text-success"><?php echo $positif->dirawat; ?></h3>
										Dirawat
									</div>
									<div class="col-md-4 text-center">
										<h3 class="text-success"><?php echo $positif->sembuh; ?></h3>
										Sembuh
									</div>
									<div class="col-md-4 text-center">
										<h3 class="text-success"><?php echo $positif->meninggal; ?></h3>
										Meninggal
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<small>*Last Update <?php echo tgl_full($gorontalo->create_at); ?></small>
						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-primary">
									<div class="panel-heading text-center" style="font-size:15pt;">Orang Dalam Pemantauan<br>(ODP)</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12 text-center">
												<h2 class="text-primary"><?php echo $gorontalo->total_odp; ?></h2>
												Total ODP
											</div>
											<div class="col-md-6 text-center">
												<h3 class="text-primary"><?php echo $gorontalo->pro_pemantauan; ?></h3>
												<small>Proses Pemantauan</small>
											</div>
											<div class="col-md-6 text-center">
												<h3 class="text-primary"><?php echo $gorontalo->sel_pemantauan; ?></h3>
												<small>Selesai Pemantauan</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel panel-primary">
									<div class="panel-heading text-center" style="font-size:15pt;">Pasien Dalam Pengawasan<br>(PDP)</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12 text-center">
												<h2 class="text-primary"><?php echo $gorontalo->total_pdp; ?></h2>
												Total PDP
											</div>
											<div class="col-md-6 text-center">
												<h3 class="text-primary"><?php echo $gorontalo->dirawat; ?></h3>
												<small>Proses Pengawasan</small>
											</div>
											<div class="col-md-6 text-center">
												<h3 class="text-primary"><?php echo $gorontalo->sehat; ?></h3>
												<small>Selesai Pengawasan</small>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="col-md-12">
						*Data kasus terkonfirmasi COVID-19 adalah data yang telah diumumkan secara resmi oleh Kementerian Kesehatan RI.
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="container">
	<section class="margin-top margin-bottom">
		<h2 class="section-title">Sebaran Kasus di Kota Gorontalo</h2>
		<div class="row">
			<div class="col-md-6">
				<?php echo $map['html']; ?>
			</div>
			<div class="col-md-6">
				<h3>Detail Sebaran</h3>
				<hr>
				<div class="alert alert-info">Klik icon <img src="<?php echo base_url("assets_front/img/marker/covid.png"); ?>"> di maps. Untuk melihat detail sebaran Covid19 di Kota Gorontalo</div>
				<div id="detail_sebaran">
				</div>
			</div>
		</div>
	</section>

	<section class="css-section">
		<div class="jumbotron">
			<h1>Pemberitahuan...</h1>
			<p>Bapak/Ibu yang baru saja tiba dari luar daerah atau luar negeri,
				mohon untuk mengisi link dibawah ini dan yang mempunyai kenalan atau
				keluarga mohon untuk dishare. Kami mohon untuk tidak disalah gunakan..</p>
			<p><a href="https://forms.gle/UyQ9t4e72psHcwbq5" class="btn btn-ar btn-primary btn-lg" role="button">Klik Disini.</a></p>
		</div>
	</section>
</div>

<section class="container margin-bottom">
	<div class="row">
		<div class="col-md-8 col-sm-12">
			<section class="margin-bottom">
				<h2 class="section-title">Lawan HOAX <a href="<?php echo site_url("frontend/lawanhoax"); ?>" class="pull-right btn">Selengkapnya...</a></h2>
				<?php foreach ($hoax as $ho) { ?>
					<div class="media">
						<a class="pull-left" href="<?php echo site_url("frontend/detail_hoax/" . $ho->id_hoax); ?>">
							<img class="media-object" src="<?php echo base_url("uploads/hoax/thumb/" . $ho->gambar); ?>" alt="...">
						</a>
						<div class="media-body">
							<a href="<?php echo site_url("frontend/detail_hoax/" . $ho->id_hoax); ?>">
								<h4 class="media-heading"><?php echo $ho->judul; ?></h4>
							</a>
							<small><i class="fa fa-calendar"></i> <?php echo tgl_indonesia($ho->create_at); ?></small>
							<p align="justify">
								<?php echo $ho->isi_ringkas; ?>
							</p>
						</div>
					</div>
				<?php } ?>
			</section>
		</div>
		<div class="col-md-4 col-sm-12">
			<div id="gpr-kominfo-widget-container"></div>
		</div>
	</div>
</section>

<section class="margin-bottom">
	<div class="container">
		<h1 class="text-center primary-color margin-bottom">Tentang <strong>COVID-19</strong></h1>
		<div class="row">
			<div class="col-md-6">
				<h2 class="no-margin-top">Apa Itu COVID-19</h2>
				<p>
					Pneumonia Coronavirus Disease 2019 atau COVID-19 adalah penyakit peradangan paru yang disebabkan oleh
					Severe Acute Respiratory Syndrome Coronavirus 2 (SARS-CoV-2). Gejala klinis yang muncul beragam,
					mulai dari seperti gejala flu biasa (batuk, pilek, nyeri tenggorok, nyeri otot, nyeri kepala)
					sampai yang berkomplikasi berat (pneumonia atau sepsis).
				</p>

				<br>

				<h2 class="no-margin-top">Bagaimana COVID-19 Menular?</h2>
				<p>
					Cara penularan SARS-CoV-2 penyebab COVID-19 ialah melalui kontak dengan droplet saluran napas penderita.
					Droplet merupakan partikel kecil dari mulut penderita yang mengandung kuman penyakit, yang dihasilkan pada
					saat batuk, bersin, atau berbicara. Droplet dapat melewati sampai jarak tertentu (biasanya 1 meter).
				</p>

				<p>
					Droplet bisa menempel di pakaian atau benda di sekitar penderita pada saat batuk atau bersin. Namun,
					partikel droplet cukup besar sehingga tidak akan bertahan atau mengendap di udara dalam waktu yang lama.
					Oleh karena itu, orang yang sedang sakit, diwajibkan untuk menggunakan masker untuk mencegah penyebaran droplet.
					Untuk penularan melalui makanan, sampai saat ini belum ada bukti ilmiahnya.
				</p>
			</div>
			<div class="col-md-6">
				<img src="<?php echo base_url("assets_front/img/c.jpg"); ?>">

			</div>


		</div>

		<hr>
		<h1 class="text-center primary-color margin-bottom margin-top" style="margin-top:100px;">Melindungi diri dari <strong>COVID-19</strong></h1>
		<p class="lead lead-sm text-center">Ada beberapa hal yang dapat Anda lakukan untuk mencegah atau membantu<br>menghentikan penyebaran coronavirus, antara lain:</p>
		<div class="row">
			<div class="col-md-12">
				<p class="text-center">
				<h1 class="text-center primary-color margin-bottom margin-top" style="margin-top:100px;">Hal Yang Harus Dilakukan</h1>
				<div class="tdd">
					<img src="<?php echo base_url("assets_front/img/tdd1.png"); ?>">
					<img src="<?php echo base_url("assets_front/img/tdd2.png"); ?>">
					<img src="<?php echo base_url("assets_front/img/tdd3.png"); ?>">
					<img src="<?php echo base_url("assets_front/img/tdd4.png"); ?>">
					<img src="<?php echo base_url("assets_front/img/tdd5.png"); ?>">
				</div>
				</p>
			</div>

			<div class="col-md-12">
				<p class="text-center">
				<h1 class="text-center primary-color margin-bottom margin-top" style="margin-top:100px;">Hal Yang Tidak Boleh Dilakukan</h1>
				<div class="ntd">
					<img src="<?php echo base_url("assets_front/img/ntd1.png"); ?>">
					<img src="<?php echo base_url("assets_front/img/ntd2.png"); ?>">
					<img src="<?php echo base_url("assets_front/img/ntd3.png"); ?>">
					<img src="<?php echo base_url("assets_front/img/ntd4.png"); ?>">
				</div>
				</p>
				<br>
				<p class="text-center">
					<a href="<?php echo site_url("frontend/faq") ?>" class="button button-glow button-border button-rounded button-primary">Lihat Juga: Pertanyaan Yang Sering Diajukan</a>
				</p>
			</div>
		</div>
	</div>
</section>


<section class="section-lines">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">Lakukan Hal Berikut Ini Jika Anda<br>Mengalami Gejala Mirip COVID-19</h1>
				<hr>
			</div>
			<div class="col-md-6">
				<ul class="list-unstyled petunjuk">
					<li class="animated bounceInLeft animation-delay-11"> Hubungi nomor layanan COVID-19 Kota Gorontalo di 0811 4310 1000</li>
					<li class="animated bounceInLeft animation-delay-13"> Kenakan masker (tipe masker bedah), dan ganti secara berkala, agar tidak menular ke orang lain</li>
					<li class="animated bounceInLeft animation-delay-15"> Batasi menerima tamu di rumah, hindari kontak langsung dengan tamu untuk mencegah penyebaran virus yang lebih luas</li>
				</ul>
			</div>
			<div class="col-md-6">
				<ul class="list-unstyled petunjuk">
					<li class="animated bounceInLeft animation-delay-11"> Tetap tinggal di rumah jaga jarak dengan orang lain termasuk anggota keluarga</li>
					<li class="animated bounceInLeft animation-delay-13"> Minta bantuan teman, anggota keluarga, atau layanan jasa lain untuk menyelesaikan urusan di luar rumah</li>
					<li class="animated bounceInLeft animation-delay-15"> Lakukan ini semua selama 14 hari untuk membantu mengurangi penyebaran virus</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<div class="container">

	<section class="margin-bottom">
		<h2 class="section-title">Infografik</h2>
		<div class="bxslider-controls">
			<span id="bx-prev4"></span>
			<span id="bx-next4"></span>
		</div>
		<ul class="bxslider" id="latest-works">
			<?php foreach ($infografik as $in) { ?>
				<li>
					<div class="img-caption-ar">
						<img src="<?php echo base_url("uploads/berita/" . $in->gambar); ?>" class="img-responsive" alt="Image">
						<div class="caption-ar">
							<div class="caption-content">
								<a href="<?php echo site_url("frontend/download/" . $in->id_berita); ?>" class="animated fadeInDown"><i class="fa fa-download"></i>Unduh</a>
								<h4 class="caption-title"><?php echo $in->judul ?></h4>
							</div>
						</div>
					</div>
				</li>
			<?php } ?>
		</ul>
	</section>

	<section class="margin-bottom">
		<h2 class="section-title">Dokumen <a href="<?php echo site_url("frontend/publikasi"); ?>" class="pull-right btn">Selengkapnya...</a></h2>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>Tanggal</th>
							<th>Judul</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($dokumen as $dok) { ?>
							<tr>
								<td><?php echo tgl_full($dok->create_at); ?></td>
								<td>
									<a href="<?php echo site_url("frontend/download/" . $in->id_berita); ?>">
										<?php echo $dok->judul; ?>
									</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>

	<section class="margin-bottom">
		<h2 class="section-title">Galeri Sosialisasi<a href="<?php echo site_url("frontend/galeri"); ?>" class="pull-right btn">Selengkapnya...</a></h2>
		<div class="bxslider-controls">
			<span id="bx-prev5"></span>
			<span id="bx-next5"></span>
		</div>
		<ul class="bxslider" id="bx5">
			<?php foreach ($galeri as $g) { ?>
				<li>
					<a href="#" class="thumbnail">
						<img src="<?php echo base_url("uploads/galeri/thumb/" . $g->gambar); ?>" class="img-responsive" alt="Image">
					</a>
				</li>
			<?php } ?>
		</ul>
	</section>

</div>