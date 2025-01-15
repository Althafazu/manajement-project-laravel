<?php

namespace App\Http\Controllers;

use App\Models\Bombot;

//import return type View
use Illuminate\View\View;

use Illuminate\Support\Facades\Storage;

//import return type redirectResponse
use Illuminate\Http\Request;

//import Http Request
use Illuminate\Http\Response; 
use Illuminate\Http\RedirectResponse;

class BombotController extends Controller
{
    /**
     * index
     *
     * @return void
     */

    public function index() : View
    {
        // ambil semua data bom & bot dari database sejumlah 10 
        $bombot = Bombot::paginate(10);
        // tampilkan view index dan passing data bom & bot
        return view('bombot.index', compact('bombot'));
    }

    public function create() : View 
    {
        return view('bombot.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // validasi input form
        $request->validate([
            'prj_id' => 'required',
            'bt_no_pp' => 'required',
            'bbt_nama_material' => 'required',
            'bbt_jumlah' => 'required|integer',
            'bbt_satuan' => 'required',
            'bbt_jumlah_actual' => 'required|integer',
            'bbt_harga' => 'required|numeric',
        ]);

        // simpan ke dalam database
        Bombot::create([
            'prj_id' => $request->prj_id,
            'bbt_no_pp' => $request->bbt_no_pp,
            'bbt_nama_material' => $request->bbt_nama_material,
            'bbt_jumlah' => $request->bbt_jumlah,
            'bbt_satuan' => $request->bbt_satuan,
            'bbt_jumlah_actual' => $request->bbt_jumlah_actual,
            'bbt_harga' => $request->bbt_harga,
            'bbt_status' => 'Belum Diproses'
        ]);

        // redirect ke halaman index
        return redirect()->route('bombot.index')->with(['success' => 'Data berhasil disimpan']);
    }

    public function edit(string $id): View
    {
        $bombot = Bombot::findOrFail($id);
        return view('bombot.edit', compact('bombot'));
    }

    public function update(Request $request, $id):RedirectResponse
    {
        $request->validate([
            'prj_id' => 'required',
            'bbt_no_pp' => 'required',
            'bbt_nama_material' => 'required',
            'bbt_jumlah' => 'required|integer',
            'bbt_satuan' => 'required',
            'bbt_harga' => 'required|numeric',
            'bbt_jumlah_actual' => 'required',
            'bbt_status' => 'required' 
        ]);
        
        Bombot::findOrFail($id)->update([
            'prj_id' => $request->prj_id,
            'bbt_no_pp' => $request->bbt_no_pp,
            'bbt_nama_material' => $request->bbt_nama_material,
            'bbt_jumlah' => $request->bbt_jumlah,
            'bbt_satuan' => $request->bbt_satuan,
            'bbt_jumlah_actual' => $request->bbt_jumlah_actual,
            'bbt_harga' => $request->bbt_harga,
            'bbt_status' => $request->bbt_status
        ]);

        return redirect()->route('bombot.index')->with(['success' => 'Data berhasil diupdate']);
    }

    public function destroy(string $id)
    {
        // hapus data bom & bot berdasarkan id
        $bombot = Bombot::findOrFail($id);
        $bombot->delete();

        // redirect ke halaman index
        return redirect()->route('bombot.index')->with(['success' => 'Data berhasil dihapus']);
    }
}


