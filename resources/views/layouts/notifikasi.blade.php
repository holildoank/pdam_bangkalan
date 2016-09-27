<!-- @if(Session::get('notif'))
{{-- <div class="alert alert-success aler-dismissable"> --}}
	<div class="alert alert-{{ Session::get('notif')['label'] }}">
    <i class="fa fa-info"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p>{!!Session::get('notif')['err']!!}</p>
</div>
@elseif(Session::get('error'))
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p>{!!Session::get('error')!!}</p>
</div>
@endif -->
@if(Session::get('notif'))
	<div class="panel-alert">
		<div class="alert alert-{{ Session::get('notif')['label'] }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<p>{!! Session::get('notif')['err'] !!}</p>
		</div>
	</div>
	@endif

	@if (count($errors) > 0)
	<div class="panel-alert">
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
	@endif
