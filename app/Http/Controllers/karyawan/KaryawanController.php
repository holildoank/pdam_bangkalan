<?php

namespace App\Http\Controllers\karyawan;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\Karyawan\InsertKaryawanJob;
use App\Jobs\Karyawan\UpdateKaryawanJob;
use App\Models\data_karyawan;
use App\Models\ref_profesi;

class KaryawanController extends Controller
{

    public function getIndex()
    {   $data=data_karyawan::carisemua()->paginate(10);
        $items=ref_profesi::all();
        $title ='Data Karyawan';
        return view('karyawan.list-karyawan',[
            'data' => $data,
            'title' =>$title,
            'items'  =>$items,
            ]);
    }
    public function getAdd(){
         $tipe=0;
         $title = 'Halaman Tambah Karyawan';

          return view('karyawan.add_karyawan',[
             'tipe'    =>$tipe,
             'title'   =>$title,
             'profesi' =>ref_profesi::all(),
            ]);

    }
    public function postAdd(Request $req){

        $data = $this->dispatch(new InsertKaryawanJob($req->all()));
        return redirect()->back()->withNotif([
            'label' => 'success',
            'err' => $req->nm_depan . ' berhasil tersimpan di Database'
            ]);

    }
   public function getEdit($id)
         {
         $karyawan = data_karyawan::find($id);
         $tipe=1;
         $title ='Update Data karyawan';
        return view('karyawan.add_karyawan',[
            'karyawan' => $karyawan,
            'tipe' =>$tipe,
            'title' =>$title,
            'profesi' =>ref_profesi::all(),
            ]);
        }

      public function postEdit(Request $req){
        $this->dispatch(new UpdateKaryawanJob($req->all()));
        return redirect('/karyawan')->withNotif([
            'label' =>'info',
            'err'   => 'Data karyawan Berhasil diperbaharui'
            ]);
    }

      public function postDestroy(Request $req){
        if($req->ajax()){
        data_karyawan::find($req->id)->delete();
      return json_encode([
        'result' => true
        ]);
        }
    }
   public function getAllkaryawan(Request $req){
    if($req->ajax()){
      $result = [];
      $items=data_karyawan::cari($req->nm_depan, $req->profesi, $req->all())->paginate($req->limit);

         $out ='';
        $total = $items->total();
        if($total > 0):
             $no = $items->currentPage() == 1 ? 1 : ($items->perPage() * $items->currentPage()) - $items->perPage() + 1;
         foreach ($items as $item) {
             $out .= '
                      <tr class="karyawan_'.$item->id_karyawan.'">
                            <td>'.$no.'</td>
                            <td>
                                <a href="javascript:;" title="'.$item->nm_depan.' &nbsp;'.$item->nm_belakang.'" data-toggle="tooltip" data-placement="bottom">'. $item->nm_depan .' &nbsp; '.$item->nm_belakang.'</a>

                            </td>
                             <td>'. $item->alamat  .'</td>
                             <td>'.$item->nm_profesi.'</td>
                             <td>'. \Format::indoDate2($item->created_at) .' &nbsp;'. \Format::hari($item->created_at) .', '. \Format::jam($item->created_at) .'</td>
                             <td>
                             <div class="link text-muted">
                                 <small>
                                      <a href="'. url('/karyawan/edit/'.$item->id_karyawan) .'" title="Edi karyawan" class="btn btn-success"><i class="fa fa-pencil"></i></a>

                                      <a href="javascript:;" onclick="destroy('. $item->id_karyawan.');" title="Hapus Data karyawan" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
                                   </small>
                             </div>
                             </td>
                        </tr>
                    ';

                    $no++;
                }
        else:
            $out = '
                <tr>
                <td colspan="7">Tidak ditemukan</td>
                </tr>
            ';
        endif;
         $result['data'] = $out;
        $result['pagin'] = $items->render();
        $result['total'] = $total;
        return json_encode($result);

        }else{
            return redirect('/karyawan');
        }

    }
}
