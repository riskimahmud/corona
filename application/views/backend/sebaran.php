<div class="row-fluid">
	<?php
	$aksi	=	get_value("a");
	$id		=	get_value("id");
	switch ($aksi) {
		case "edit":
			$row	=	ambil_data_by_id_row($tabel, $key, $id);
	?>
			<div class="span12">
				<div class="widget-box">
					<div class="widget-header">
						<h4><i class="icon-pencil"></i> Update <?php echo $label; ?> <?= $row->kecamatan; ?></h4>
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div class="row-fluid">
								<form class="form-horizontal" action="<?php echo site_url($base . "/perbarui_aksi"); ?>" method="POST" autocomplete="off" />
								<input type="hidden" class="span12" id="form-field-1" name="id" value="<?php echo $row->id_sebaran; ?>" />
								<div class="control-group">
									<label class="control-label">Positif</label>

									<div class="controls">
										<input type="text" class="span2" name="positif" placeholder="Positif" value="<?php echo $row->positif; ?>" required autofocus />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Aktif</label>

									<div class="controls">
										<input type="text" class="span2" name="aktif" placeholder="Aktif" value="<?php echo $row->aktif; ?>" required />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Sembuh</label>

									<div class="controls">
										<input type="text" class="span2" name="sembuh" placeholder="Sembuh" value="<?php echo $row->sembuh; ?>" required />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Meninggal</label>

									<div class="controls">
										<input type="text" class="span2" name="meninggal" placeholder="Meninggal" value="<?php echo $row->meninggal; ?>" required />
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-small btn-inverse">
										Simpan
										<i class="icon-arrow-right icon-on-right bigger-110"></i>
									</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
			break;

		default:
		?>
			<div class="span12">

				<div class="row-fluid">
					<h5>Waktu Update</h5>
					<form class="form-inline" method="POST" action="<?php echo site_url($base . "/waktu_update"); ?>">
						<div class="control-group span3">
							<div class="row-fluid input-append">
								<input class="date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" value="<?= substr($waktu->last_update, 0, 10); ?>" name="tanggal" />
								<span class="add-on">
									<i class="icon-calendar"></i>
								</span>
							</div>
						</div>
						<div class="control-group span2">
							<div class="input-append bootstrap-timepicker">
								<input id="timepicker1" type="text" class="input-small" value="<?= substr($waktu->last_update, 11, 5); ?>" name="jam" />
								<span class="add-on">
									<i class="icon-time"></i>
								</span>
							</div>
						</div>
						<button class="btn btn-info btn-small">
							<i class="icon-save bigger-110"></i>
							Simpan
						</button>
					</form>
				</div>

				<div class="widget-box">
					<div class="widget-header">
						<h4><i class="icon-list"></i> Daftar <?php echo $label; ?></h4>
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div class="row-fluid">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>No.</th>
											<th>Kecamatan</th>
											<th>Konfirmasi Positif</th>
											<th>Aktif</th>
											<th>Sembuh</th>
											<th>Meninggal</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no	=	1;
										foreach ($data as $d) {
											$pos[]	=	$d->positif;
											$aktif[]	=	$d->aktif;
											$sembuh[]	=	$d->sembuh;
											$meninggal[]	=	$d->meninggal;
										?>
											<tr>
												<td>
													<?php echo $no; ?>
												</td>
												<td><?php echo $d->kecamatan; ?></td>
												<td><?php echo $d->positif; ?></td>
												<td><?php echo $d->aktif; ?></td>
												<td><?php echo $d->sembuh; ?></td>
												<td><?php echo $d->meninggal; ?></td>
												<td>
													<a class="btn btn-inverse btn-mini" href="?a=edit&id=<?php echo $d->id_sebaran; ?>">Edit</a>
												</td>
											</tr>
										<?php
											$no++;
										}
										?>
									</tbody>
									<tfoot>
										<tr style="background-color:black; color:white;">
											<th colspan="2">Total</th>
											<th><?php echo array_sum($pos); ?></th>
											<th><?php echo array_sum($aktif); ?></th>
											<th><?php echo array_sum($sembuh); ?></th>
											<th><?php echo array_sum($meninggal); ?></th>
											<th>Total</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>
<?php
			break;
	}
?>