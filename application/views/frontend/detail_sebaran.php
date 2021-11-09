<hr>
<h1 class="margin-top text-center text-primary">
	Detail Penyebaran COVID-19<br><?php echo $data->kecamatan; ?>
</h1>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-danger-dark text-center text-danger">
			<div class="panel-body">
				<b style="font-size:25px; margin-top:10px; font-weight:bold; border-radius:100px;">
					<?= ($data->positif != "") ? $data->positif : "0"; ?>
				</b>
				<br>Konfirmasi
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-warning-dark text-center text-warning">
			<div class="panel-body">
				<b style="font-size:25px; margin-top:10px; font-weight:bold;">
					<?= ($data->aktif != "") ? $data->aktif : "0"; ?>
				</b>
				<br>Kasus Aktif
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-success-dark text-center text-success">
			<div class="panel-body">
				<b style="font-size:25px; margin-top:10px; font-weight:bold;">
					<?= ($data->sembuh != "") ? $data->sembuh : "0"; ?>
				</b>
				<br>Sembuh
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default text-center text-default">
			<div class="panel-body">
				<b style="font-size:25px; margin-top:10px; font-weight:bold;">
					<?= ($data->meninggal != "") ? $data->meninggal : "0"; ?>
				</b>
				<br>Meninggal
			</div>
		</div>
	</div>
</div>