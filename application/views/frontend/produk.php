<section class="about" id="about" style="min-height:522px;">
    <div class="container">
		<h3 style="margin-top:0px;" class="text-center">
          Produk Hukum
        </h3>
		<hr>
		<button data-toggle="collapse" data-target="#demo" class="btn btn-primary btn-block btn-sm">Pencarian Spesifik</button>
		<div id="demo" class="col-md-12 collapse" style="border:1px solid blue;">
			<br>
				<form class="form-horizontal" action="<?php echo site_url("frontend/filter"); ?>" method="POST" autocomplete="off"/>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label">Kategori</label>
						<select class="form-control" name="kategori">
							<option value="0">- Pilih Kategori -</option>
							<?php 
								foreach($kategori as $k){ 
									if($k->id_kategori == "3"){ continue; }
							?>
							<option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label">Status</label>
						<select class="form-control" name="status">
							<option value="0">- Pilih Status -</option>
							<?php foreach($status as $s){ ?>
							<option value="<?php echo $s->id_keterangan; ?>"><?php echo $s->nama_keterangan; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label">Nomor</label>
						<input type="text" class="form-control" placeholder="Nomor" name="nomor" />
					</div>
					<div class="form-group">
						<label class="control-label">Tahun</label>
						<input type="text" class="form-control" placeholder="Tahun" name="tahun" />
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label">Tentang</label>
						<input type="text" class="form-control" placeholder="Tentang" name="tentang" />
					</div>
					<div class="form-group">
						<button class="btn btn-block btn-primary" type="submit">
							Cari
						</button>
					</div>
				</div>
			</div>
				</form>
		</div>
		<hr>
		<table class="table table-hover" style="font-size:13px;">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kategori</th>
					<th>Nomor / Tahun</th>
					<th>Tentang</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if(empty($data)){
						echo '<tr><td colspan="5">Tidak Ditemukan.</td></tr>';
					}else{
					$no = $this->uri->segment('3') + 1;
					foreach($data as $d){ 
				?>
				<tr onClick="top.location.href='<?php echo site_url("frontend/detail_produk/".$d->id); ?>'" style="cursor:pointer;">
					<td><?php echo $no; ?></td>
					<td><?php echo ambil_nama_by_id("kategori","nama_kategori","id_kategori",$d->kategori); ?></td>
					<td><?php echo $d->nomor." / ".$d->tahun; ?></td>
					<td><?php echo $d->tentang; ?></td>
					<td><?php echo ambil_nama_by_id("keterangan","nama_keterangan","id_keterangan",$d->ket); ?></td>
				</tr>
					<?php $no++; }} ?>
			</tbody>
		</table>
		<div class="pagination">
		<?php 
			echo $this->pagination->create_links();
		?>
		</div>
	</div>
</section>