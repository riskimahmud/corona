<option value="0">Semua</option>
<?php
	foreach($data as $d){
?>
<option value="<?php echo $d->id_kelurahan; ?>"><?php echo $d->nama_kelurahan; ?></option>
<?php
	}
?>