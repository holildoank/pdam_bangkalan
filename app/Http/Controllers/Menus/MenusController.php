<?php

namespace App\Http\Controllers\Menus;

use Illuminate\Http\Request;

use App\Models\data_menu;
use App\Models\data_level_user;
use App\Models\data_menu_user;

use App\Jobs\menu\CreateMenuJob;
use App\Jobs\menu\SavePositionMenuJob;
use App\Jobs\menu\UpdateMenuJob;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{
    
    public function getIndex()
    {
        $menu = data_menu::whereStatus(1)->whereParent_id(0)->get();
        $title = 'Halaman Tambah Menu';
        return view('Menus.add_menu', [
            'parent' => $menu,
            'title' =>$title
        ]);
    }
    public function postAdd(Request $req){
        $this->dispatch(new CreateMenuJob($req->all()));
        return redirect()->back()->withNotif([
            'label' => 'success',
            'err' => 'Menu Berhasil dibuat  '
        ]);
    }
    public function postSaveposition(Request $req){
    $save = $this->dispatch(
        new SavePositionMenuJob($req->all())
    );
    
    return redirect()->back()->withNotif([
        'label' => 'success',
        'err' => 'Posisi Menu berhasil diperbaharui'
    ]);
}
public function getAccess($id = 0){
     $title = 'Halaman Setting Akases Menu';
        return view('Menus.acces_menu', [
            'level'     => data_level_user::whereStatus(1)->get(),
            'id'        => $id,
            'title'     =>$title,
        ]);
    }

    public function postSaveaccessmenu(Request $req){
        
        data_menu_user::where('id_level', $req->id_level)->delete();
        foreach($req->id_menu as $id){
            data_menu_user::create([
                'id_menu' => $id,
                'id_level' => $req->id_level
            ]);
        }

        return redirect()->back()->withNotif([
            'label' => 'success',
            'err' => 'Menu berhasil diperbaharui'
        ]);

 }
 public function getEdit($id = 0){

        if(empty($id))
            return redirect()->back();

        $menu = data_menu::whereStatus(1)
            ->whereParent_id(0)
            ->get();

        $edit = data_menu::find($id);
        $title = 'Halaman Update  Menu';
        return view('Menus.add_menu', [
            'parent'    => $menu,
            'menu'      => $edit,
            'title'     =>$title,
        ]);
    }
    public function postUpdate(Request $req){
        $this->dispatch(
            new UpdateMenuJob($req->all())
        );

        if(!empty($req->del))
            return redirect()->back()->withNotif([
                'label' => 'success',
                'err' => 'Menu berhasil diperbaharui'
            ]);
        else
            return redirect('/menu')->withNotif([
                'label' => 'success',
                'err' => 'Menu berhasil diperbaharui'
            ]);



    }
}
