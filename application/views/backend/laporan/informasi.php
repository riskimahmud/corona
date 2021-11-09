<div class="uk-width-1-1">
	<div class="md-card uk-margin-medium-bottom">
		<div class="md-card-content">
			<table id="dt_default" class="uk-table">
				<thead>
					<tr>
						<th>Level</th>
						<th>Judul<br>Penulis</th>
						<th>Tgl Input<br>Jumlah Baca</th>
						<th width="10%"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data as $d){ ?>
					<tr>
						<td>
							<?php $badge = ""; $label = "Masyarakat"; ?>
							<?php if($d->level == "1"){ $badge = 'uk-badge-warning'; $label = 'Kelurahan'; } ?>
							<span class="uk-badge <?php echo $badge; ?>">
							<?php echo $label; ?>
							</span>
						</td>
						<td>
							<?php echo $d->judul; ?><br>
							<span class="uk-text-muted uk-text-small"><?php echo ambil_nama_by_id("users","nama","id_user",$d->penulis); ?></span>
						</td>
						<td>
							<?php echo tgl_full($d->create_at); ?>
							<br>
							<span class="uk-text-muted uk-text-small"><?php echo $d->dibaca."x Dibaca"; ?></span>
						</td>
						<td>
							<a class="md-btn md-btn-small">Detail</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>