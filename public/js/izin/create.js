$(function(){



	$('.cari-santri').click(function(){
		// loadpamy();
	});

	$('#tab-4 a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	loadsantri = function(page){

		var nis = $('[name="modal-nis"]').val();
		var nm_depan = $('[name="modal-nm_depan"]').val();
		var id_kamar = $('[name=modal-kamar]').val();
		var param = {
			page : page,
			nis : nis,
			nm_depan : nm_depan,
			id_kamar :id_kamar,
		};
		$('.modal-santri-list').css('opacity', .3);

		$.getJSON(_base_url + '/izin/loadsantri', param, function(json){

			$('.modal-santri-list').html(json.content);
			$('.modal-santri-pagin').html(json.pagin);
			$('.modal-santri-list').css('opacity', 1);
			$('body').css('cursor', 'default');

			onDataCancel();

			$('div.modal-santri-pagin > ul.pagination > li > a').click(function(e){
				e.preventDefault();
				var $link 	= $(this).attr('href');
				var $split 	= $link.split('?page=');
				var $page 	= $split[1];
				loadsantri($page);
			});
		});
	}
	$('[name="modal-nis"]').keyup(function(e){
		if(e.keyCode == 13)
			loadsantri(1);
	});
	$('[name="modal-nm_depan"]').change(function(){
		loadsantri(1);
	});
	$('[name="modal-kamar"]').change(function() {
		loadsantri(1);
	});
	$('.btn-search-santri').click(function(){
		loadsantri(1);
	});

	add_izin = function(id){
		$('.santri-' + id).css('opacity', .3);
		$('.btn-izin-' + id).remove();
		$('.izin-loading-' + id).removeClass('hide');
		$.getJSON(_base_url + '/izin/addizinisantri', {id : id}, function(json){
			// console.log(json);
			$htm = '';
			$('.content-item').append($htm);
			$('.santri-' + json.pa.id_siswa).remove();
			$('.santri-' + json.pa.id_siswa).css('opacity', 1);
			$('[name="nm_depan"]').val(json.pa.nm_depan);
			$('[name="id_siswa"]').val(json.pa.id_siswa);
			$('[name="nis"]').val(json.pa.nis);
			$('[name="tgl_lahir"]').val(json.pa.tgl_lahir);
			$('[name="nm_kamar"]').val(json.pa.nm_kamar);
			$('#santri').modal('hide');
		});
	}

	loadsantri(1);
});
