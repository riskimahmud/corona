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
								<label class="control-label">Gambar</label>

								<div class="controls">
									<input type="file" class="span12" name="gambar" placeholder="Pilih Gambar" accept="image/*" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Judul</label>

								<div class="controls">
									<input type="text" class="span12" name="judul" placeholder="Judul" required/>
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
							<input type="hidden" class="span12" id="form-field-1" name="id" value="<?php echo $row->id_galeri; ?>"/>
							<div class="control-group">
								<label class="control-label">Gambar</label>

								<div class="controls">
									<input type="file" class="span12" name="gambar" placeholder="Pilih Gambar" accept="image/*">
									<span class="help-block">Kosongkan Jika Tidak Ingin Mengganti</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Judul</label>

								<div class="controls">
									<input type="text" class="span12" name="judul" placeholder="Judul" value="<?php echo $row->judul; ?>" required/>
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
						<ul class="ace-thumbnails">
							<?php foreach($data as $d){ ?>
							<li>
								<a href="<?php echo base_url("uploads/galeri/".$d->gambar); ?>" title="<?php echo $d->judul; ?>" data-rel="colorbox">
									<img alt="150x150" src="<?php echo base_url("uploads/galeri/thumb/".$d->gambar); ?>" width="300" />
									<div class="text">
										<div class="inner"><?php echo $d->judul; ?></div>
									</div>
								</a>

								<div class="tools tools-bottom">
									<a title="Edit" href="?a=edit&id=<?php echo $d->id_galeri; ?>">
										<i class="icon-pencil"></i>
									</a>

									<a title="Hapus" href="<?php echo site_url($base."/hapus/".$d->id_galeri); ?>" onclick="return confirm('Apakah anda yakin?')">
										<i class="icon-remove red"></i>
									</a>
								</div>
							</li>
							<?php } ?>
						</ul>
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