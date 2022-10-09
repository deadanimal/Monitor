<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

use App\Models\User;

use App\Models\Activity;
use App\Models\Deliverable;
use App\Models\Notifikasi;
use App\Models\Role;
use App\Models\Organisasi;

class PenggunaController extends Controller
{
    public function dashboard(Request $request) {

        $user = $request->user();
        $user_id = $user->id;

        $aktivitis = Activity::all();
        $deliverables = Deliverable::all();
        $notis = Notifikasi::all();



        return view('dashboard', compact([
            'user', 'aktivitis', 'deliverables', 'notis'
        ]));
    }

    public function profil(Request $request) {

        $user = $request->user();
        $user_id = $user->id;
        

        return view('pengguna.profil', compact('user'));
    }  
    
    public function log(Request $request) {

        $user = $request->user();
        $user_id = $user->id;

        return view('log', compact('user'));
    }  
    
    public function lokasi(Request $request) {

        $user = $request->user();
        $user_id = $user->id;

        return view('log', compact('user'));
    }    
    
    public function senarai_pengguna(Request $request) {

        $user = $request->user();
        $user_id = $user->id;

        $penggunas = User::all();
        $roles = Role::all();
        $organisasis = Organisasi::all();

        if ($request->ajax()) {
            return Datatables::collection(User::all())
                ->addIndexColumn()
                ->addColumn('organisasi', function (User $user) {
                    return $user->organisasi->nama;
                })
                ->addColumn('role', function (User $user) {
                    $statement = '';
                    foreach ($user->roles as $role) {
                        $statement .= $role->display_name.' ';
                    }
                    return $statement;
                })                
                ->make(true);
        }        


        return view('pengguna.senarai', compact([
            'penggunas', 'roles', 'organisasis'
        ]));
    }  
    
    public function cipta_pengguna(Request $request) {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('PabloEscobar'),
        ]); 

        $user->organisasi_id = $request->organisasi_id;
        $user->save();

        $role = Role::find($request->role_id);
        $user->attachRole($role);

        return redirect('/pengguna');

    }

    public function senarai_borang_admin(Request $request) {
        $penggunas = User::all();
        $roles = Role::all();
        $orgs = Organisasi::all();        
        return view('borang', compact([
            'penggunas', 'roles', 'orgs'
        ]));
    }


}
