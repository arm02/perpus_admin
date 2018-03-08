@extends('layouts.list')
@section('title')
Pengembalian Dasboard
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">List Pengembalian</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="example" style="font-size: 10px;">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Peminjam</th>
                  <th>Alamat</th>
                  <th>Judul Buku</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Denda</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i= 1;
                ?>
                @foreach($pem as $q)
                <tr>
                  <th scope="row">{{$i++}}</th>
                  <td>{{$q->namapeminjam}}</td>
                  <td>{{$q->alamatpeminjam}}</td>
                  <td>{{$q->judulbuku}}</td>
                  <td>{{$q->tanggalpinjam}}</td>
                  <td>{{$q->tanggalkembali}}</td>
                  <td>{{$q->denda}}</td>
                  <td>Sudah Dikembalikan</td>
                  <td>
                   <a href="{{url('delete/pengembalian/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" 
                     class="btn btn-outline-danger btn-sm">Delete</a>
                   </td>
                 </tr>
                 @endforeach
               </tbody>
             </table>
           </div>
           <hr>
           <li class="list-group-item float-right">
            <a href="{{url('report/listpengembalian')}}" class="btn btn-outline-success btn-sm">Export Ke PDF</a>
          </li>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection



