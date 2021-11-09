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
						<form class="form-horizontal" action="<?php echo site_url($base."/tambah_aksi"); ?>" method="POST" enctype="multipart/form-data" autocomplete="off"/>
							<div class="control-group">
								<label class="control-label">Judul</label>

								<div class="controls">
									<input type="text" class="span12" name="judul" placeholder="Judul" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Jawaban</label>

								<div class="controls">
									<textarea rows="5" class="span12" name="jawaban" placeholder="Jawaban" required></textarea>
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
							<input type="hidden" class="span12" id="form-field-1" name="id" value="<?php echo $row->id_faq; ?>"/>
							<div class="control-group">
								<label class="control-label">Judul</label>

								<div class="controls">
									<input type="text" class="span12" name="judul" placeholder="Judul" value="<?php echo $row->judul; ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Jawaban</label>

								<div class="controls">
									<textarea rows="5" class="span12" name="jawaban" placeholder="Jawaban" required><?php echo $row->jawaban; ?></textarea>
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
									<th>Judul</th>
									<th>Jawaban</th>
									<th>Create At</th>
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
									<td><?php echo $d->judul; ?></td>
									<td><?php echo $d->jawaban; ?></td>
									<td><?php echo tgl_indonesia($d->create_at); ?></td>
									<td>
										<a class="btn btn-inverse btn-mini" href="?a=edit&id=<?php echo $d->id_faq; ?>">Edit</a>
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