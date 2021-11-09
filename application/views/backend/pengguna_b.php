<div class="row-fluid">
<?php
	$aksi	=	get_value("a");
	$id		=	get_value("id");
	switch($aksi){
		case "detail":
			$detail	=	ambil_data_by_id_row($tabel,$key,$id);
?>
	<div class="span6">
		<div class="widget-box">
			<div class="widget-header">
				<h4>
					<i class="icon-list"></i> 
					Detail <?php echo $title; ?>
				</h4>
				<div class="widget-toolbar">
					<?php 
						if($detail->status == "1"){ echo '<span class="label label-warning">Diverifikasi</span>'; } 
						else{ echo '<span class="label label-inverse">Belum Diverifikasi</span>'; }
					?>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<table class="table table-hover">
						<tr>
							<td>Nama</td>
							<td>:</td>
							<th>
								<?php echo $detail->nama; ?>
							</th>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<th>
								<?php echo $detail->email; ?>
							</th>
						</tr>
						<tr>
							<td>Telepon</td>
							<td>:</td>
							<th>
								<?php echo $detail->telp; ?>
							</th>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<th>
								<?php echo $detail->alamat; ?>
							</th>
						</tr>
						<tr>
							<td>Kelurahan</td>
							<td>:</td>
							<th>
								<?php echo ambil_nama_by_id("tb_kelurahan","nama_kelurahan","id_kelurahan",$detail->id_kelurahan); ?>
							</th>
						</tr>
						<tr>
							<td>Kecamatan</td>
							<td>:</td>
							<th>
								<?php echo ambil_nama_by_id("tb_kecamatan","nama_kecamatan","id_kecamatan",$detail->id_kecamatan); ?>
							</th>
						</tr>
					</table>
					<div class="row-fluid">
						<div class="span6">
							<?php 
								if($detail->poto == ""){ $poto = "assets/img/user-eparty.png"; }else{ 
									$poto = "uploads/poto_profil/".$detail->poto;
								}
							?>
							<div class="ace-thumbnails">
								<a href="<?php echo base_url($poto); ?>" title="Poto Profil" data-rel="colorbox">
									<img alt="150x150" src="<?php echo base_url($poto); ?>" />
								</a>
							</div>
						</div>
						<div class="span6">
							<?php
								if($detail->status == "0"){
							?>
							<form action="<?php echo site_url($base."/verifikasi"); ?>" method="post">
								<input type="hidden" name="id" value="<?php echo $detail->id_user; ?>">
								<button type="submit" class="btn btn-warning btn-block" onclick="return confirm('Apakah Anda Yakin?');">
									Verifikasi
								</button>
							</form>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if($detail->level == "2"){ ?>
	<div class="span6">
		<div class="widget-box">
			<div class="widget-header">
				<h4><i class="fa fa-map-marker"></i> Lokasi Di Google Maps</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<?php
							if($detail->lat == "" || $detail->lng == ""){
								echo '<div class="alert alert-danger">Lokasi belum diisi.</div>';
							}else{
						?>
						<ul class="ace-thumbnails">
							<?php foreach($gambar as $g){ ?>
							<li>
								<a href="<?php echo base_url("uploads/produk/".$g->gambar); ?>" title="Poto <?php echo $detail->nama_paket; ?>" data-rel="colorbox">
									<img alt="150x150" src="<?php echo base_url("uploads/produk/thumb/".$g->gambar); ?>" />
								</a>
							</li>
							<?php } ?>
						</ul>
						<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
<?php		
		break;
		
		default:
?>
	<div class="span12">
		<div class="widget-box">
			<div class="widget-header">
				<h4><i class="icon-list"></i> Daftar <?php echo $title ?></h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Status</th>
									<th>Nama</th>
									<th>Create</th>
									<th width="20%">Aksi</th>
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
									<td>
										<?php if($d->status == "1"){ echo '<span class="label label-warning">Diverifikasi</span>'; }else{ ?>
										<?php echo '<span class="label label-inverse">Pending</span>'; } ?>
									</td>
									<td><?php echo $d->nama; ?></td>
									<td><?php echo tgl_full($d->create_at); ?></td>
									<td>
										<div class="btn-group">
											<a class="btn btn-inverse btn-mini" href="?a=detail&id=<?php echo $d->id_user; ?>">Detail</a>
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