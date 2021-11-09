$(document).ready(function(){
// mengganti alert notifikasi menjadi toast
	const statusFlashData = $('.flash-data').data('statusflashdata');
	const msgFlashData = $('.flash-data').data('msgflashdata');

	console.log(statusFlashData);
	if (statusFlashData) {
		if (statusFlashData == "0") {
			// notif
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Gagal',
				// (string | mandatory) the text inside the notification
				text: msgFlashData,
				class_name: 'gritter-error gritter-light'
			});
		} else {
			// notif
			$.gritter.add({
				// (string | mandatory) the heading of the notification
				title: 'Berhasil',
				// (string | mandatory) the text inside the notification
				text: msgFlashData,
				class_name: 'gritter-success gritter-light'
			});
		}
	}

	$(".detailPasien").on("click", function(e) {
		const idPasien = $(this).data("idpasien");
		$.ajax({
			url: url + 'detail-pasien',
			type: 'post',
			dataType: 'html',
			data: {
				'id_pasien': idPasien,
			},
			success: function(response) {
				$(".modal-title").html('Detail Pasien');
				$(".modal-body").html(response);
				// console.log(success);
			}
		})
		$('#modal').modal('show');
	})

    function confirm_delete() {
		return confirm('are you sure?');
	}

	$('.delete').on("click", function(e){
		e.preventDefault();
		const link = $(this).attr("href");
		if(confirm("Apakah anda yakin?")){
			window.location.href = link;
		}
		else{
			return false;
		}
	})

    $('.editor').keyup(function() {
        $('#textEditor').val($('.editor').html());
    });

	$(".detailVaksin").on("click", function(e) {
		const idVaksin = $(this).data("idvaksin");
		$.ajax({
			url: url + 'detail-pasien-vaksin',
			type: 'post',
			dataType: 'html',
			data: {
				'id_vaksin': idVaksin,
			},
			success: function(response) {
				$(".modal-title").html('Detail Pasien Vaksinasi');
				$(".modal-body").html(response);
				// console.log(success);
			}
		})
		$('#modal').modal('show');
	})
});