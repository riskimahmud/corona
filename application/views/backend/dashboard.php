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
	</div>
</div>

<div class="row-fluid">
	<div class="span6">
		<div class="widget-box">
			<div class="widget-header widget-header-flat widget-header-small">
				<h5>
					<i class="icon-group"></i>
					Pasien Covid19
				</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<div class="span4">
							<div class="alert alert-info lighter text-center">
								<h1 class="text-info"><?= count($aktif); ?></h1>
								<span>Kasus Aktif</span>
							</div>
						</div>
						<div class="space-10 hidden-desktop"></div>
						<div class="span4">
							<div class="alert alert-success lighter text-center">
								<h1 class="text-success"><?= count($sembuh); ?></h1>
								<span>Sembuh</span>
							</div>
						</div>
						<div class="space-10 hidden-desktop"></div>
						<div class="span4">
							<div class="alert alert-danger lighter text-center">
								<h1 class="text-danger"><?= count($meninggal); ?></h1>
								<span>Meninggal</span>
							</div>
						</div>
					</div>
					<div class="space-10"></div>
					<div class="row-fluid">
						<div class="span12">
							<div class="alert alert-info dark text-center">
								<h1 class="text-info"><?= count($kasus); ?></h1>
								<span>Jumlah Kasus</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="span6">
		<div class="widget-box">
			<div class="widget-header widget-header-flat widget-header-small">
				<h5>
					<i class="icon-medkit"></i>
					Vaksinasi
				</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<div class="span6">
							<div class="alert alert-info text-center">
								<h1 class="text-info"><?= $dosis1->jumlah; ?></h1>
								<span>Dosis 1</span>
							</div>
						</div>
						<div class="span6">
							<div class="alert alert-success text-center">
								<h1 class="text-success"><?= $dosis2->jumlah; ?></h1>
								<span>Dosis 2</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>