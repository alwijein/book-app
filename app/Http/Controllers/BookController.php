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
                'nama_pembeli' => 'required',
                'menu' => 'required',
                'harga' => 'required',
                'banyak' => 'required',
            ]);

            MidTest::create([
                'nama_pembeli' => $request->nama_pembeli,
                'menu' => $request->menu,
                'harga' => $request->harga,
                'banyak' => $request->banyak,
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
                'nama_pembeli' => 'required',
                'menu' => 'required',
                'harga' => 'required',
                'banyak' => 'required',

            ]);

            $data = MidTest::where('nama_pembeli', $request->nama_pembeli)->delete();

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
                'nama_pembeli' => 'required',
                'menu' => 'required',
                'harga' => 'required',
                'banyak' => 'required',
            ]);

            $data = MidTest::where('nama_pembeli', $request->nama_pembeli)->update([
                'nama_pembeli' => $request->nama_pembeli,
                'menu' => $request->menu,
                'harga' => $request->harga,
                'banyak' => $request->banyak,
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
