<section class="about" id="about" style="min-height:522px;">
    <div class="container">
		<h3 style="margin-top:0px;" class="text-center">
			<?php echo $data->judul; ?>
        </h3>
		<hr>
		<div class="row"> 
			<div class="col-md-12">
				<img src="<?php echo base_url("uploads/berita/".$data->gambar); ?>" class="img-fluid" alt="Responsive image">
				<center><small>Uploade : <?php echo tgl_full($data->create_at); ?></small></center>
				<?php echo $data->isi; ?>
			</div>
			<!-- AddToAny BEGIN -->
			<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
			<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
			<a class="a2a_button_facebook"></a>
			<a class="a2a_button_twitter"></a>
			<a class="a2a_button_email"></a>
			<a class="a2a_button_whatsapp"></a>
			</div>
			<script async src="https://static.addtoany.com/menu/page.js"></script>
			<!-- AddToAny END -->
		</div>
	</div>
</section>