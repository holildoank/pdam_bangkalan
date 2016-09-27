$(function(){

	destroy = function(id){

		swal({
			title: "Anda yakin ?",
			text: "Data karyawan ini mauk Di hapus !",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			closeOnConfirm: true
		}, function(){
			$('.karyawan_' + id).css('opacity', .3);
			$.post(_base_url + '/karyawan/destroy', {id : id}, function(json){
				location.reload();
			}, 'json');
		});
	}

	allkaryawan = function(page){

		var $nm_depan = $('[name="nm_depan"]').val();
		var $profesi   = $('[name="id_profesi"]').val();
		var $limit    = $('[name="limit"]').val();

		$('.allkaryawan').css('opacity', .3);
		$.ajax({
			type 	: 'GET',
			url 	: _base_url + '/karyawan/allkaryawan',
				data 	: {
				page 	: page,
				nm_depan 	: $nm_depan,
				limit 	: $limit,
				profesi : $profesi
			},
			cache 	: false,
			dataType : 'json',
			success : function(json){
				$('.allkaryawan').html(json.data);
				$('.paginkaryawan').html(json.pagin);
				$('.total-data').html(json.total);

				$('div.paginkaryawan > ul.pagination > li > a').click(function(e){
					e.preventDefault();
					var $link = $(this).attr('href');
					var $split = $link.split('?page=');
					var $page = $split[1];
					allkaryawan($page);
				});

				// onDataCancel();

				$('.allkaryawan').css('opacity', 1);
			}
		});
	}

	$('div.paginkaryawan > ul.pagination > li > a').click(function(e){
		e.preventDefault();
		var $link = $(this).attr('href');
		var $split = $link.split('?page=');
		var $page = $split[1];
		allkaryawan($page);
	});

	$('.carikaryawan').click(function(){
		allkaryawan(1);
	});

	$('select').change(function(){
		allkaryawan(1);
	});

	$('[name="nm_depan"]').keyup(function(e){
		if(e.keyCode == 13)
			allkaryawan(1);
	});
	$('[name="profesi"]').click(function(){
		allkaryawan(1);
		});
});
