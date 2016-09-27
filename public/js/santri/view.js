$(function(){

	destroy = function(id){
		swal({
			title: "Anda yakin ?",
			text: "Data Siswa ini mauk Di hapus !",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			closeOnConfirm: true
		}, function(){
			$('.santri_' + id).css('opacity', .3);
			$.post(_base_url + '/siswa/destroy', {id : id}, function(json){
				location.reload();
			}, 'json');
		});
	}
	detailsiswa = function(id){
		$('.viewkode').html('');
		$('.btn-acc').html('');
		$('.balik').html('');
		$('.detail-pmb').html('Memuat...');
		$.post(_base_url + '/siswa/detailsiswa', {id : id}, function(json){

			$('.viewkode').html(json.kode);
			$('.detail-pmb').html(json.content);
			$('.btn-acc').html(json.button);
			$('.balik').html(json.balik);
		}, 'json');
	}
	allsantri = function(page){

		var $nm_depan = $('[name="nm_depan"]').val();
		var $kelas    = $('[name="id_kelas"]').val();
		var $limit    = $('[name="limit"]').val();

		$('.allustad').css('opacity', .3);
		$.ajax({
			type 	: 'GET',
			url 	: _base_url + '/siswa/allsantri',
				data 	: {
				page 	: page, 
				nm_depan 	: $nm_depan, 
				limit 	: $limit,
				kelas : $kelas
				
			},
			cache 	: false,
			dataType : 'json',
			success : function(json){
				$('.allsantri').html(json.data);
				$('.paginsantri').html(json.pagin);
				$('.total-data').html(json.total);

				$('div.paginsantri > ul.pagination > li > a').click(function(e){
					e.preventDefault();
					var $link = $(this).attr('href');
					var $split = $link.split('?page=');
					var $page = $split[1];
					allsantri($page);
				});

				// onDataCancel();

				$('.allsantri').css('opacity', 1);
			}
		});
	}

	$('div.paginsantri > ul.pagination > li > a').click(function(e){
		e.preventDefault();
		var $link = $(this).attr('href');
		var $split = $link.split('?page=');
		var $page = $split[1];
		allsantri($page);
	});

	$('.carisantri').click(function(){
		allsantri(1);
	});

	$('select').change(function(){
		allsantri(1);
	});

	$('[name="nm_depan"]').keyup(function(e){
		if(e.keyCode == 13)
			allsantri(1);
	});
	$('[name="kelas"]').click(function(){
		allsantri(1);
	});
});
