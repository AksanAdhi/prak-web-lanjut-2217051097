@extends('layouts.app')

@section('content')
<div>
    <div class="mb-3 mt-2 m-3">
        <a href="{{ route('user.list') }}" class="btn btn-success">List User</a>
    </div>
    <!-- Isi Section -->
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">
            <h1 class="text-center">Daftar</h1>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama anda">
            </div>

                        <div class="mb-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="number" 
                       class="form-control" 
                       name="ipk" 
                       id="ipk" 
                       step="0.01" 
                       min="0" 
                       max="4.00" 
                       placeholder="Masukkan IPK (0.00 - 4.00)">
            </div>

            <label for="kelas">Kelas</label>
            <select class="form-select" name="kelas_id" id="kelas_id">
                @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select><br>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input class="form-control" type="file" id="foto" name="foto">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>
@endsection