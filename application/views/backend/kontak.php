<div class="row-fluid">
<?php
	$aksi	=	get_value("a");
	$id		=	get_value("id");
	switch($aksi){
		case "detail":
			$row	=	ambil_data_by_id_row($tabel,$key,$id);
			$this->crud_model->update("kontak",array("status"=>"1"),"id",$id);
?>
	<div class="span12">
		<div class="widget-box">
			<div class="widget-header">
				<h4><i class="icon-plus"></i> Detail <?php echo $label; ?></h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<div class="span6">
							<table class="table">
								<tr>
									<td>Tanggal Kirim</td>
									<td>:</td>
									<td><?php echo tgl_indonesia($row->create_at); ?></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?php echo $row->nama; ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?php echo $row->email; ?></td>
								</tr>
								<tr>
									<td>Judul</td>
									<td>:</td>
									<td><?php echo $row->judul; ?></td>
								</tr>
							</table>
						</div>
						<div class="span6">
							<table class="table">
								<tr>
									<td>Isi Pesan</td>
									<td>:</td>
									<td><?php echo $row->pesan; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		break;
		
		default:
?>
	<div class="span12">
		<div class="widget-box">
			<div class="widget-header">
				<h4><i class="icon-list"></i> Daftar <?php echo $label; ?></h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row-fluid">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tanggal Kirim</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Judul</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no	=	1;
									foreach($data as $d){
										$bgcolor="";
										if($d->status == "0"){ $bgcolor = "red"; }
								?>
								<tr style="color:<?php echo $bgcolor; ?>">
									<td>
										<?php echo $no; ?>
									</td>
									<td><?php echo $d->create_at; ?></td>
									<td><?php echo $d->nama; ?></td>
									<td><?php echo $d->email; ?></td>
									<td><?php echo $d->judul; ?></td>
									<td>
										<a class="btn btn-inverse btn-mini" href="?a=detail&id=<?php echo $d->id; ?>">Detail</a>
									</td>
								</tr>
								<?php
									$no++;
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
		break;
	}
?>