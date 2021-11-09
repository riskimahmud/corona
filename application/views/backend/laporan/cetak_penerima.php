<script>
	window.print();
</script>
<style>
	header{
		font-weight:bold;
		font-family:arial;
	}
	
	body{
		font-family:arial;
	}
	
	table.isi{
		width:100%;
		border-collapse: collapse;
	}
	
	.isi th{
		font-size:13px;
		padding:10px;
		border:1px solid black;
	}
	
	.isi td{
		font-size:12px;
		padding:5px;
		border:1px solid black;
	}
	
	.page_break { page-break-after: always; }
	
	#footer{
		bottom:10px;
		height:50px;
	}

	#ttd_kanan_sah{
		position:absolute;
		bottom:0px;
		right:0;
		width:300px;
		text-align:center;
	}
</style>
<header>
	<img src="<?php echo base_url(); ?>assets_laporan/logo-kota.png" style="position:absolute; width:60px; height:auto;">
	<table width="100%;" style="line-height:20px; margin-top:15px; margin-left:70px;">
		<tr>
			<td>
				<span style="font-weight:bold; font-size:20px;">
					Data Penerima Bantuan<br>
					Dinas Sosial Dan Pemberdayaan Masyarakat<br>
					Kota Gorontalo
				</span>
				<br><br>
			</td>
		</tr>
	</table>
</header>
<hr>
<body>
<table width="100%" style="line-height:25px;">
	<tr>
		<td>Kecamatan</td>
		<td>:</td>
		<td><?php echo ambil_nama_by_id("m_kecamatan","nama_kecamatan","id_kecamatan",$kecamatan); ?></td>
	</tr>
	<tr>
		<td>Kelurahan</td>
		<td>:</td>
		<td><?php echo ambil_nama_by_id("m_kelurahan","nama_kelurahan","id_kelurahan",$penerima->id_kelurahan); ?></td>
	</tr>
	<?php if($capen == "capen_bpnt"){ ?>
	<tr>
		<td>NO. KK</td>
		<td>:</td>
		<td><?php echo $penerima->no_kk; ?></td>
	</tr>
	<tr>
		<td>NIK KK</td>
		<td>:</td>
		<td><?php echo $penerima->nik; ?></td>
	</tr>
	<tr>
		<td>Nama KK</td>
		<td>:</td>
		<td><?php echo $penerima->nama_kk; ?></td>
	</tr>
	<tr>
		<td>Nama Pengurus</td>
		<td>:</td>
		<td><?php echo $penerima->nama_pengurus; ?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?php echo $penerima->jk; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $penerima->alamat; ?></td>
	</tr>
	<?php }else{ ?>
	<tr>
		<td>NIK</td>
		<td>:</td>
		<td><?php echo $penerima->nik; ?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $penerima->nama; ?></td>
	</tr>
	<tr>
		<td>Tgl Lahir</td>
		<td>:</td>
		<td><?php echo tgl_indonesia($penerima->tgl_lahir); ?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?php echo $penerima->sex; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $penerima->alamat; ?></td>
	</tr>
	<?php } ?>
	<tr>
		<td>PKH</td>
		<td>:</td>
		<td><?php echo $penerima->pkh; ?></td>
	</tr>
	<tr>
		<td>PBI</td>
		<td>:</td>
		<td><?php echo $penerima->pbi; ?></td>
	</tr>
	<tr>
		<td>KKS</td>
		<td>:</td>
		<td><?php echo $penerima->kks; ?></td>
	</tr>
	<?php if(!empty($bantuan)){ ?>
	<tr>
		<td>Bantuan Yang Pernah Diterima</td>
		<td>:</td>
		<td>Terlampir</td>
	</tr>
	<?php } ?>
</table>

<div id="footer">
	<div id="ttd_kanan_sah">
		Gorontalo, <?php echo tgl_indonesia(date("Y-m-d")); ?>
		<br>
		Kepala Dinas Sosial Dan <br>Pemberdayaan Masyarakat<br>
		<br><br><br><br><br>
		<u>(<?php echo $kepala->nama_pimpinan; ?>)</u><br>
		NIP. <?php echo $kepala->nip_pimpinan; ?>
	</div>
</div>


<?php if(!empty($bantuan)){ ?>
<div class="page_break"></div>

	<header style="text-align:center;">
		Bantuan Yang Pernah Diterima
	</header>
	<br>
	<hr>
	<br>
	<table class="isi">
		<thead>
			<tr>
				<th>Jenis Bantuan</th>
				<th>Deskripsi</th>
				<th>Sumber</th>
				<th>Tgl Penyerahan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($bantuan as $ban){
					$data_bantuan	=	ambil_data_by_id_row("bantuan","id_bantuan",$ban->id_bantuan);
					if($data_bantuan->status != "2"){ continue; }
			?>
		<tr>
			<td>
				<?php
					echo ambil_nama_by_id("jenis_bantuan","nama_jenisbantuan","id_jenisbantuan",$data_bantuan->jenis_bantuan);
				?>
			</td>
			<td><?php echo $data_bantuan->deskripsi_bantuan; ?></td>
			<td><?php echo $data_bantuan->sumber_bantuan; ?></td>
			<td><?php echo tgl_indonesia($data_bantuan->tgl_penyerahan); ?></td>
		</tr>
			<?php 
				}
			?>
		</tbody>
	</table>

<?php } ?>
</body>