<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MidTest;

class BookController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function showTable()
    {
        $menus = MidTest::all();
        return view('show_table', compact('menus'));
    }

    public function showMenu()
    {
        return view('menu');
    }


    public function tambahBuku(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'nama_pemesan' => 'required',
                'no_hp' => 'required',
                'nama_kereta' => 'required',
                'stasiun_tujuan' => 'required',
                'harga_tiket' => 'required',
                'jumlah_tiket' => 'required',
            ]);

            MidTest::create([
                'nama_pemesan' => $request->nama_pemesan,
                'no_hp' => $request->no_hp,
                'nama_kereta' => $request->nama_kereta,
                'stasiun_tujuan' => $request->stasiun_tujuan,
                'stasiun_tujuan' => $request->stasiun_tujuan,
                'harga_tiket' => $request->harga_tiket,
                'harga_tiket' => $request->harga_tiket,
                'jumlah_tiket' => $request->jumlah_tiket,
            ]);

            return json_encode(array(
                "statusCode" => 200
            ));
        }
    }

    public function hapusBuku(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'nama_pemesan' => 'required',
                'no_hp' => 'required',
                'nama_kereta' => 'required',
                'stasiun_tujuan' => 'required',
                'harga_tiket' => 'required',
                'jumlah_tiket' => 'required',

            ]);

            $data = MidTest::where('nama_pemesan', $request->nama_pemesan)->delete();

            if ($data == null) {

                return json_encode(array(
                    "statusCode" => 201
                ));
            } else {

                return json_encode(array(
                    "statusCode" => 200
                ));
            }
        }
    }

    public function editBuku(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'nama_pemesan' => 'required',
                'no_hp' => 'required',
                'nama_kereta' => 'required',
                'stasiun_tujuan' => 'required',
                'harga_tiket' => 'required',
                'jumlah_tiket' => 'required',
            ]);

            $data = MidTest::where('nama_pemesan', $request->nama_pemesan)->update([
                'nama_pemesan' => $request->nama_pemesan,
                'no_hp' => $request->no_hp,
                'nama_kereta' => $request->nama_kereta,
                'stasiun_tujuan' => $request->stasiun_tujuan,
                'stasiun_tujuan' => $request->stasiun_tujuan,
                'harga_tiket' => $request->harga_tiket,
                'harga_tiket' => $request->harga_tiket,
                'jumlah_tiket' => $request->jumlah_tiket,
            ]);

            if ($data == null) {

                return json_encode(array(
                    "statusCode" => 201
                ));
            } else {

                return json_encode(array(
                    "statusCode" => 200
                ));
            }
        }
    }
}
