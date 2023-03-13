<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use App\Models\Administrasi\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return view('administrasi.unit.index', compact('units'));
    }

    public function create()
    {
        return view('administrasi.unit.create');
    }

    public function store(Request $request)
    {

        Unit::create([
            'kode_unit' => $request->kode_unit,
            'nama_unit' => $request->nama_unit,
        ]);

        return redirect()->route('admin.unit')->with('success', 'Unit berhasil ditambahkan');
    }

    public function edit($slug)
    {
        $unit = Unit::where('slug', $slug)->first();
        return view('administrasi.unit.edit', compact('unit'));
    }

    public function update(Request $request)
    {
        $id = $request->unit_id;

        Unit::where('id', $request->unit_id)->update([
            'kode_unit' => $request->kode_unit,
            'nama_unit' => $request->nama_unit
        ]);

        return redirect()->route('admin.unit')->with('success', 'Unit berhasil diperbarui');

    }

    public function destroy($id)
    {
        Unit::where('id', $id)->delete();

        return back()->with('success', 'Unit berhasil dihapus');

    }

    public function primary(Request $request)
    {

        // dd($request->primary);
        
        // Primary to 1
        if($request->primary == 'on'){
            Unit::where('slug', $request->slug)
                ->update(['primary' => 0]);

            return back()->with('success', 'Status primary telah dinonaktifkan');
        }
       
        Unit::where('primary', 1)
                ->update(['primary' => 0]);

        Unit::where('slug', $request->slug)->update(['primary' => 1]);
        
        return back()->with('success', 'Status primary telah diubah');

    }


}
