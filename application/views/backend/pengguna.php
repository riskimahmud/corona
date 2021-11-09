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
				<h4><i class="icon-plus"></i> Tambah User</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<form class="form-horizontal" action="<?php echo site_url($base."/tambah_aksi"); ?>" method="POST" autocomplete="off"/>
							<div class="control-group">
								<label class="control-label" for="form-field-1">SKPD</label>

								<div class="controls">
									<input type="text" class="span12" id="form-field-1" name="nama" placeholder="SKPD" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Username</label>

								<div class="controls">
									<input type="text" class="span12" id="form-field-1" name="username" placeholder="Username" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Password</label>

								<div class="controls">
									<input type="password" class="span12" id="form-field-1" name="password" placeholder="Password" required/>
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
				<h4><i class="icon-pencil"></i> Edit User</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<form class="form-horizontal" action="<?php echo site_url($base."/perbarui_aksi"); ?>" method="POST" autocomplete="off"/>
							<input type="hidden" class="span12" id="form-field-1" name="id" value="<?php echo $row->id; ?>"/>
							<div class="control-group">
								<label class="control-label" for="form-field-1">SKPD</label>

								<div class="controls">
									<input type="text" class="span12" id="form-field-1" name="nama" placeholder="SKPD" value="<?php echo $row->nama; ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Username</label>

								<div class="controls">
									<input type="text" class="span12" id="form-field-1" name="username" placeholder="Username" value="<?php echo $row->username; ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Password</label>

								<div class="controls">
									<input type="password" class="span12" id="form-field-1" name="password" placeholder="Password"/>
									<span class="help-block">Kosongkan jika tidak ingin mengganti.</span>
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
				<h4><i class="icon-list"></i> Daftar User</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>SKPD</th>
									<th>Username</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no	=	1;
									foreach($data as $d){
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $d->nama; ?></td>
									<td><?php echo $d->username; ?></td>
									<td>
										<div class="btn-group">
											<a class="btn btn-inverse btn-mini" href="?a=edit&id=<?php echo $d->id; ?>">Edit</a>
											<a class="btn btn-danger btn-mini" href="<?php echo site_url($base."hapus/".$d->id); ?>">Hapus</a>
										</div>
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