<div class="uk-width-1-1">
	<div class="md-card uk-margin-medium-bottom">
		<div class="md-card-content">
			<div class="uk-alert">Cari penerima berdasarkan opsi dibawah ini.</div>
			<div class="uk-grid">
				<div class="uk-width-1-3">
					<div class="uk-form-row">
						<label>Calon Penerima</label>
						<select name="jenis" id="jenis" class="md-input">
							<option value="capen_lansia">Lanjut Usia Produktif</option>
							<option value="capen_disabilitas">Disabilitas</option>
							<option value="capen_balitar">Bayi Terlantar</option>
							<option value="capen_bpnt">Bantuan Pangan Non-Tunai</option>
						</select>
					</div>
				</div>
				<div class="uk-width-1-3">
					<div class="uk-form-row">
						<label>Kecamatan</label>
						<select name="kecamatan" id="kecamatan" class="md-input" onchange="ambil_kelurahan(this.value)">
							<option value="0">Semua</option>
							<?php foreach($kecamatan as $kec){ ?>
							<option value="<?php echo $kec->id_kecamatan; ?>"><?php echo $kec->nama_kecamatan; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="uk-width-1-3">
					<div class="uk-form-row">
						<label>Kelurahan</label>
						<select name="kelurahan" class="md-input" id="kelurahan">
							<option value="0">Semua</option>
						</select>
					</div>
				</div>
				<div class="uk-width-1-1">
					<br>
					<div class="uk-form-row">
						<button type="button" class="md-btn" onclick="cek_data()">Cek</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="box-data">
	</div>
</div>

<script>
	function ambil_kelurahan(kecamatan){
		$.ajax({
		  url		: 	"<?= site_url("laporan/ajax")?>",
		  data		: 	'fungsi=ambil_kelurahan&kecamatan='+kecamatan,
		  type		:	"POST",
		  success	: function(html){
			$("#kelurahan").html(html);
		  }
		});
	}
	
	function cek_data(){
		var	jenis			=	document.getElementById("jenis").value;
		var	kecamatan		=	document.getElementById("kecamatan").value;
		var	kelurahan		=	document.getElementById("kelurahan").value;
		$.ajax({
		  url		: 	"<?= site_url("laporan/ajax")?>",
		  data		: 	'fungsi=cek_capen&jenis='+jenis+'&kecamatan='+kecamatan+'&kelurahan='+kelurahan,
		  type		:	"POST",
		  beforeSend: function(html){
			$("#box-data").html('<div class="md-card uk-margin-medium-bottom"><div class="md-card-content"><i class="uk-icon-spinner uk-icon-medium uk-icon-spin"></i>&nbsp;&nbsp;Sedang Mengambil Data...</div></div>');
		  },
		  success	: function(html){
			$("#box-data").html(html);
		  }
		});
	}
</script>
