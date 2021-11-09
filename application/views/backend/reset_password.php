<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-header">
				<h4><i class="icon-key"></i>Reset Password</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<form class="form-horizontal" action="<?php echo site_url($base."/ganti_sandi_aksi"); ?>" method="POST" autocomplete="off">
							<input type="hidden" name="id_user" value="<?php echo $data->id; ?>"/>
							<div class="control-group">
								<label class="control-label">Password Lama</label>

								<div class="controls">
									<input type="hidden" name="tmp_pass" value="<?php echo $data->password; ?>" required/>
									<input type="password" class="span5" name="pass_lama" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Password Baru</label>

								<div class="controls">
									<input type="password" class="span5" name="pass_baru" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Ulangi Password</label>

								<div class="controls">
									<input type="password" class="span5" name="re_pass_baru" required/>
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
</div>