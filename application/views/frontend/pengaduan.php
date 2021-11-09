<section class="about" id="about" style="min-height:522px;">
    <div class="container">
		<h3 style="margin-top:0px;" class="text-center">
          Pengaduan
        </h3>
		<hr>
		<?php
			$notif = $this->session->flashdata("notifikasi");
			if(!empty($notif)){
				echo get_notif($notif['status'],$notif['pesan']);
			}
		?>
		<form action="<?php echo site_url("frontend/pengaduan_aksi"); ?>" method="post" role="form" class="form-horizontal" autocomplete="off">
			<div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Nama</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama" required/>
				  </div>
				  <div class="form-group">
					<label class="control-label">No. KTP</label>
					<input type="text" name="no_ktp" class="form-control" placeholder="Nomor KTP" required/>
				  </div>
				  <div class="form-group">
					<label class="control-label">No. Telp / HP</label>
					<input type="text" name="no_telp" class="form-control" placeholder="Nomor Telp" required/>
				  </div>
				  <div class="form-group">
					<label class="control-label">Pekerjaan</label>
					<input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" required/>
				  </div>
				  <div class="form-group">
					<label class="control-label">Alamat</label>
					<input type="text" name="alamat" class="form-control" placeholder="Alamat" required/>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Terlapor</label>
					<input type="text" name="terlapor" class="form-control" placeholder="Terlapor" required/>
				  </div>
				  <div class="form-group">
					<label class="control-label">Isi Aduan</label>
					<textarea name="isi_aduan" class="form-control" rows="12" required></textarea>
				  </div>
				</div>
				<div class="col-md-12">
					<button class="btn btn-block btn-primary" type="submit">
						Kirim
					</button>
				</div>
			</div>
		</form>
	</div>
</section>