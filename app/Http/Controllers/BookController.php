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
                'nama_menu' => 'required',
                'harga_menu' => 'required',
                'banyak' => 'required',
            ]);

            MidTest::create([
                'nama_menu' => $request->nama_menu,
                'harga_menu' => $request->harga_menu,
                'banyak' => $request->banyak,
                'total' => $request->banyak * $request->harga_menu,

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
                'nama_menu' => 'required',
                'harga_menu' => 'required',
                'banyak' => 'required',

            ]);

            $data = MidTest::where('nama_menu', $request->nama_menu)->delete();

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
                'nama_menu' => 'required',
                'harga_menu' => 'required',
                'banyak' => 'required',
            ]);

            $data = MidTest::where('nama_menu', $request->nama_menu)->update([
                'nama_menu' => $request->nama_menu,
                'harga_menu' => $request->harga_menu,
                'banyak' => $request->banyak,
                'total' => $request->banyak * $request->harga_menu,
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
