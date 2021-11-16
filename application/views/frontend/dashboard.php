<main>
	<section class="section-base section-full-width-right section-bottom-layer section-bottom-layer-color section-color">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<hr class="space-lg hidden-sm" />
					<hr class="space-sm" />
					<h1>
						Pantauan Covid-19 <br />Kota Gorontalo
					</h1>
					<p>
						Pastikan anda selalu mematuhi protokol kesehatan.
					</p>
					<hr class="space space-40" />
					<!-- <a href="#covid19" class="btn btn-sm btn-circle btn-border text-bold shadow-1 full-width-sm">Selengkapnya</a><span class="space"></span> -->
					<!-- <a class="btn-store" href="#"><img src="<?= base_url(); ?>assets_front/media/store-google.png" /></a>
						<a class="btn-store" href="#"><img src="<?= base_url(); ?>assets_front/media/store-apple.png" /></a> -->
					<hr class="space-lg" />
				</div>
				<div class="col-lg-6 align-right hidden-desktop">
					<img class="margin-23 width-min-900" src="<?= base_url(); ?>assets_front/img/undraw_empty_street_sfxm.svg" alt="Alternate Text" />
				</div>
			</div>
		</div>
	</section>
	<section id="covid19" class="section-base section-top-overflow">
		<div class="container">
			<div class="grid-list" data-columns="4" data-columns-md="2" data-columns-xs="1">
				<div class="grid-box">
					<div class="grid-item">
						<div class="cnt-box cnt-box-top-icon boxed">
							<i class="im-bar-chart"></i>
							<div class="caption">
								<p><?= titik_angka($kasus); ?></p>
								<span class="text-error">Jumlah Kasus</span>
							</div>
						</div>
					</div>
					<div class="grid-item">
						<div class="cnt-box cnt-box-top-icon boxed">
							<i class="im-depression" style="color:black"></i>
							<div class="caption">
								<p><?= titik_angka($aktif->jumlah); ?></p>
								<span>Aktif</span>
							</div>
						</div>
					</div>
					<div class="grid-item">
						<div class="cnt-box cnt-box-top-icon boxed">
							<i class="im-crying" style="color: red;"></i>
							<div class="caption">
								<p><?= titik_angka($meninggal); ?></p>
								<span>Meninggal</span>
							</div>
						</div>
					</div>
					<div class="grid-item">
						<div class="cnt-box cnt-box-top-icon boxed">
							<i class="im-happy" style="color:green;"></i>
							<div class="caption">
								<p><?= titik_angka($sembuh); ?></p>
								<span>Sembuh</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a href="<?= site_url('pasien-covid'); ?>" class="btn btn-sm full-width-sm">Selengkapnya.</a>
			<hr class="space-lg" />
			<div class="row">
				<div class="container">
					<h2 class="align-center">Tentang Covid 19</h2>
					<p class="align-center width-650">
						Pneumonia Coronavirus Disease 2019 atau COVID-19 adalah penyakit peradangan paru yang disebabkan oleh Severe Acute Respiratory Syndrome Coronavirus 2 (SARS-CoV-2). Gejala klinis yang muncul beragam, mulai dari seperti gejala flu biasa (batuk, pilek, nyeri tenggorok, nyeri otot, nyeri kepala) sampai yang berkomplikasi berat (pneumonia atau sepsis).
					</p>
					<hr class="space" />
					<h3 class="align-center">Yang harus dilakukan &amp; Dihindari</h3>
					<div class="space-20"></div>
					<ul class="slider" data-options="type:carousel,perView:5,perViewSm:2,perViewXs:2,gap:1,nav:true,controls:out,autoplay:30000">
						<li>
							<img src="<?= base_url("assets_front/img/tdd1.png"); ?>" alt="">
						</li>
						<li>
							<img src="<?= base_url("assets_front/img/tdd2.png"); ?>" alt="">
						</li>
						<li>
							<img src="<?= base_url("assets_front/img/tdd3.png"); ?>" alt="">
						</li>
						<li>
							<img src="<?= base_url("assets_front/img/tdd4.png"); ?>" alt="">
						</li>
						<li>
							<img src="<?= base_url("assets_front/img/tdd5.png"); ?>" alt="">
						</li>
						<li>
							<img src="<?= base_url("assets_front/img/ntd1.png"); ?>" alt="">
						</li>
						<li>
							<img src="<?= base_url("assets_front/img/ntd2.png"); ?>" alt="">
						</li>
						<li>
							<img src="<?= base_url("assets_front/img/ntd3.png"); ?>" alt="">
						</li>
						<li>
							<img src="<?= base_url("assets_front/img/ntd4.png"); ?>" alt="">
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="section-image light" style="background-image:url(assets_front/media/bg.svg)">
		<div class="container">
			<h2 class="align-center">Ketersedian Tempat Tidur</h2>
			<hr class="space-10" />
			<table class="table table-grid table-border align-left no-padding-y table-md-4">
				<tbody>
					<tr>
						<?php foreach ($tempat_tidur as $tt) : ?>
							<td>
								<div class="counter counter-horizontal counter-icon">
									<div>
										<h3><?= $tt->nama_tempat_rawat; ?></h3>
										<div class="value text-lg">
											<span data-to="<?= ($tt->kuota - $tt->digunakan); ?>" data-speed="3000"><?= titik_angka($tt->kuota - $tt->digunakan); ?></span>
											<span class="text-md"><i class="im-hospital"></i></span>
										</div>
									</div>
								</div>
							</td>
						<?php endforeach; ?>
					</tr>
				</tbody>
			</table>
		</div>
	</section>

	<section class="section-base section-color section-bottom-layer section-full-width-left">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<img class="margin-23 width-min-835" src="<?= base_url(); ?>assets_front/img/undraw_medical_research_qg4d.svg" alt="Alternate Text" />
				</div>
				<div class="col-lg-8">
					<h2>
						Lakukan Hal Berikut Ini Jika Anda
						Mengalami Gejala Mirip COVID-19
					</h2>
					<hr class="space-sm" />
					<ul class="accordion-list">
						<li>
							<a>Hubungi nomor layanan COVID-19 Kota Gorontalo di 0811 4310 1000</a>
						</li>
						<li>
							<a>Kenakan masker (tipe masker bedah), dan ganti secara berkala, agar tidak menular ke orang lain</a>
						</li>
						<li>
							<a>Batasi menerima tamu di rumah, hindari kontak langsung dengan tamu untuk mencegah penyebaran virus yang lebih luas</a>
						</li>
						<li>
							<a>Tetap tinggal di rumah jaga jarak dengan orang lain termasuk anggota keluarga</a>
						</li>
						<li>
							<a>Minta bantuan teman, anggota keluarga, atau layanan jasa lain untuk menyelesaikan urusan di luar rumah</a>
						</li>
						<li>
							<a>
								Lakukan ini semua selama 14 hari untuk membantu mengurangi penyebaran virus
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section id="vaksinasi" class="section-base">
		<div class="container">
			<h2 class="align-center">Pantauan Vaksinasi Kota Gorontalo.</h2>
			<p class="align-center width-650">

			</p>
			<hr class="space" />
			<div class="row">
				<div class="col-lg-4">
					<div class="counter counter-horizontal counter-icon">
						<i class="im-medicine text-lg"></i>
						<div>
							<h3>Dosis 1</h3>
							<div class="value">
								<span class="text-md" data-to="<?= ($dosis1->jumlah > 0) ? $dosis1->jumlah : 0; ?>" data-speed="5000"><?= ($dosis1->jumlah > 0) ? titik_angka($dosis1->jumlah) : 0; ?></span>
								<span>Orang</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="counter counter-horizontal counter-icon">
						<i class="im-medicine-2 text-lg"></i>
						<div>
							<h3>Dosis 2</h3>
							<div class="value">
								<span class="text-md" data-to="<?= ($dosis2->jumlah > 0) ? $dosis2->jumlah : 0; ?>" data-speed="5000"><?= ($dosis2->jumlah > 0) ? titik_angka($dosis2->jumlah) : 0; ?></span>
								<span>Orang</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="counter counter-horizontal counter-icon">
						<i class="im-medicine-3 text-lg"></i>
						<div>
							<h3>Dosis 3</h3>
							<div class="value">
								<span class="text-md" data-to="<?= (!empty($dosis3)) ? $dosis3->jumlah : "0"; ?>" data-speed="5000"><?= (!empty($dosis3)) ? titik_angka($dosis3->jumlah) : "0"; ?></span>
								<span>Orang</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if (!empty($jadwal)) : ?>
				<hr />
				<div class="row">
					<div class="col-lg-8 order-md-last">
						<ul class="slider controls-bottom-right" data-options="type:carousel,arrows:true,nav:true,perView:1,perViewSm:1,controls:out">
							<?php foreach ($jadwal as $jad) : ?>
								<li>
									<div class="cnt-box cnt-box-testimonials">
										<i class="im-calendar text-lg"></i>
										<?= htmlspecialchars_decode(substr($jad->keterangan, 0, 100)) . "..."; ?>
										<p class="testimonial-info">
											<span><i class="im-location-2"></i> <?= $jad->tempat; ?></span>
											<span>
												<i class="im-calendar-3"></i>
												<?= ($jad->lama == "1") ? tgl_laporan($jad->tanggal) : tgl_laporan($jad->tanggal) . " - " . tgl_laporan(date('Y-m-d', strtotime("+" . ($jad->lama - 1) . " day", strtotime($jad->tanggal)))); ?>
												&nbsp;
												<i class="im-timer"></i>
												<?= substr($jad->dari_jam, 0, 5); ?> - <?= ($jad->sampai_jam === NULL) ? 'Selesai' : substr($jad->sampai_jam, 0, 5); ?>
											</span>
										</p>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="col-lg-4 order-md-first">
						<h2>Jadwal Vaksinasi.</h2>
					</div>
				</div>
			<?php endif; ?>
			<hr />
			<a href="<?= site_url('vaksinasi'); ?>" class="btn btn-sm full-width-sm">Selengkapnya.</a>
			<!-- <hr class="space hidden-xs"> -->
		</div>
	</section>

	<section id="infografik" class="section-base section-color">
		<div class="container">
			<h2 class="align-center">Infografik.</h2>
			<p class="align-center width-650">
				Informasi Terbaru dari Penanganan Covid-19 di Kota Gorontalo
			</p>
			<hr class="space" />
			<ul class="slider slider-zoom-center" data-options="type:carousel,perView:5,perViewMd:3,perViewSm:1,focusAt:center,gap:10,nav:true,controls:out,autoplay:3000">
				<?php foreach ($infografik as $info) : ?>
					<li>
						<a class="img-box lightbox icon-photo" href="<?= base_url("uploads/berita/" . $info->gambar); ?>" data-lightbox-anima="fade-top">
							<img src="<?= base_url("uploads/berita/" . $info->gambar); ?>" alt="">
							<i class="im-instagram"></i>
						</a>
					</li>
				<?php endforeach; ?>
				<!-- <li>
					<a class="img-box lightbox icon-photo" href="http://via.placeholder.com/800x600" data-lightbox-anima="fade-top">
						<img src="http://via.placeholder.com/800x600" alt="">
						<i class="im-instagram"></i>
					</a>
				</li> -->
			</ul>
		</div>
	</section>

	<section id="faq" class="section-base">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h2>FAQ<br />Seputar Penanganan Covid-19 di Kota Gorontalo.</h2>
				</div>
				<div class="col-lg-4">
					<ul class="accordion-list">
						<?php $no = 1;
						foreach ($faq as $f) :
							if ($no > 3) break;
						?>
							<li>
								<a href="#"><?= $f->judul; ?></a>
								<div class="content">
									<p>
										<?= $f->jawaban ?>
									</p>
								</div>
							</li>
						<?php $no++;
						endforeach; ?>
					</ul>
				</div>
				<div class="col-lg-4">
					<ul class="accordion-list">
						<?php
						$no1 = 1;
						foreach ($faq as $f) :
							$no1++;
							if ($no1 < 5) {
								continue;
							}
						?>
							<li>
								<a href="#"><?= $f->judul; ?></a>
								<div class="content">
									<p>
										<?= $f->jawaban ?>
									</p>
								</div>
							</li>
						<?php
							if ($no1 == "7") {
								break;
							}
						endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
</main>
<i class="scroll-top-btn scroll-top show"></i>