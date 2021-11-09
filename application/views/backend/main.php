<?php $this->load->view("backend/inc/header"); ?>
<div class="main-container container-fluid">
	<a class="menu-toggler" id="menu-toggler" href="#">
		<span class="menu-text"></span>
	</a>
	<!-- main sidebar -->
	<?php $this->load->view("backend/inc/sidebar"); ?>
	<!-- main sidebar end -->
</div>
<div class="main-content">
	<?php $this->load->view("backend/inc/head_html"); ?>
	<?php $this->load->view("backend" . $page); ?>
	<!-- Modal -->
	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-large" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title bold" id="exampleModalLabel"></h5>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-small" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view("backend/inc/foot_html"); ?>
</div>
<?php $this->load->view("backend/inc/footer"); ?>