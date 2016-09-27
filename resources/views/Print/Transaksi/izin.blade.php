@extends('layouts.Print')

@section('meta')
<style type="text/css">
	h3{
		font-weight: normal;
		margin: 0;
	}
</style>
@endsection

@section('content')

<center>
	<h3><strong>Rekap Izin Santri </strong></h3>
	<span>Periode
		@if($req->waktu == 1)
		{{ Format::nama_bulan($req->bulan) }} {{ $req->tahun }}
		@else
		{{ Format::indoDate2($req->dari) }} - {{ Format::indoDate2($req->sampai) }}
		@endif</span>
	</center>
	<br />
	<table class="table table-bordered" cellspacing = "0">
		<thead>
			<tr>
						<td>No.</td>
						<td class="text-middle">Nis</td>
					
						<td class="text-center" >Nama</td>
						<td class="text-center">Tanggal Mulai</td>
						<td class="text-center">Tanggal Selesai</td>
						<td class="text-center">Kembali</td>
						<td class="text-center">Penyetuju</td>
						<td class="text-center">Status</td>
					</tr>
		</thead>
			
		<tbody>
		<?php 
			$no = 1; 
			?>
			@foreach($items as $izin)
			 <tr>
                <td>{{$no}}</td>
                <td>{{$izin->nis}}</td>
                <td>{{$izin->np}} &nbsp; {{$izin->nb}}</td>
                <td>{{$izin->tgl_mulai_izin}}</td>
                <td>{{$izin->jatuh_izin}}</td>
                <td>
                	<div>{{Format::hari($izin->tgl_abelih)}}&nbsp;{{ Format::indoDate2($izin->tgl_abelih)}}&nbsp; </div>
	                <div class="link text-muted">
		                @if($izin->lambat > 0)
							<small class="text-muted text-danger"> Terlambat {{$izin->lambat}} hari</small>
						@else
							<small class="text-muted ">0 Lambat</small>
						@endif
					</div>
                </td>
                <td>{{$izin->nmp}}&nbsp;{{$izin->nmb}}</td>
                <td>{{$status[$izin->status]}}</td>

                </tr>
		</tbody>
<?php	$no++; ?>
			@endforeach
	</table>
	@endsection