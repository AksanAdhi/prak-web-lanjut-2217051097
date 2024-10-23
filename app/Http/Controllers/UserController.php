<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Support\Carbon;


class UserController extends Controller
{
    public $userModel;
    public $kelasModel;


    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
{
    $data = [
        'title' => 'List User',
        'users' => $this->userModel->getUser(),
    ];

    return view('list_user', $data);
}


public function create(){
    $kelasModel = new Kelas();

    // Mengambil data kelas menggunakan method getKelas
    $kelas = $kelasModel->getKelas();

    $data = [
        'title' => 'Create User',
        'kelas' => $kelas,
    ];

    return view('create_user', $data);
}

public function store(Request $request) 
{ 
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        '' => 'required|string|max:255',
        'kelas_id' => 'required|integer',
        'foto' => 'required|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi foto
    ]);

    // Proses upload foto jika ada
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $fotoName = time() . '_' . $foto->getClientOriginalName(); // Buat nama file unik
        $foto->storeAs('uploads', $fotoName); // Simpan foto di folder storage/app/uploads
    } else {
        $fotoName = null;
    }

    // Simpan data user ke database
    $this->userModel->create([ 
        'nama' => $request->input('nama'), 
        'ipk' => $request->input('ipk'), 
        'kelas_id' => $request->input('kelas_id'),
        'foto' => $fotoName, // Menyimpan nama file ke database
    ]); 

    // Redirect dengan pesan sukses
    return redirect()->to('/')->with('success', 'User berhasil ditambahkan'); 
}

public function edit ($id)
{
    $user = UserModel::findorFail($id);
    $kelasModel = new Kelas();
    $kelas = $kelasModel->getKelas();
    $title = 'Edit User';
    return view('edit_user', compact('user','kelas','title'));
}

public function update(Request $request, $id)
{
    $user = UserModel::findOrFail($id);

    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        // 'npm' => 'required|string|max:255',
        'kelas_id' => 'required|integer',
        'ipk' => 'nullable|numeric|min:0|max:4',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi foto (nullable)
    ]);

    // Update data user
    $user->nama = $request->input('nama');
    // $user->npm = $request->input('npm');
    $user->kelas_id = $request->input('kelas_id');
    $user->ipk = $request->input('ipk');

    // Proses upload foto jika ada
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $fotoName = time() . '_' . $foto->getClientOriginalName(); // Buat nama file unik
        $foto->storeAs('uploads', $fotoName); // Simpan foto di folder storage/app/uploads
        $user->foto = $fotoName; // Menyimpan nama file ke database
    }
    $user->save();

    return redirect()->route('user.list')->with('success', 'User updated successfully');
}

public function destroy($id){
    $user = UserModel::findOrFail($id);
    $user->delete();

    return redirect()->to('/')->with('success', 'User Berhasil di Hapus');
}


    // public function show($id)
    // {
    //     $user = UserModel::findOrFail($id);
    //     $kelas = Kelas::findOrFail($user->kelas_id);

    //     $title = 'Detail' . $user->nama;

    //     return view('show_user', compact('user','kelas','title'));
    // }

    // public function show($id){
    //     $user = $this->userModel->getUser($id);

    //     $data = [
    //         'title' => 'Profile',
    //         'user' => $user,

    //     ];

    //     return view ('profile', $data);
    // }

public function show($id)
{
    $user = UserModel::findOrFail($id);
    $kelas = Kelas::findOrFail($user->kelas_id);
    $title = 'Detail ' . $user->nama;

    $data = [
        'user' => $user,  
        'kelas' => $kelas->nama_kelas,
        'ipk' => $user->ipk, 
        'title' => $title,
    ];

    // Kirim data ke view 'show_user'
    return view('show_user', $data);
}


}