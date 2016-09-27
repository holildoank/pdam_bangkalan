@extends('layouts.Print')

@section('content')
	<div><center><h3>Surat Izin Tidak Mengikuti Kegiatan Pondok Al-Hikam</h3></center></div>
	<div>
		<table class="printparent">
			<tr>
				<td><strong>Nis</strong></td>
				<td>:{{$item->nis}}</td>
			</tr>
			<tr>
				<td><strong>Nama</strong></td>
				<td>: {{ $item->nd }} {{ $item->nb}}</td>
			</tr>
			<tr>
				<td><strong>Tempat Tanggal Lahir</strong></td>
				<td>: {{ $item->tl }} {{ $item->tgl}}</td>
			</tr>
			<tr>
				<td><strong>Tanggal Pengajuan</strong></td>
				<td>:{{$item->tgl_permohonan_izin}} </td>
			</tr>
		</table>
	</div>

	<div>
		<table class="printparent">
			<tr>
			
				<td></td>
				<td></td>
				<td>Dengan ini Pihak Pondok Pesantren  Telah memberikan Izin Untuk Tidak mengikuti kegiatan pondok Kepada </td>
				<td></td>
			</tr>
		</table>
		<table class="printparent">
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Nama</td>
				<td>: {{ $item->nd }} {{ $item->nb}}</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Tempat Tanggal Lahir</td>
				<td>: {{ $item->tl }} {{ $item->tgl}}</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Jenis Kelamin</td>
				<td>:
				@if($item->sex == 1) 
					Laki-laki
				@else
					Perempuan
				@endif
				</td>
			</tr>
			<tr>
			<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Mulai</td>
				<td>: {{ $item->tgl_mulai_izin }}</td>
			</tr>
			<tr>
			<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Sampai</td>
				<td>:{{$item->jatuh_izin}}</td>
			</tr>
			<tr>
			<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>Alasan Izin</td>
				<td>: {{$item->alasan_izin}}</td>
			</tr>
		</table>
		<table class="printparent">
			<tr>
			
				<td></td>
				<td></td>
				<td>Demikian surat izin Kami buat, Apabila santri melanggar aturan atau terlambat kembali tanpa pemberitahuan sebelumnya, Maka Pihak Pondok akan memberikan Hukuman yang sesuai yang di langgarnya.</td>
				<td></td>
			</tr>
		</table>
	</div>

	<div>
		<table class="ttd">
			<tr>
				<td>Dibuat oleh,</td>
				<td>Menyetujui,</td>
				<td>Pemohon,</td>
			</tr>
			<tr>
				<td colspan="2"><br/><br/></td>
			</tr>
			<tr>
				<td>...............................</td>
				<td>{{ $item->nm_depan }} {{ $item->nm_belakang }}</td>
				<td>{{ $item->nd }} {{ $item->nb }}</td>
			</tr>
			<tr>
				<td>(Pengasuh)</td>
				<td>(Admin Ponpes)</td>
				<td>(santri)</td>
			</tr>
		</table>
	</div>
@endsection