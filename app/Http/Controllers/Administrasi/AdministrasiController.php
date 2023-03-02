<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministrasiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin']);
    }

    public function index()
    {
        return view('administrasi.index');
    }

    public function show()
    {

        return view('administrasi.show');
    }
}
