@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">

    <div class="card text-center" style="width: 40rem;">
        @if($user->foto)
        <img src="{{ asset('storage/uploads/' . $user->foto) }}" class="card-img-top" alt="Foto User">
        @else
        <p>Foto tidak tersedia</p>
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $user->nama }}</h5>
            <p class="card-text">IPK: {{ $user->ipk ?? 'IPK tidak tersedia' }}</p>

            {{-- <p class="card-text">Kelas: {{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}</p> --}}
        </div>
            <hr>
            <a href="{{ route('user.list') }}" class="btn btn-primary">Kembali ke List</a>
        </div>
    </div>
</div>
@endsection


