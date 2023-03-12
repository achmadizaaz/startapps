<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('administrasi.role.index', compact('roles'));
    }

    public function create()
    {
        return view('administrasi.role.create');
    }

    public function store(Request $request)
    {
        $role = Role::where('name', $request->role)->first();
        if(!empty($role->name))
        {
            return back()->with('failed', 'Gagal menambahkan role, nama role sudah tersedia');
        }
        Role::create(['name' => $request->role]);

        return back()->with('success', 'Role berhasil ditambahkan');


    }

    public function destroy($id){
        Role::find($id)->delete();

        return back()->with('success', 'Role berhasil dihapus');
    }
}
