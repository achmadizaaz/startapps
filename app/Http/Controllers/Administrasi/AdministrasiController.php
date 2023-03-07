<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;

class AdministrasiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:Super Administrator|Administrator']);
    }

    public function userSession(Request $request)
    {
        $request->session()->put('kodeUnit', $request->tesSessionUnit);
        $request->session()->put('kodeRole', $request->tesSessionRole);
        
        return view('administrasi.index');
    }

    public function index()
    {

        return view('administrasi.index');
    }

    public function userIndex()
    {
        $users = User::all();

        return view('administrasi.user.index', compact('users'));
    }

    public function userCreate()
    {
        return view('administrasi.user.create');
    }

    public function userStore(Request $request)
    {
        $now = Carbon::now();
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_default' => $request->password_default,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        
        if(!empty($request->role))
        {
            $user->assignRole($request->role);
        }

        return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil ditambahkan');
        
    }


    public function userShow($slug)
    {
        $user = User::where('slug', $slug)->with('roles')->first();

    //    dd($user);
        return view('administrasi.user.show', compact('user'));
    }
}
