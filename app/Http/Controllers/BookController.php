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
                'nama_pasien' => 'required',
                'alamat' => 'required',
                'nomor_telp' => 'required',
                'vaksin' => 'required',
            ]);

            MidTest::create([
                'nama_pasien' => $request->nama_pasien,
                'alamat' => $request->alamat,
                'nomor_telp' => $request->nomor_telp,
                'vaksin' => $request->vaksin,
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
                'nama_pasien' => 'required',
                'alamat' => 'required',
                'nomor_telp' => 'required',
                'vaksin' => 'required',

            ]);

            $data = MidTest::where('nama_pasien', $request->nama_pasien)->delete();

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
                'nama_pasien' => 'required',
                'alamat' => 'required',
                'nomor_telp' => 'required',
                'vaksin' => 'required',
            ]);

            $data = MidTest::where('nama_pasien', $request->nama_pasien)->update([
                'nama_pasien' => $request->nama_pasien,
                'alamat' => $request->alamat,
                'nomor_telp' => $request->nomor_telp,
                'vaksin' => $request->vaksin,
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
