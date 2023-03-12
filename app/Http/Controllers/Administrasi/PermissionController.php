<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('administrasi.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('administrasi.permission.create');
    }

    public function store(Request $request)
    {
        $permission = Permission::where('name', $request->permission)->first();
        if(!empty($permission->name))
        {
            return back()->with('failed', 'Gagal menambahkan permission, karena sudah tersedia');
        }
        Permission::create(['name' => $request->permission]);

        return back()->with('success', 'Permission berhasil ditambahkan');


    }

    public function destroy($id){
        Permission::find($id)->delete();

        return back()->with('success', 'Permission berhasil dihapus');
    }
}
