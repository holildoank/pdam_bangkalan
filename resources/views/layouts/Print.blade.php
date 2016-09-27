<!DOCTYPE html>
<html>
<head>
	<title>Document AlHikam</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/print/print.css') }}">
	<script type="text/javascript" src="{{ asset('/js/print.js') }}"></script>
	<style>
		.page-break {
		    page-break-after: always;
		}
	</style>
	@yield('meta')
</head>
<body>
	<header>
		<img src="{{ asset('/assets/img/alhikam.png') }}">
		<div class="alamat">
			Jl. Raya 	<br />
			<br />
			Madura, Jawa Timur	<br>
			Telp. +62--------- Fax. +62	<br />
			
		</div>
	</header>
	<br />
	<section class="container">
		@yield('content')
	</section>
	<footer class="text-center btn-print">
		<hr />
		<button type="button" onclick="window.print();">Print Dokumen</button>
		<button type="button" onclick="window.close();">Keluar</button>
	</footer>
</body>
</html>