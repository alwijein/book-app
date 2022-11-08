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
                'user_id' => 'required',
                'team_name' => 'required',
                'player_id' => 'required',
                'player_fullname' => 'required',
            ]);

            MidTest::create([
                'user_id' => $request->user_id,
                'team_name' => $request->team_name,
                'player_id' => $request->player_id,
                'player_fullname' => $request->player_fullname,
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
                'user_id' => 'required',
                'team_name' => 'required',
                'player_id' => 'required',
                'player_fullname' => 'required',

            ]);

            $data = MidTest::where('user_id', $request->user_id)->delete();

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
                'user_id' => 'required',
                'team_name' => 'required',
                'player_id' => 'required',
                'player_fullname' => 'required',
            ]);

            $data = MidTest::where('user_id', $request->user_id)->update([
                'user_id' => $request->user_id,
                'team_name' => $request->team_name,
                'player_id' => $request->player_id,
                'player_fullname' => $request->player_fullname,
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
