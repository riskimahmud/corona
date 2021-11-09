<?php
	
?>
<div id="produk" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script src="<?php echo base_url(); ?>assets_front/js/highcharts.js"></script>
<script type="text/javascript">
	Highcharts.chart('produk', {
		chart: {
			type: 'column'
		},
		title: {
			text: ''
		},
		subtitle: {
			text: ''
		},
		xAxis: {
			categories: [
				'PERDA',
				'PERWAKO'
			],
			crosshair: false
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: 
				'<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"> {point.y:.0f} kali</td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.1,
				borderWidth: 0
			}
		},
		series: [
			<?php
				$perda		=	$this->crud_model->select_custom_row("SELECT SUM(hits) AS hitsnumber, SUM(downloads) AS downloadsnumber FROM draft WHERE kategori='1'");
				$perwako	=	$this->crud_model->select_custom_row("SELECT SUM(hits) AS hitsnumber, SUM(downloads) AS downloadsnumber FROM draft WHERE kategori='2'");
				// $ambilstatsperda = mysqli_query($con, "SELECT SUM(hits) AS hitsnumber, SUM(downloads) AS downloadsnumber FROM draft WHERE kategori='1'");
				// $perda = mysqli_fetch_object($ambilstatsperda);
				// $ambilstatsperwako = mysqli_query($con, "SELECT SUM(hits) AS hitsnumber, SUM(downloads) AS downloadsnumber FROM draft WHERE kategori='2'");
				// $perwako = mysqli_fetch_object($ambilstatsperwako);
			?>
			{
				name: 'Dibaca',
				data: [<?=$perda->hitsnumber;?>,<?=$perwako->hitsnumber;?>],
				dataLabels: {
					enabled: true,
					rotation: -90,
					color: '#EEE',
					align: 'right',
					format: '{point.y:.0f}', // one decimal
					y: 10, // 10 pixels down from the top
					style: {
						fontSize: '11px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},
			{
				name: 'Diunduh',
				data: [<?=$perda->downloadsnumber;?>,<?=$perwako->downloadsnumber;?>],
				dataLabels: {
					enabled: true,
					rotation: -90,
					color: '#EEE',
					align: 'right',
					format: '{point.y:.0f}', // one decimal
					y: 10, // 10 pixels down from the top
					style: {
						fontSize: '11px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},
		]
	});
</script>