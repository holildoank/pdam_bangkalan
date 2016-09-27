@extends('layouts.main')

@section('css')


@stop

@section('content')
<div class="row">
    <div class="col-sm-9">
        <div class="box">
            <div class="box-header">
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                @include('layouts.notifikasi')
                <table  class="table table-bordered table-striped" id="tblKamar">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Akses</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody class="contents-items">
 							<?php $no = 1; ?>
                                @forelse($users as $item)
                                <tr class="item_{{$item->id_user}} items" >
                                 
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->username}}</td>
                                        <td>{{ $permission[$item->permission] }}
                                        </div>
                                          <div class="text-muted"><small>{{ \Format::hari($item->created_at) }}{{   \Format::jam($item->created_at)}} </small></div></td>
                         
                             
                                        <td width="100px">
                                         <a href="{{ url('/santri/edit/'.$item->id_user) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                        <a href="{{url('/santri/destroy' ,$item->id_user) }}" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
                                        </td>

                                    </tr>
                                    <?php $no++; ?>
                            @empty
                            <tr>
                                <td colspan="8">Tidak ditemukan</td>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="text-right paginresep">
                        {!! $users->render() !!}
                    </div>
                    </tbody>
               
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="col-sm-3">
			  <div class="box">
            <div class="box-body table-responsive">
					<div class="form-group">
						<a class="btn btn-block btn-primary cari-user" href="{{ url('/user/add') }}"><i class="fa fa-plus"></i> Tambah Pengguna</a></button>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="src" class="form-control">
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
						<button class="btn btn-block btn-primary cari-user"><i class="fa fa-search"></i> Cari</button>
					</div>

					</div>
				</div>

			</div>
    </div>






@stop

@section('js')
<script type="text/javascript" src="{{ asset('/js/user/user.js') }}"></script>

@stop