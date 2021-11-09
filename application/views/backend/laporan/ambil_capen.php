<div class="uk-width-1-1">
	<div class="md-card uk-margin-medium-bottom">
		<div class="md-card-content">
			<h3>
				<?php echo $jenis; ?>
			</h3>
			<?php if($kategori == "capen_bpnt"){ ?>
			<table id="dt_default" class="uk-table">
				<thead>
					<tr>
						<th>Kecamatan / Kelurahan</th>
						<th>NO. KK</th>
						<th>NIK KK</th>
						<th>Nama KK</th>
						<th>Nama Pengurus</th>
						<th>Alamat</th>
						<th width="10%">#</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data as $d){ ?>
					<tr>
						<td>
							<?php echo ambil_nama_by_id("m_kecamatan","nama_kecamatan","id_kecamatan",$d->id_kecamatan); ?> / 
							<?php echo ambil_nama_by_id("m_kelurahan","nama_kelurahan","id_kelurahan",$d->id_kelurahan); ?>
						</td>
						<td><?php echo $d->no_kk; ?></td>
						<td><?php echo $d->nik; ?></td>
						<td><?php echo $d->nama_kk; ?></td>
						<td><?php echo $d->nama_pengurus; ?></td>
						<td><?php echo $d->alamat; ?></td>
						<td>
							<a target="_blank" href="<?php echo site_url("laporan/cetak_capen/".$kategori."/".$d->nik); ?>" class="md-btn md-btn-small">Detail</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php }else{ ?>
			<table id="dt_default" class="uk-table">
				<thead>
					<tr>
						<th>Kecamatan / Kelurahan</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Tgl Lahir</th>
						<th>Alamat</th>
						<th width="10%">#</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data as $d){ ?>
					<tr>
						<td>
							<?php echo ambil_nama_by_id("m_kecamatan","nama_kecamatan","id_kecamatan",$d->id_kecamatan); ?> / 
							<?php echo ambil_nama_by_id("m_kelurahan","nama_kelurahan","id_kelurahan",$d->id_kelurahan); ?>
						</td>
						<td><?php echo $d->nik; ?></td>
						<td><?php echo $d->nama; ?></td>
						<td><?php echo tgl_indonesia($d->tgl_lahir); ?></td>
						<td><?php echo $d->alamat; ?></td>
						<td>
							<a target="_blank" href="<?php echo site_url("laporan/cetak_capen/".$kategori."/".$d->nik); ?>" class="md-btn md-btn-small">Detail</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php
				}
			?>
		</div>
	</div>
</div>

<?php $this->load->view("backend/footer_ajax"); ?>