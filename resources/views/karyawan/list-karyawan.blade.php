@extends('layouts.main')

@section('csstop')

@section('meta')
<script type="text/javascript" src="{{ asset('js/karyawan/view.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-9">
        <div class="box">
            <div class="box-header">

            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                @include('layouts.notifikasi')
                <table class="table table-striped table-flip-scroll cf">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th>Tanggal Bergabung</th>
                            <th></th>
                        </tr>
                    </thead>
                   <tbody class="allkaryawan">
                    <?php $no = $data->currentPage() == 1 ? 1 : ($data->perPage() + $data->currentPage()) -1 ; ?>
                        @if(count($data))
                        @forelse($data as $item)
                        <tr class="ustad_{{$item->id_karyawan}}">
                            <td>{{ $no }}</td>
                            <td>
                                <a href="javascript:;" title="{{ $item->nm_depan}} &nbsp;{{$item->nm_belakang}} " data-toggle="tooltip" data-placement="bottom">{{ $item->nm_depan}} &nbsp;{{$item->nm_belakang}}</a>

                            </td>
                             <td>{{ $item->alamat  }}</td>
                             <td>{{$item->nm_profesi}}</td>
                             <td>{{ Format::indoDate2($item->created_at) }} &nbsp;{{ Format::hari($item->created_at) }}, {{ Format::jam($item->created_at) }}</td>
                             <td>
                               <div class="link text-muted">
                                   <small>
                                        <a href="{{ url('/karyawan/edit/'.$item->id_karyawan) }}" title="Edi ustad" class="btn btn-success"><i class="fa fa-pencil"></i></a>

                                        <a href="javascript:;" onclick="destroy({{ $item->id_karyawan}});" title="Hapus Data karyawan" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
                                     </small>
                               </div>
                             </td>
                        </tr>
                        <?php $no++; ?>
                        @empty

                        @endforelse
                        @else
                        <tr>
                            <td colspan="8"><i>Data Tidak Ada</i></td>
                        </tr>
                        @endif
                    </tbody>
                    </table>
                    <div class="text-right nav-pagin">
                    {!! $data->render() !!}
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
        <div class="col-sm-3">
             <div class="box">
            <div class="box-body table-responsive">
                    <div class="form-group">
                    <a href="{{URL::to('karyawan/add')}}" class="btn btn-block btn-success "><i class="fa fa-plus"></i>Tambah Data karyawan</a>
                    </div>
                    <div class="form-group">
                        <label>Nama karyawan</label>
                        <input type="text" name="nm_depan" placeholder="Nama Depan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>profesi</label>
                       <select name="id_profesi" required class="form-control">
                        <option value="">Pilih Profesi</option>
                        @foreach ($items as $profesi)
                                <option value="{{$profesi->id_profesi}}">{{$profesi->nm_profesi}} </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label>Limit / Page</label>
                        <select name="limit" class="form-control">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="500">500</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-block btn-success carikaryawan"><i class="fa fa-search"></i> Cari</button>
                    </div>

                    </div>
                </div>
            </div>

@endsection
