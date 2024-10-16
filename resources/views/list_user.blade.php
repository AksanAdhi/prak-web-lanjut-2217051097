@extends('layouts.app')

@section ('content')
<div class="mb-3 mt-2 m-3">
    <a href="{{ route('user.create') }}" class="btn btn-success">Tambah User</a>
</div>

<div class="container mt-5">
    <h1 class="text-center">List Data</h1><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">NPM</th>
                <th scope="col">Kelas</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
      foreach ($users as $user) {
      ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['nama'] ?></td>
                <td><?= $user['npm'] ?></td>
                <td><?= $user['nama_kelas'] ?></td>
                <td>
                    <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="Foto User" width="100">
                </td>
                <td>
                    <!-- View -->
                    <a href="{{ route('user.show', $user->id') }}" class="btn btn-warning mb-3">Detail</a>
                </td>
            </tr>
            <?php
      }
      ?>
        </tbody>
    </table>
</div>
@endsection