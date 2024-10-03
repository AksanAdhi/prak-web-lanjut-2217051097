<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($nama ="", $kelas = "", $npm ="")
{
$data = [
    'nama' => $nama,
    'kelas' => $kelas,
    'npm' => $npm,
];

    return view('profile', $data);
}
public function create(){
    return view('create_user');
}

public function store(Request $request)
{
    $data =[
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas_id' => $request->input('kelas'),
    ];

}
}