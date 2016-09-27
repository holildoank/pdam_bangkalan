<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\data_karyawan;
use App\Models\data_level_user;

use App\Http\Requests\Users\AddUserRequest;

use App\Jobs\User\CreateUserJob;
class UsersController extends Controller
{

    public function getIndex()
    {
     $users=User::paginate(10);
     $permission = [
        1 => 'Read',
        2 => 'Write',
        3 => 'Execute'
        ];
        $title ='Halaman Data User';
        return view('users.index', [
        'users' =>$users,
        'title' =>$title,
        'permission' =>$permission,
        ]);
    }

    public function getAdd(){

        $karyawan  =data_karyawan::leftJoin('users', 'users.id_karyawan', '=', 'data_karyawan.id_karyawan')
        ->whereNull('users.id_user')
        ->select('data_karyawan.id_karyawan', 'data_karyawan.nm_depan', 'data_karyawan.nm_belakang')
        ->get();
        $levels = data_level_user::whereStatus(1)->get();
        $title ='Halaman Tambah Pengguna';
        return view('users.create',[
            'title' =>$title,
            'karyawan' =>$karyawan,
            'levels' =>$levels,
            ]);
    }
    public function postAdd(Request $req){
        $user = $this->dispatch(new CreateUserJob($req->all()));
        return redirect()->back()->withNotif([
            'label' => 'success',
            'err' => $user->name . ' berhasil ditambahkan sebagai Pengguna <a href="' . url('/user') . '" class="btn btn-danger btn-mini pull-right btn-xs"><b>Lihat daftar</b></a>'
            ]);
    }
    public function getAllitems(Request $req){
        if($req->ajax()):
            $res = [];

        $items = User::where('username','like',$req->src.'%')
        ->orWhere('name','like',$req->src.'%')
        ->paginate(10);

        $permission = [
        1 => 'Read',
        2 => 'Write',
        3 => 'Execute'
        ];

        $out = '';
        if($items->total() > 0){
            $no = $items->currentPage() == 1 ? 1 : ($items->perPage() * $items->currentPage()) - $items->perPage() + 1;
            foreach($items as $item){

                    $out .= '
                    <tr class="item_' .  $item->id . ' items">
                        <td>'. $item->name .'  </td>
                            <td>'. $item->username .'</td>
                            <td>
                            <div>'. $permission[$item->permission] .'</div>
                            <div class="text-muted"><small>'. \Format::hari($item->created_at) .' '.  \Format::jam($item->created_at) .'</small></div>
                            </td>
                            <td><a href="'. url('/santri/edit/'.$item->id_user) .'" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                        <a href="'.url('/santri/destroy' ,$item->id_user) .'" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        ';
                        $no++;
                    }
                }else{
                    $out = '
                    <tr>
                        <td colspan="5">Data User Tidak ditemukan</td>
                    </tr>
                    ';
                }

                $res['data'] = $out;
                $res['pagin'] = $items->render();

                return json_encode($res);

                endif;
            }
}
