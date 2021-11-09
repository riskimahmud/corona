<div class="row-fluid">
<?php
	$aksi	=	get_value("a");
	$id		=	get_value("id");
	switch($aksi){
		case "add":
			// echo "add page";
			$data   =   $this->crud_model->select_one_order("positif","id_positif","DESC");
?>
	<div class="span12">
		<div class="widget-box">
			<div class="widget-header">
				<h4><i class="icon-plus"></i> Update <?php echo $label; ?></h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<form class="form-horizontal" action="<?php echo site_url($base."/tambah_aksi"); ?>" method="POST" enctype="multipart/form-data" autocomplete="off"/>
							<div class="control-group">
								<label class="control-label">Update Tanggal</label>

								<div class="controls">
									<div class="row-fluid">
										<div class="span3">
											<div class="control-group">
												<div class="row-fluid input-append">
													<input class="span12 date-picker" name="tgl_update" id="id-date-picker-1" type="text" value="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd" required/>
													<span class="add-on">
														<i class="icon-calendar"></i>
													</span>
												</div>
											</div>
										</div>
									
										<div class="span1 text-right">Jam</div>
										<div class="span4">
											<div class="control-group">
												<div class="input-append bootstrap-timepicker">
													<input id="timepicker1" type="text" name="jam_update" class="input-small" required/>
													<span class="add-on">
														<i class="icon-time"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Positif</label>

								<div class="controls">
									<input type="number" class="span4" name="positif" placeholder="Positif" value="<?php echo $data->positif; ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Dirawat</label>

								<div class="controls">
									<input type="number" class="span4" name="dirawat" placeholder="Dirawat" value="<?php echo $data->dirawat; ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Sembuh</label>

								<div class="controls">
									<input type="number" class="span4" name="sembuh" placeholder="Sembuh" value="<?php echo $data->sembuh; ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Meninggal</label>

								<div class="controls">
									<input type="number" class="span4" name="meninggal" placeholder="Meninggal" value="<?php echo $data->meninggal; ?>" required/>
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
		
		case "edit":
			$row	=	ambil_data_by_id_row($tabel,$key,$id);
?>
	<div class="span12">
		<div class="widget-box">
			<div class="widget-header">
				<h4><i class="icon-pencil"></i> Edit <?php echo $label; ?></h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<form class="form-horizontal" action="<?php echo site_url($base."/perbarui_aksi"); ?>" method="POST" enctype="multipart/form-data" autocomplete="off"/>
							<input type="hidden" class="span12" id="form-field-1" name="id" value="<?php echo $row->id_berita; ?>"/>
							<div class="control-group">
								<label class="control-label">Gambar</label>

								<div class="controls">
									<input type="file" class="span12" name="gambar" placeholder="Pilih Gambar" accept="image/*"  required/>
									<span class="help-block">Kosongkan Jika Tidak Ingin Mengganti</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Judul</label>

								<div class="controls">
									<input type="text" class="span12" name="judul" placeholder="Judul" value="<?php echo $row->judul; ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Status</label>

								<div class="controls">
									<select class="span5" name="status">
										<option value="1" <?php if($row->status == "1"){ echo "selected='selected'"; } ?>>Publish</option>
										<option value="0" <?php if($row->status == "0"){ echo "selected='selected'"; } ?>>Hidden</option>
									</select>
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
									<th>Create At</th>
									<th>Positif</th>
									<th>Dirawat</th>
									<th>Sembuh</th>
									<th>Meninggal</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no	=	1;
									foreach($data as $d){
								?>
								<tr>
									<td>
										<?php echo $no; ?>
									</td>
									<td><?php echo tgl_full($d->create_at); ?></td>
									<td><?php echo $d->positif; ?></td>
									<td><?php echo $d->dirawat; ?></td>
									<td><?php echo $d->sembuh; ?></td>
									<td><?php echo $d->meninggal; ?></td>
								</tr>
								<?php
									$no++;
									}
								?>
							</tbody>
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