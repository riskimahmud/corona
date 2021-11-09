<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-header">
				<h4><i class="icon-pencil"></i>Profil</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<form class="form-horizontal" action="<?php echo site_url($base."/simpan_profil"); ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
							<input type="hidden" name="id_user" value="<?php echo $data->id; ?>"/>
							<div class="control-group">
								<label class="control-label">SKPD</label>

								<div class="controls">
									<input type="text" class="span12" name="nama" value="<?php echo $data->nama; ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Username</label>

								<div class="controls">
									<input type="text" class="span12" name="username" value="<?php echo $data->username; ?>" required/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Password</label>

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
</div>
<script>
	function ambil_kelurahan(id_kecamatan){
		$.ajax({
		  url		: 	"<?= site_url($base."/ambil_kelurahan")?>",
		  data		: 	'id_kecamatan='+id_kecamatan,
		  type		:	"POST",
		  success	: function(html){
			$("#kelurahan").html(html);
		  }
		});
	}
</script>