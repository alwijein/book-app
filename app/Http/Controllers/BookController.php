<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MidTest;

class BookController extends Controller
{
    public function index()
    {
        $books = MidTest::all();
        return view('agenda_publik', compact('books'));
    }

    public function tambahBuku(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'kode_buku' => 'required',
                'nama_buku' => 'required',
            ]);

            MidTest::create([
                'kode_buku' => $request->kode_buku,
                'nama_buku' => $request->nama_buku,
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
                'kode_buku' => 'required',
                'nama_buku' => 'required',
            ]);

            $data = MidTest::where('kode_buku', $request->kode_buku)->delete();

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
                'kode_buku' => 'required',
                'nama_buku' => 'required',
            ]);

            $data = MidTest::where('kode_buku', $request->kode_buku)->update([
                'kode_buku' => $request->kode_buku,
                'nama_buku' => $request->nama_buku,
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
