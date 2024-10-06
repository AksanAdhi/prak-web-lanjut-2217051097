<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User prakweb3</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url('/img/wallpaperkantor.jpg'); /* Add your background image URL here */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    form {
        background-color: rgba(255, 255, 255,1.0); /* Slightly transparent white background */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1 {
        text-align: center;
        color: #333;
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 15px;
        width: 100%;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"], select {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 20px;
    }
</style>
<body>
    
<div class="mb-3 mt-2 m-3">
        <a href="{{ route('user.list') }}" class="btn btn-success">List User</a>
    </div>
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Buat Akun</h1>
        <img src="/img/Profile icon.png" alt="Profile Image">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" required>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select name="kelas_id" id="kelas_id" required>
                @foreach($kelas as $kelasItem)
                <option value="{{$kelasItem->id}}">{{$kelasItem->nama_kelas}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit">Kirim</button>
        </div>
    </form>
</body>
</html>
