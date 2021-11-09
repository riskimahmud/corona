<section class="about" id="about" style="min-height:522px;">
    <div class="container">
		<h3 style="margin-top:0px;" class="text-center">
          Berita Terkini
        </h3>
		<hr>
		<div class="row"> 
			<div class="col-md-8">
				<?php foreach($data as $d){ ?>
				<div id="list-berita" class="media">
				  <img width="100" src="<?php echo base_url("uploads/berita/".$d->gambar); ?>" class="mr-3" alt="gambar">
				  <div class="media-body">
					<h5 class="mt-0"><?php echo $d->judul; ?></h5>
					<?php echo $d->isi_ringkas; ?>
					<br><em style="font-size:11px;">Upload : <?php echo tgl_full($d->create_at); ?></em><br>
					<a class="btn btn-info btn-sm" href="<?php echo site_url("frontend/detail_berita/".$d->id_berita); ?>">Selengkapnya...</a> 
				  </div>
				</div>
				<?php } ?>
				<div class="pagination">
				<?php 
					echo $this->pagination->create_links();
				?>
				</div>
			</div>
			<div class="col-md-4">
			
			</div>
		</div>
	</div>
</section>