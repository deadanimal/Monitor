<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

use App\Models\User;

use App\Models\Activity;
use App\Models\Projek;
use App\Models\Deliverable;
use App\Models\Notifikasi;
use App\Models\Role;
use App\Models\Organisasi;
use App\Models\Lokasi;

class PenggunaController extends Controller
{
    public function dashboard(Request $request) {

        $user = $request->user();
        $user_id = $user->id;


        if ($user->hasRole(['analyst', 'developer'])) {
            return $this->show_staff_dashboard($user);
        } else if ($user->hasRole(['client-finance', 'client-end-user', 'client-pmo'])) {
            return $this->show_client_dashboard($user);
        } else {
            return $this->show_admin_dashboard($user);
        }


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

                if ($user->hasRole(['admin'])) {  
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
                    ->addColumn('link', function (User $user) {
                        $url = '/pengguna/'.$user->id;
                        $url2 = '/jadual-staff/'.$user->id;
                        $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Teliti</button></a> <a href="'.$url2.'"><button class="btn btn-success">Jadual</button></a>';
                        return $html_button;
                    }) 
                    ->rawColumns(['link'])                            
                    ->make(true);                      
                } else {
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
                    ->addColumn('link', function (User $user) {
                        $url2 = '/jadual-staff/'.$user->id;
                        $html_button = '<a href="'.$url2.'"><button class="btn btn-success">Jadual</button></a>';
                        return $html_button;
                    })                       
                    ->rawColumns(['link'])                            
                    ->make(true);                    
                }  
        }        


        return view('pengguna.senarai', compact([
            'penggunas', 'roles', 'organisasis'
        ]));
    }  
    
    public function cipta_pengguna(Request $request) {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('PipelineForever'),
        ]); 

        $user->organisasi_id = $request->organisasi_id;
        $user->save();

        $role = Role::find($request->role_id);
        $user->attachRole($role);
        toast('Pengguna dicipta!','success');
        return back();   

    }

    public function senarai_borang_admin(Request $request) {
        $penggunas = User::all();
        $roles = Role::all();
        $orgs = Organisasi::all();        
        return view('borang', compact([
            'penggunas', 'roles', 'orgs'
        ]));
    }

    public function satu_pengguna(Request $request) {

        $id = $request->route('id');
        $user = User::find($id);  
  
        return view('pengguna.satu', compact('user'));
    }    

    public function show_admin_dashboard($user) {

        $today = date("Y-m-d");
        
        $act_lambats = Activity::where([
            ['status','=', 'CIPTA'],
            ['tarikh_rancang', '<', $today]
        ])->get();
        $act_siaps = Activity::where('status', 'PELAKSANA - SIAP')->get();
        $act_tidak_siaps = Activity::where('status', 'PELAKSANA - TIDAK SIAP')->get();
        

        return view('dashboard.admin', compact([
            'user', 'act_lambats', 'act_siaps', 'act_tidak_siaps'
        ]));
    }

    public function status() {
        $today = date("Y-m-d");
        
        $act_lambats = Activity::where([
            ['status','=', 'CIPTA'],
            ['tarikh_rancang', '<', $today]
        ])->get();
        $act_siaps = Activity::where('status', 'PELAKSANA - SIAP')->get();
        $act_tidak_siaps = Activity::where('status', 'PELAKSANA - TIDAK SIAP')->get();
        

        return view('dashboard.status', compact([
            'act_lambats', 'act_siaps', 'act_tidak_siaps'
        ]));        
    }

    public function show_client_dashboard($user) {
        $acts = Activity::all();
        $delis = Deliverable::all();
        $notis = Notifikasi::all();

        return view('dashboard.admin', compact([
            'user','acts', 'delis', 'notis'
        ]));
    }    

    public function show_staff_dashboard($user) {


        $acts = Activity::whereIn('status', ['CIPTA', 'b', 'c'])->orWhere([
            ['pekerja_id','=', $user->id]
        ])->get();
        $delis = Deliverable::where([
            ['pekerja_id','=', $user->id]
        ])->get();
        $notis = Notifikasi::where([
            ['user_id','=', $user->id]
        ])->get();
 


        return view('dashboard.staff', compact([
            'user','acts', 'delis', 'notis'
        ]));
    }   
    
    public function ubah_password(Request $req) {
        $user = $req->user();
        $req->validate([
            'password' => ['required', 'string', 'max:24'],
        ]);
        $user->password = Hash::make($req->password);
        $user->save();     
        toast('Kata laluan diubah!','success');
        return back();   
    }

    public function jadual_staff(Request $request) {
        $id = (int)$request->route('id');
        $piper = User::find($id);
        $pipers = User::where('organisasi_id', 1)->get();
        $umpa_remotes = User::where('organisasi_id', 18)->get();
        return view('dashboard.jadual_staff', compact('piper', 'pipers', 'umpa_remotes'));
    }   
    
    public function jadual_projek(Request $request) {
        $id = (int)$request->route('id');
        $projek = Projek::find($id);
        $projeks = Projek::all();
        $pipers = User::where('organisasi_id', 1)->get();
        $umpa_remotes = User::where('organisasi_id', 18)->get();
        return view('dashboard.jadual_projek', compact('projek', 'projeks', 'pipers','umpa_remotes'));
    }      
    
    public function cipta_lokasi(Request $req) {
        $user_id = $req->user()->id;

        $lokasi = New Lokasi;

        $lokasi->lat = $req->latitude_hidden;
        $lokasi->lng = $req->longitude_hidden;
        $lokasi->lokasi = $req->lokasi;
        $lokasi->user_id = $user_id;

        $lokasi->save();
        toast('Lokasi dikemaskini!','success');
        return back();   
    }

    public function senarai_lokasi(Request $req) {

        $id = (int)$req->route('id');
        $lokasi = Lokasi::where('user_id', $id)->get();

        return Datatables::collection($lokasi)
            ->addIndexColumn()
            // ->addColumn('pelaksana', function (lokasi $lokasi) {
            //     return $lokasi->pekerja->name;
            // })               
            // ->addColumn('status_', function (lokasi $lokasi) {
            //     $html_badge = '<span class="badge rounded-pill bg-primary">'.ucfirst($lokasi->status).'</span>';
            //     return $html_badge;
            // })        
            // ->addColumn('link', function (lokasi $lokasi) {
            //     $url = '/projek/'.$lokasi->projek_id.'/lokasi/'.$lokasi->id;
            //     $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>';
            //     return $html_button;
            // })     
            // ->rawColumns(['status_','link'])               
            ->make(true);      
    }    


}
