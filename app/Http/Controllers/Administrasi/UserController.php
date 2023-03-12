<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Administrasi\UserRequest;
use App\Http\Requests\Administrasi\UserUpdateRequest;
use App\Models\User;
use App\Models\Administrasi\Unit;
use App\Models\Administrasi\RoleUnit;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_default' => $request->password_default,
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

    public function userUpdate(UserUpdateRequest $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->slug = null;
        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'password_default' => $request->password_default
        ]);

        
        // dd($find);

        return redirect()->route('admin.user.show', $user->slug)->with('success', 'Data pengguna berhasil diperbarui');
        
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
        return redirect()->route('admin.user')->with('failed', $user->name. ' : Katasandi default belum disetting');
       }

        // Make Hash Password Default
       $user->sandi_default = Hash::make($user->password_default);
       
       User::where('id', $id)->update([
        'password' => $user->sandi_default
       ]);

       return redirect()->route('admin.user')->with('success', $user->name. ': Reset katasandi telah berhasil dilakukan');

    }

    public function userRole($slug)
    {
        $roles = Role::all();
        $units = Unit::all();
       
        $user = User::where('slug', $slug)->first();

        $roleUnits = RoleUnit::where('user_id', $user->id)->get();

        // dd($units);
        return view('administrasi.user.role', compact('roles', 'units', 'user', 'roleUnits'));
    }

    public function UserTambahRole(Request $request)
    {
        $role = Role::find($request->role_id);

        $user = User::find($request->user_id);

        $user->assignRole($role);

        RoleUnit::create([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
            'unit_id' => $request->unit_id,
        ]);

        return back()->with('success', 'Role dan Unit Pengguna berhasil ditambahkan');
    }


    public function UserDestroyRole($id)
    {
        $roleUnit = RoleUnit::find($id);

        $user = User::find($roleUnit->user_id);
        $user->removeRole($roleUnit->role->name);

        $roleUnit->delete();

        return back()->with('success', 'Role unit pengguna telah dihapus');
    }



}
