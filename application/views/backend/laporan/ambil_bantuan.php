<div class="uk-width-1-1">
	<div class="md-card uk-margin-medium-bottom">
		<div class="md-card-content">
			<table id="dt_default" class="uk-table">
				<thead>
					<tr>
						<th>Jenis Bantuan</th>
						<th>Kecamatan Tujuan</th>
						<th>Deskripsi Bantuan</th>
						<th>Sumber Bantuan</th>
						<th>Rencana Penyerahan<br>Tgl Penyerahan</th>
						<th>Status</th>
						<th width="10%">#</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data as $d){ ?>
					<tr>
						<td>
							<?php echo ambil_nama_by_id("jenis_bantuan","nama_jenisbantuan","id_jenisbantuan",$d->jenis_bantuan); ?>
						</td>
						<td>
							<?php echo ambil_nama_by_id("m_kecamatan","nama_kecamatan","id_kecamatan",$d->id_kecamatan); ?>
						</td>
						<td><?php echo $d->deskripsi_bantuan; ?></td>
						<td><?php echo $d->sumber_bantuan; ?></td>
						<td><?php echo tgl_indonesia($d->rencana_penyerahan); ?><br><?php echo tgl_indonesia($d->tgl_penyerahan); ?><br></td>
						<td>
								<?php $badge = ""; $label = "Proses"; ?>
								<?php if($d->status == "2"){ $badge = 'uk-badge-success'; $label = 'Selesai'; } ?>
								<?php if($d->status == "0"){ $badge = 'uk-badge-danger'; $label = 'Dibatalkan'; } ?>
								<span class="uk-badge <?php echo $badge; ?>">
								<?php echo $label; ?>
								</span>
						</td>
						<td>
							<a target="_blank" href="<?php echo site_url("bantuan/cetak_bantuan/".$d->id_bantuan); ?>" class="md-btn md-btn-small">Detail</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view("backend/footer_ajax"); ?>