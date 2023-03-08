<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrasi\UserRequest;
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

    public function userStore(UserRequest $request)
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

        return redirect()->route('admin.user')->with('success', 'Pengguna berhasil ditambahkan');
        
    }


    public function userShow($slug)
    {
        $user = User::where('slug', $slug)->with('roles')->first();

        return view('administrasi.user.show', compact('user'));
    }

    public function userEdit($slug)
    {
        $user = User::where('slug', $slug)->with('roles')->first();

        return view('administrasi.user.edit', compact('user'));
    }

    public function userDestroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('admin.user')->with('success', 'User telah dihapus');
    }


    public function userReset($id)
    {
        
       $user = User::where('id', $id)->first();

       if(empty($user->password_default)){
        return redirect()->route('admin.user')->with('warning', 'Katasandi default belum ada');
       }

        // Make Hash Password Default
       $user->sandi_default = Hash::make($user->password_default);

       User::where('id', $id)->update([
        'password' => $user->sandi_default
       ]);

        dd($user->sandi_default);

       return redirect()->route('admin.user')->with('success', 'Reset katasandi berhasil');

    }

}
