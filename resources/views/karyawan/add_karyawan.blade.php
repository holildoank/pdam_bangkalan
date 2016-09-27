
@extends('layouts.main')

@section('csstop')
<style>
    .garis{
        margin-top: 0;
        margin-bottom: 10px;
    }
</style>
@endsection

@section('meta')
<!-- <script type="text/javascript" src="{{ asset('js/izin/create.js') }}"></script> -->
<script type="text/javascript">
    $(function(){
            var checkin = $('#dpd1').datepicker({
                format : 'yyyy-mm-dd'
            }).on('changeDate', function(ev) {
                if (ev.date.valueOf() > checkout.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    checkout.setValue(newDate);
                }
                checkin.hide();
                $('#dpd2')[0].focus();
            }).data('datepicker');



            // date pic /////////////////////////////////////////
            var checkinb = $('#dpd3').datepicker({
                format : 'yyyy-mm-dd'
            }).on('changeDate', function(ev) {
                if (ev.date.valueOf() > checkoutb.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    checkoutb.setValue(newDate);
                }
                checkinb.hide();
                $('#dpd4')[0].focus();
            }).data('datepicker');

            var checkoutb = $('#dpd4').datepicker({
                onRender: function(date) {
                    return date.valueOf() <= checkinb.date.valueOf() ? 'disabled' : '';
                },
                format : 'yyyy-mm-dd'
            }).on('changeDate', function(ev) {
                checkoutb.hide();
            }).data('datepicker');

            $('form').submit(function(){
                $('[type="submit"]').button('reset');
                $('body').css('cursor', 'default');
            });
        });
</script>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-11">
        <div class="box">
            <div class="box-header">


            <div class="box-body center">
              @if($tipe==1)
              <form action="{{ url('karyawan/edit') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @else
                 <form action="{{ url('karyawan/add') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @endif

                    @include('layouts.notifikasi')
                        <input type="hidden" name="id_karyawan" value="{{isset($karyawan->id_karyawan) ? $karyawan->id_karyawan : ''}}"/>
                        <div class="box-header">
                            <h3 class="box-title">Data Guru</h3>
                        </div>
                    <hr class="garis">

                    <div class="form-group">
                        <label for="nama_depan" class="control-label col-xs-4">Nama Depan</label>
                        <div class="col-xs-6">
                            <input type="text" name="nm_depan" placeholder="Masukan Nama Depan" class="form-control " value="{{isset($karyawan->nm_depan) ? $karyawan->nm_depan : ''}}"required=""/>
                        </div>
                    </div>
                    <br><br>

                     <div class="form-group">
                        <label for="nama_belakang" class="control-label col-xs-4">Nama Belakang</label>
                        <div class="col-xs-6">
                            <input type="text" name="nm_belakang"  placeholder="Masukan Nama Belakan"class="form-control" value="{{isset($karyawan->nm_belakang) ? $karyawan->nm_belakang : ''}}"required=""/>
                        </div>
                    </div>
                    <br><br>

                    <div class="form-group">
                        <label for="telp" class="control-label col-xs-4">No Hp</label>
                        <div class="col-xs-7">
                            <!-- <input type="number" name="telp"  placeholder="Masukan No Hp "class="form-control" value="{{isset($karyawan->telp) ? $karyawan->telp : ''}}"required=""/> -->
                            <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" name="telp"  value="{{isset($karyawan->telp) ? $karyawan->telp : ''}}"required="" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                          </div>
                        </div>
                    </div>
                    <br><br>

                    <div class="form-group">
                        <label for="telp" class="control-label col-xs-4">Tempat Lahir</label>
                        <div class="col-xs-8">
                            <input type="text" name="tempat_lahir"  placeholder="Masukan Tempat Lahir "class="form-control" value="{{isset($karyawan->telp) ? $karyawan->tempat_lahir : ''}}"required=""/>
                        </div>
                    </div>
                    <br><br>

                    <div class="form-group">
                        <label for="tgl_lahir" class="control-label col-xs-4">Tanggal Lahir</label>
                        <div class="col-xs-5">
                            <input type="date" name="tgl_lahir"  placeholder="Masukan Tanggal Lahir " class="form-control"  readonly="readonly" value="{{ date('Y-m-d') }}" id="dpd1"  required=""/>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="nama" class="control-label col-xs-4">jenis Kelamin</label>
                        <div class="col-xs-5">
                           <select class="form-control" name="sex" value="" id="sex" required>
                             <option value="">Pilih jenis Kelamin</option>
                             <option value="1">Laki-laki</option>
                             <option value="2">Perempuan</option>
                             </select>
                    </div>
                    </div>
                    <br><br>
                  <div class="form=group">
                    <label for="profesi" class="control-label col-xs-4">Profesi</label>
                      <div class="col-xs-5">
                          <select class="form-control select2" style="width: 100%;" name="id_profesi" required="">

                              @foreach($profesi as $k)

                                <option value="{{$k->id_profesi}}"{{empty($karyawan) ? '' : $k->id_profesi == $karyawan->id_profesi ? 'selected="selected"' : ''}}>{{$k->nm_profesi}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <br><br>
                    <div class="form-group">
                        <label for="alamat" class="control-label col-xs-4">Tempat Tinggal</label>
                             <div class="col-xs-8">

                             <input type="hidden" value="{{ date('m/d/Y') }}" name="tgl_bergabung" id="tgl_bergabung" class="form-control" readonly="readonly">
                            <input type="text" name="alamat"  placeholder="Masukan Alamat  "class="form-control" value="{{isset($karyawan->alamat) ? $karyawan->alamat : ''}}"required=""/>
                        </div>
                    </div>
                    <br><br>
                    <hr class="garis">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="submit" class="btn btn-primary pull-right" value="Simpan"/>
                        </div>
                    </div>
                </form>
                 </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')

@stop
