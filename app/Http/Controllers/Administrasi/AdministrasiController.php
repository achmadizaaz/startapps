<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdministrasiController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(['role:super-admin|admin']);
    }

    public function index()
    {
        return view('administrasi.index');
    }

    public function show()
    {

        return view('administrasi.show');
    }

    public function create()
    {
        return view('administrasi.create');
    }

    public function store(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $telp = $request->telp;
        $role_id = $request->id;

        User::create([
            
        ]);
        return dd($request);

    }
}
