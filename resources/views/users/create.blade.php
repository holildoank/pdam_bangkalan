@extends('layouts.main')

@section('csstop')

<style>
    .garis{
        margin-top: 0;
        margin-bottom: 10px;
    }
</style>
@stop
@section('meta')
<link href="{{ asset('/js/select/select2.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<script src="{{ asset('js/select/select2.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
        $(function(){
            $('#source').select2({
                placeholder: "Pilih nama Pengguna..."
            });
            $('#multis').select2({
                placeholder: "Pilih Levels..."
            });
        });
    </script>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="box">
            <div class="box-header">
            <div class="box-body center">
                 <form action="{{ url('user/add') }}" method="post">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @include('layouts.notifikasi')
                    <div class="box-header">
                        <h3>Tambah <span class="semi-bold">Pengguna</span></h3>
                    </div>
                    <hr class="garis">
                    <div class="form-group">
                          <label for="nama_belakang" class="control-label col-xs-4">Nama pengurus*</label>
                           <div class="col-xs-8">
                                <select id="source" name="id_karyawan" style="width:100%" required>
                                    <option value="">Pilih</option>
                                    @foreach($karyawan as $staf)
                                        <option value="{{ $staf->id_karyawan }}" {{ old('karyawan') == $staf->id_karyawan ? 'selected="selected"' : '' }}>{{ $staf->nm_depan }} {{ $staf->nm_belakang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <br><br>

                     <div class="form-group">
                       <label for="nama_belakang" class="control-label col-xs-4">Username *</label>
                        <div class="col-xs-8">
                           <input type="text" name="username" value="{{ old('username') }}" class="form-control" required>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="tgl_lahir" class="control-label col-xs-4">Password *</label>
                        <div class="col-xs-8">
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                          <label for="tgl_lahir" class="control-label col-xs-4">Permission *</label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="radio radio-success">
                                    <input id="read" type="radio" name="permission" value="1" checked="checked">
                                    <label for="read">Read</label>
                                    <input id="write" type="radio" name="permission" value="2">
                                    <label for="write">Write</label>
                                    <input id="execute" type="radio" name="permission" value="3">
                                    <label for="execute">Execute</label>
                                 </div>
                            </div>
                        </div>
                    <div class="form-group">
                           <label for="tgl_lahir" class="control-label col-xs-4">Levels *</label>
                            <span class="help"></span>
                            <div class="col-xs-8">
                                <select id="multis" style="width:100%" multiple required name="levels[]">
                                    @foreach($levels as $level)
                                        <option value="{{ $level->id_level_user }}">{{ $level->nm_level }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                  <br><br>
                    <hr class="garis">
                    <div class="form-group">
                        <div class="text-right">
                            <button class="btn btn-primary pull-left" type="submit">Simpan</button>
                            <a href="{{ url('/user') }}" class="btn btn-link">Batal</a>
                        </div>

                    </div>
                </form>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
