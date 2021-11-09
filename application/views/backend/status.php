<div class="row-fluid">
<?php
	$aksi	=	get_value("a");
	$id		=	get_value("id");
	switch($aksi){
		case "add":
			// echo "add page";
?>
	<div class="span12">
		<div class="widget-box">
			<div class="widget-header">
				<h4><i class="icon-plus"></i> Tambah <?php echo $label; ?></h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<form class="form-horizontal" action="<?php echo site_url($base."/tambah_aksi"); ?>" method="POST" autocomplete="off"/>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Status</label>

								<div class="controls">
									<input type="text" class="span12" id="form-field-1" name="nama" placeholder="Nama Status" required/>
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
						<form class="form-horizontal" action="<?php echo site_url($base."/perbarui_aksi"); ?>" method="POST" autocomplete="off"/>
							<input type="hidden" class="span12" id="form-field-1" name="id" value="<?php echo $row->$ket[0]; ?>"/>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama <?php echo $label; ?></label>

								<div class="controls">
									<input type="text" class="span12" id="form-field-1" name="nama" placeholder="Nama Status" value="<?php echo $row->$ket[1]; ?>" required/>
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
									<th>Nama Status</th>
									<th>Aksi</th>
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
									<td><?php echo $d->$ket[1]; ?></td>
									<td>
										<a class="btn btn-inverse btn-mini" href="?a=edit&id=<?php echo $d->$ket[0]; ?>">Edit</a>
									</td>
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