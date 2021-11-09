<?php
$aksi	=	get_value("a");
?>
<div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb">
		<?php foreach ($bread as $b) { ?>
			<li>
				<i class="<?php echo $b['icon'];
							if ($b['active']) {
								echo "active";
							} ?>"></i>
				<?php if (!$b['active']) { ?><a href="<?php echo $b['link']; ?>"><?php echo $b['label']; ?></a><?php } else { ?>
					<?php echo $b['label']; ?><?php } ?>

					<?php if ($b['divider']) { ?>
						<span class="divider">
							<i class="icon-angle-right arrow-icon"></i>
						</span>
					<?php } ?>
			</li>
		<?php } ?>
	</ul>
	<!--.breadcrumb-->
</div>
<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			<?php echo $title; ?>
			<?php
			if (isset($subtitle)) {
				if ($subtitle != "") {
			?>
					<small>
						<i class="icon-double-angle-right"></i>
						<?php echo $subtitle; ?>
					</small>
			<?php }
			} ?>

			<div class="pull-right">
				<?php
				if (isset($tombol_head)) {
					if ($aksi == "" || $aksi == "edit") {
				?>
						<a href="<?php echo site_url($base . "?a=add"); ?>" class="btn btn-small btn-inverse"><i class="icon-plus"></i> Tambah</a>
					<?php } ?>
					<?php
					if ($aksi == "add" || $aksi == "edit" || $aksi == "detail" || $aksi == "poto") {
					?>
						<a href="<?php echo site_url($base); ?>" class="btn btn-small btn-grey"><i class="icon-eye"></i> Lihat Data</a>
				<?php }
				} ?>

				<?php
				if (isset($tombol_back)) {
					if ($aksi != "") {
				?>
						<a href="<?php echo site_url($base); ?>" class="btn btn-small btn-inverse"><i class="icon-arrow-left"></i> Kembali</a>
				<?php }
				} ?>
			</div>
		</h1>
	</div>
	<!--/.page-header-->

	<?php
	$notif = $this->session->flashdata("notifikasi");
	if (!empty($notif)) {
		// echo get_notif($notif['status'], $notif['pesan']);
	?>
		<div class="flash-data" data-statusflashdata="<?= $notif["status"]; ?>" data-msgflashdata="<?= $notif["pesan"]; ?>">
		</div>
	<?php
	}
	?>