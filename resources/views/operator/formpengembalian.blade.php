@extends('layouts.operator')
@section('title')
Add Buku
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Tambah Buku</div>
        <div class="card-body">
         <form action="{{url('operator/pengembalian/post')}}" method="POST">
          <div class="form-group">
            <label for="formGroupExampleInput">Nama Peminjam</label>
            <input type="text" class="form-control" name="namapeminjam" id="formGroupExampleInput" 
            placeholder="Kode Buku" value="{{$pem->namapeminjam}}" required readonly> 
          </div>
           <div class="form-group">
            <label for="formGroupExampleInput">Alamat Peminjam</label>
            <input type="text" class="form-control" name="alamat" id="formGroupExampleInput" 
            placeholder="Kode Buku" value="{{$pem->alamatpeminjam}}" required readonly> 
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Judul Buku</label>
            <input type="text" class="form-control" name="judulbuku" id="formGroupExampleInput" 
            placeholder="Kode Buku" value="{{$pem->judulbuku}}" required readonly> 
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Tanggal Kembali</label>
            <input type="date" class="form-control" name="tanggalkembali" id="formGroupExampleInput" 
            placeholder="Tanggal"  required> 
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Denda</label>
            <input type="text" class="form-control" name="denda" id="formGroupExampleInput" 
            placeholder="Denda" required > 
          </div>
          @csrf
          <input type="hidden" name="id" value="{{$pem->id}}">
          <button class="btn btn-outline-success float-right" type="submit">Kembalikan</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection



