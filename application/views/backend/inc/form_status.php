<?php
	if($status == "5"){
		echo '<div class="alert alert-info">Silahkan Unggah Draft Fix</div>';
		echo '<div class="control-group">
					<label class="control-label" for="form-field-1">Tentang</label>

					<div class="controls">
						<input type="text" class="span12" name="tentang" placeholder="Tentang" required/>
					</div>
			  </div>';
		echo '<div class="control-group">
					<label class="control-label" for="form-field-1">Draft Fix</label>

					<div class="controls">
						<input type="file" class="span12" name="draft_fix" placeholder="Unggah" required/>
					</div>
			  </div>';
	}else{
		echo '<div class="alert alert-info">Silahkan Unggah File PDF</div>';
		echo '<div class="control-group">
					<label class="control-label" for="form-field-1">Nomor</label>

					<div class="controls">
						<input type="text" class="span12" name="nomor" placeholder="Nomor" required/>
					</div>
			  </div>';
		echo '<div class="control-group">
					<label class="control-label" for="form-field-1">Tahun</label>

					<div class="controls">
						<input type="text" class="span12" name="tahun" placeholder="Tahun" required/>
					</div>
			  </div>';
		echo '<div class="control-group">
					<label class="control-label" for="form-field-1">File PDF</label>

					<div class="controls">
						<input type="file" class="span12" name="pdf" placeholder="Unggah" accept=".pdf" required/>
					</div>
			  </div>';
		?>
		<div class="control-group">
			<label class="control-label" for="form-field-1">Keterangan</label>

			<div class="controls">
				<select name="keterangan" class="span12">
					<?php foreach($keterangan as $ket){ ?>
					<option value="<?php echo $ket->id_keterangan; ?>"><?php echo $ket->nama_keterangan; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<?php
	}
?>