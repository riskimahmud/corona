<section>
	<header id="header-full">
    <div class="wrap-primary">
        <div class="container">
            <h1 class="head-title animated bounceInDown animation-delay-8" style="margin-top:100px;">GORONTALO SIAGA COVID-19</h1>
            <h2 class="secondary-color text-center head-subtitle animated fadeInUp animation-delay-14">SEBARAN DI INDONESIA</h2>
            <div class="row header-full-icons text-center" style="margin-bottom:100px;">
                
            </div>
		</div>
	</div>
	</header>
</section> <!-- carousel -->

<section class="margin-bottom">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-top text-center text-primary">
				Pantauan Kasus Di Semua Provinsi
			</h1>
			<hr class="no-margin-bottom no-margin-bottom">
			<table class="table table-striped table-responsive">
				<thead>
					<tr>
						<th>No. Urut</th>
						<th>Provinsi</th>
						<th>Positif</th>
						<th>Sembuh</th>
						<th>Meninggal</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no	=	1;
						foreach($data as $d){ 
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $d->attributes->Provinsi; ?></td>
						<td><?php echo $d->attributes->Kasus_Posi; ?></td>
						<td><?php echo $d->attributes->Kasus_Semb; ?></td>
						<td><?php echo $d->attributes->Kasus_Meni; ?></td>
					</tr>
					<?php 
						$no++;
						} 
					?>
				</tbody>
			</table>
			<br>
			<h1>Total : <?php echo count($data); ?> Provinsi</h1>
		</div>
	</div>
</div>