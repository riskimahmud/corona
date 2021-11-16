<div class="row-fluid">
	<div class="span12">
		<div class="alert alert-block alert-success">

			<i class="icon-home green"></i>

			Selamat Datang
			<strong class="green">
				Di Aplikasi Pemantauan COVID-19 Kota Gorontalo
			</strong>
			<?php //echo get_userdata_apk('deskripsi_singkat'); 
			?>
		</div>

		<div class="space-6"></div>

		<div class="row-fluid">
			<div class="span7">
				<h3>Statistik Pasien Covid19 <i class="icon-bar-chart"></i></h3>
				<div class="infobox-container">
					<div class="infobox infobox-black">
						<div class="infobox-icon">
							<i class="icon-meh"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?= titik_angka($aktif); ?></span>
							<div class="infobox-content">Kasus Aktif</div>
						</div>
					</div>
					<div class="infobox infobox-red">
						<div class="infobox-icon">
							<i class="icon-frown"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?= titik_angka($meninggal); ?></span>
							<div class="infobox-content">Meninggal</div>
						</div>
					</div>
					<div class="infobox infobox-green">
						<div class="infobox-icon">
							<i class="icon-smile"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?= titik_angka($sembuh); ?></span>
							<div class="infobox-content">Sembuh</div>
						</div>
					</div>
					<div class="infobox infobox-blue">
						<div class="infobox-icon">
							<i class="icon-bar-chart"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?= titik_angka($kasus); ?></span>
							<div class="infobox-content">Jumlah Kasus</div>
						</div>
					</div>
				</div>
				<hr>
				<h3>Statistik Vaksinasi <i class="icon-bar-chart"></i></h3>
				<div class="infobox-container">
					<div class="infobox infobox-green">
						<div class="infobox-icon">
							<i class="icon-medkit"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?= titik_angka($dosis1->jumlah); ?></span>
							<div class="infobox-content">Dosis 1</div>
						</div>
					</div>
					<div class="infobox infobox-blue">
						<div class="infobox-icon">
							<i class="icon-medkit"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?= titik_angka($dosis2->jumlah); ?></span>
							<div class="infobox-content">Dosis 2</div>
						</div>
					</div>
					<div class="infobox infobox-purple">
						<div class="infobox-icon">
							<i class="icon-medkit"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?= titik_angka($dosis3->jumlah); ?></span>
							<div class="infobox-content">Dosis 3</div>
						</div>
					</div>
				</div>
			</div>

			<div class="span5">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-flat">
						<h4 class="lighter">
							<i class="icon-hospital danger"></i>
							Ketersedian Tempat Tidur
						</h4>

						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="icon-chevron-up"></i>
							</a>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>
											FasKes
										</th>

										<th>
											Kuota / Digunakan
										</th>
									</tr>
								</thead>

								<tbody>
									<?php foreach ($tempat_tidur as $tt) : ?>
										<tr>
											<td><?= $tt->nama_tempat_rawat; ?></td>
											<td>
												<?= $tt->kuota . " / " . $tt->digunakan; ?>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>