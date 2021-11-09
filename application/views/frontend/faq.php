<section>
	<header id="header-full">
    <div class="wrap-primary">
        <div class="container">
            <h1 class="head-title animated bounceInDown animation-delay-8" style="margin-top:100px;">GORONTALO SIAGA COVID-19</h1>
            <h2 class="secondary-color text-center head-subtitle animated fadeInUp animation-delay-14">FAQ</h2>
            <div class="row header-full-icons text-center" style="margin-bottom:100px;">
                
            </div>
		</div>
	</div>
	</header>
</section> <!-- carousel -->

<section class="margin-bottom">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="margin-top">Pertanyaan Yang Sering Ditanyakan</h2>
				<hr class="no-margin-top">
				<div class="panel-group" id="accordioncc3">
					<?php 
						$i = 1;
						foreach($data as $d){
					?>
				  <div class="panel panel-primary-dark">
					<div class="panel-heading panel-plus-link">
						<a data-toggle="collapse" data-parent="#accordioncc3" href="#c<?php echo $i; ?>" class="collapsed">
						  <?php echo $d->judul; ?>
						</a>
					</div>
					<div id="c<?php echo $i; ?>" class="panel-collapse collapse">
					  <div class="panel-body">
						<?php echo $d->jawaban; ?>
					  </div>
					</div>
				  </div>
					<?php
						$i++;
						}
					?>
			    </div>
            </div>
       </div>
	</div>
</section>