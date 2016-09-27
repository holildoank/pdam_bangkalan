$(function(){

detailizin = function(id){
		$('.viewkode').html('');
		$('.btn-acc').html('');
		$('.balik').html('');
		$('.detail-pmb').html('Memuat...');
		$.post(_base_url + '/izin/detailizin', {id : id}, function(json){

			$('.viewkode').html(json.kode);
			$('.detail-pmb').html(json.content);
			$('.btn-acc').html(json.button);
			$('.balik').html(json.balik);
		}, 'json');
	}
	acc = function(id){
		$('.btn-accspb').button('loading');
		$.post(_base_url + '/izin/accizin', {id : id }, function(json){
			
			$('.btn-accspb').remove();
			$('#myizin').modal('hide');
			var page = $('.pagination').find('.active').find('span').html();
			allizin(page);

			swal('Sukses!', 'Permohonan berhasil terverifikasi.');

		}, 'json');
	}
	kembali = function(id){
		$('.btn-kembali').button('loading');
		$.post(_base_url + '/izin/kembali', {id : id }, function(json){
			
			$('.btn-kembali').remove();
			$('#myizin').modal('hide');
			var page = $('.pagination').find('.active').find('span').html();
			allizin(page);

			swal('Sukses!', 'Siswa ini telah Kembali.');

		}, 'json');
	}


	allizin = function(page){

		var $nm_depan = $('[name="nm_depan"]').val();
		var $nis      = $('[name="nis"]').val();
		var $status   = $('[name="status"]').val();
		var $limit    = $('[name="limit"]').val();

		$('.allizin').css('opacity', .3);
		$.ajax({
			type 	: 'GET',
			url 	: _base_url + '/izin/allizin',
				data 	: {
				page 	: page, 
				nm_depan 	: $nm_depan, 
				nis 	: $nis, 
				limit 	: $limit,
				status : $status
			},
			cache 	: false,
			dataType : 'json',
			success : function(json){
				$('.allizin').html(json.data);
				$('.paginizin').html(json.pagin);
				$('.total-data').html(json.total);

				$('div.paginizin > ul.pagination > li > a').click(function(e){
					e.preventDefault();
					var $link = $(this).attr('href');
					var $split = $link.split('?page=');
					var $page = $split[1];
					allizin($page);
				});

				// onDataCancel();

				$('.allizin').css('opacity', 1);
			}
		});
	}

	$('div.paginizin > ul.pagination > li > a').click(function(e){
		e.preventDefault();
		var $link = $(this).attr('href');
		var $split = $link.split('?page=');
		var $page = $split[1];
		allizin($page);
	});

	$('.cariizin').click(function(){
		allizin(1);
	});

	$('select').change(function(){
		allizin(1);
	});

	$('[name="nm_depan"]').keyup(function(e){
		if(e.keyCode == 13)
			allizin(1);
	});
	$('[name="status"]').click(function(){
		allizin(1);
	});

});