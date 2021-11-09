<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
	<i class="icon-double-angle-up icon-only bigger-110"></i>
</a>
<!--[if !IE]>-->
<script type="text/javascript">
	window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>
<!--<![endif]-->

<script type="text/javascript">
	if ("ontouchend" in document) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<!--basic scripts-->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-timepicker.min.js"></script>

<!-- norifikasi -->
<script src="<?= base_url(); ?>assets/js/jquery.gritter.min.js"></script>

<!--choosen-->
<script src="<?= base_url(); ?>assets/js/chosen.jquery.min.js"></script>

<!-- ckeditor -->
<!-- <script src="<?= base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.hotkeys.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap-wysiwyg.min.js"></script> -->

<!--datatable-->
<!-- <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script> -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


<!--ace scripts-->

<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>
<script src="<?= base_url("assets/js/script.js"); ?>"></script>
<script type="text/javascript">
	$(function() {
		$(".chzn-select").chosen();

		$('#datatable').dataTable();
		$('#tablePasien').dataTable({
			"responsive": true,
			columnDefs: [{
					responsivePriority: 1,
					targets: 0
				},
				{
					responsivePriority: 1,
					targets: -1
				}
			]
		});

		$('.date-picker').datepicker({
			autoclose: true,
		}).next().on(ace.click_event, function() {
			$(this).prev().focus();
		});

		$('.timepicker').timepicker({
			minuteStep: 1,
			showSeconds: false,
			showMeridian: false,
			defaultTime: 'value'
		});

		$('.input-file').ace_file_input({
			no_file: 'Belum ada file dipilih.',
			btn_choose: 'Pilih',
			btn_change: 'Ganti',
			droppable: false,
			onchange: null,
			thumbnail: false //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			//blacklist:'exe|php'
			//onchange:''
			//
		});
	});

	$("input[type='reset'], button[type='reset']").click(function(e) {
		// $(".chzn-select").trigger("chosen:updated");
		$(".chzn-select").val('').trigger("liszt:updated");
	});


	$(function() {
		$("body").delegate(".date-picker", "focusin", function() {
			$(this).datepicker({
				autoclose: true,
			}).next().on(ace.click_event, function() {
				$(this).prev().focus();
			});
		});
	});
</script>

<!--inline scripts related to this page-->
</body>

</html>