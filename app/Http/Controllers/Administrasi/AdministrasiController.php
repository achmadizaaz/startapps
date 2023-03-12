<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;


class AdministrasiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:Super Administrator|Administrator']);
    }

    public function index()
    {
        return view('administrasi.index');
    }


    // END CONTROLLER
}
