@extends('layout.main')
@section('content')
<style>
    a{
        text-decoration: none;
        color: white;
    }
</style>
    <div class="bg-white p-3">
        <div class="d-flex justify-content-start">
            <a href="/pengguna/create">
                <div class=" btn-md btn-primary p-2 fs-6">Tambah Pengguna</div>
            </a>
        </div>
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->isEmpty())
                            <tr>
                                <td colspan="5">
                                    <div class="d-flex text-muted justify-content-center text-center">
                                        Pengguna Belum Ada
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
        
                                            @component('components.modal')
                                                @slot('target')
                                                    {{ $item->id }}
                                                @endslot
                                                @slot('icon')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-x"></i>
                                                    </button>
                                                @endslot
                                                @slot('isi')
                                                    <form action="/pengguna/{{ $item->id }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <div class="d-flex justify-content-center text-center">
                                                            <h6>Apakah Anda yakin ingin menghapus Pengguna ini?</h6>
                                                        </div>
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                <i class="bi bi-check-lg"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                @endslot
                                            @endcomponent
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
    </div>
     
@endsection
