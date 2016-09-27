$(function(){

	destroy = function(id){

		swal({
			title: "Anda yakin ?",
			text: "Kamar ini mauk Di hapus !",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			closeOnConfirm: true
		}, function(){
			$('.kamar_' + id).css('opacity', .3);
			$.post(_base_url + '/kamar/destroy', {id : id}, function(json){
				location.reload();
			}, 'json');
		});
	}

});
