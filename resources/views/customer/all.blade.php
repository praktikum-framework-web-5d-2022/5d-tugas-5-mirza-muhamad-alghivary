@extends('master')
@section('content')
<div class="row">
    <div class="col-md-6 d-flex justify-content-start mb-2 mt-5">
        <h1>DATA CUSTOMER INDIEMART</h1>
    </div>
    <div class="col-md-6 d-flex justify-content-end mb-2 mt-5">
        <div class="button mt-2">
            <a href="/customer/create" type="button" class="btn btn-dark"><b>TAMBAH +</b></a>
        </div>
    </div>
    @if (session('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <b>{{ session('success') }}</b>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        </div>
    </div>
    @endif
</div>
<div class="table-responsive">
<table class="table align-middle">
    <thead style="text-align: center">
        <tr class="align-middle table-danger">
            <th rowspan="2">#</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">No Handphone</th>
            <th rowspan="2">Alamat</th>
            <th rowspan="2">Jenis Kelamin</th>
            <th colspan="2">Rekening</th>
            <th rowspan="2">Aksi</th>
        </tr>
        <tr class="table-danger">
            <th>BRI</th>
            <th>BTN</th>
        </tr>
    </thead>
    <tbody style="font-weight: 700;text-align:center">
        @php
            $nomor = 1;
        @endphp
        @foreach ($customers as $cust)
        <tr class="table-light">
            <td>{{ $nomor++ }}</td>
            <td>{{ $cust->nama }}</td>
            <td>{{ $cust->no_hp }}</td>
            <td>{{ $cust->alamat }}</td>
            <td>{{ $cust->jenis_kelamin }}</td>
            <td>{{ $cust->bank->bri ?? 0}}</td>
            <td>{{ $cust->bank->btn ?? 0}}</td>
            <td>
                <div class="aksi d-flex justify-content-center">
                    <form action="/customer/delete/{{ $cust->id }}" method="POST">
                        <a class="btn btn-sm btn-warning" href="/customer/edit/{{ $cust->id }}"><b>UBAH</b></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger"><b>HAPUS</b></button>
                    </form>   
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection