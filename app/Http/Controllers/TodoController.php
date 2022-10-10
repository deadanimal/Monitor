<?php

namespace App\Http\Controllers;

use DataTables;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function senarai_todo(Request $req) {
        $user = $req->user();
        $user_id = $user->id;
        $todos = Todo::where('user_id', $user_id)->get();

        if ($req->ajax()) {
            return Datatables::collection($todos)
            ->addIndexColumn()      
            // ->addColumn('pelanggan', function (Activity $activity) {
            //     return $activity->organisasi->nama;
            // })         
            // ->addColumn('status_', function (Activity $activity) {
            //     $html_badge = '<span class="badge rounded-pill bg-primary">'.ucfirst($activity->status).'</span>';
            //     return $html_badge;
            // })        
            // ->addColumn('link', function (Activity $activity) {
            //     $url = '/projek/'.$activity->projek_id.'/activity/'.$activity->id;
            //     $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>';
            //     return $html_button;
            // })     
            ->rawColumns(['status_','link'])                                               
            ->make(true);  
        }

        return view('todo.senarai');
    }

    public function satu_todo(Request $req) {
        $id = (int)$req->route('id');
        $todo = Todo::find($id);
        return view('todo.satu', compact('todo'));        
    }    

    public function cipta_todo(Request $req) {
        $user = $req->user();
        $user_id = $user->id;  
        
        $todo = New Todo;
        $todo->save();

        toast('Todo dicipta!','success');
        return back();        
    }      
}
