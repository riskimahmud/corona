<div class="uk-width-1-1">
	<div class="md-card uk-margin-medium-bottom">
		<div class="md-card-content">
			<table id="dt_default" class="uk-table">
				<thead>
					<tr>
						<th>Level</th>
						<th>Username<br>Password</th>
						<th>Nama</th>
						<th>Terakhir Login</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data as $d){ ?>
					<tr>
						<td>
							<?php $badge = ""; $label = "Pimpinan"; ?>
							<?php if($d->level == "3"){ $badge = 'uk-badge-success'; $label = 'Administrator'; } ?>
							<?php if($d->level == "2"){ $badge = 'uk-badge-primary'; $label = 'Operator Dinas'; } ?>
							<?php if($d->level == "1"){ $badge = 'uk-badge-warning'; $label = 'Kelurahan'; } ?>
							<span class="uk-badge <?php echo $badge; ?>">
							<?php echo $label; ?>
							</span>
							<?php if($d->level == "1"){ ?>
							<br>
							<?php echo '<span class="uk-text-muted uk-text-small">'.ambil_nama_by_id("m_kelurahan","nama_kelurahan","id_kelurahan",$d->id_kelurahan)."</span>"; ?>
							<?php } ?>
						</td>
						<td>
							<?php echo $d->username; ?><br>
							<span class="uk-text-muted uk-text-small"><?php echo $d->tmp_password; ?></span>
						</td>
						<td><?php echo $d->nama; ?></td>
						<td><?php echo tgl_full($d->last_login); ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>