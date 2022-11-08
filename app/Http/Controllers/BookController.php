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
                'nama_pengguna' => 'required',
                'no_hp' => 'required',
                'no_kamar' => 'required',
                'lokasi' => 'required',
            ]);

            MidTest::create([
                'nama_pengguna' => $request->nama_pengguna,
                'no_hp' => $request->no_hp,
                'no_kamar' => $request->no_kamar,
                'lokasi' => $request->lokasi,

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
                'nama_pengguna' => 'required',
                'no_hp' => 'required',
                'no_kamar' => 'required',
                'lokasi' => 'required',

            ]);

            $data = MidTest::where('nama_pengguna', $request->nama_pengguna)->delete();

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
                'nama_pengguna' => 'required',
                'no_hp' => 'required',
                'no_kamar' => 'required',
                'lokasi' => 'required',
            ]);

            $data = MidTest::where('nama_pengguna', $request->nama_pengguna)->update([
                'nama_pengguna' => $request->nama_pengguna,
                'no_hp' => $request->no_hp,
                'no_kamar' => $request->no_kamar,
                'lokasi' => $request->lokasi,
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
