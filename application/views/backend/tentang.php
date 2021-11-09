<div class="row-fluid">
<?php
	$aksi	=	get_value("a");
	$id		=	get_value("id");
	$notif = $this->session->flashdata("notifikasi");
	if(!empty($notif)){
		echo get_notif($notif['status'],$notif['pesan']);
	}
	switch($aksi){
		default:
?>
	<div class="span12">
		<div class="widget-box">
			<div class="widget-header">
				<h4><i class="icon-pencil"></i> Edit Tentang</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<form class="form-horizontal" action="<?php echo site_url($base."/perbarui_aksi"); ?>" method="POST" autocomplete="off"/>
							<input type="hidden" class="span12" id="form-field-1" name="id" value="<?php echo $data->id; ?>"/>
							<div class="control-group">
								<label class="control-label">Pajak (Rp,)</label>

								<div class="controls">
									<input type="text" class="span5" name="potongan" placeholder="Masukkan dalam satuan Rupiah. Maksimal 9999" value="<?php echo $data->potongan; ?>" required/>
									<small class="help-block">Jumlah ini akan di potong ketika melakukan transfer ke penyedia jasa.</small>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Nama Aplikasi</label>

								<div class="controls">
									<input type="text" class="span5" name="nama_aplikasi" placeholder="Nama Aplikasi" value="<?php echo $data->nama_aplikasi; ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Akronim</label>

								<div class="controls">
									<input type="text" class="span5" name="akronim" placeholder="Akronim" value="<?php echo $data->akronim; ?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Deskripsi Singkat</label>

								<div class="controls">
									<input type="text" class="span8" name="deskripsi_singkat" placeholder="Deskripsi Singkat" value="<?php echo $data->deskripsi_singkat; ?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Deskripsi</label>

								<div class="controls">
									<textarea name="deskripsi" class="span12"><?php echo $data->deskripsi; ?></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Alamat</label>

								<div class="controls">
									<input type="text" class="span12" name="alamat" placeholder="Alamat" value="<?php echo $data->alamat; ?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Telp</label>

								<div class="controls">
									<input type="text" class="span3" name="telp" placeholder="Telepon" value="<?php echo $data->telp; ?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Email</label>

								<div class="controls">
									<input type="email" class="span5" name="email" placeholder="Email" value="<?php echo $data->email; ?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">No Rekenig</label>

								<div class="controls">
									<input type="text" class="span5" name="no_rekening" placeholder="No. Rekenig" value="<?php echo $data->no_rekening; ?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Nama Rekenig</label>

								<div class="controls">
									<input type="text" class="span5" name="nama_rekening" placeholder="Nama Rekenig" value="<?php echo $data->nama_rekening; ?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">BANK Rekenig</label>

								<div class="controls">
									<input type="text" class="span2" name="bank_rekening" placeholder="BANK Rekenig" value="<?php echo $data->bank_rekening; ?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Versi Aplikasi</label>

								<div class="controls">
									<input type="text" class="span2" name="versi_aplikasi" placeholder="Versi Aplikasi" value="<?php echo $data->versi_aplikasi; ?>"/>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="input-prepend">
										<span class="add-on">
											<i class="icon-facebook"></i>
										</span>

										<input class="span12" type="text" name="facebook" value="<?php echo $data->facebook; ?>"/>
									</div>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="input-prepend">
										<span class="add-on">
											<i class="icon-twitter"></i>
										</span>

										<input class="span12" type="text" name="twitter" value="<?php echo $data->twitter; ?>"/>
									</div>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="input-prepend">
										<span class="add-on">
											<i class="icon-instagram"></i>
										</span>

										<input class="span12" type="text" name="instagram" value="<?php echo $data->instagram; ?>"/>
									</div>
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
	}
?>