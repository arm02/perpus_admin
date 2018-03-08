@extends('layouts.list')
@section('title')
Peminjaman Dasboard
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">List Peminjaman</div>
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
                  <td>Belum Dikembalikan</td>
                  <td>
                   <a href="{{url('delete/peminjaman/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" 
                     class="btn btn-outline-danger btn-sm">Delete</a>
                   </td>
                 </tr>
                 @endforeach
               </tbody>
             </table>
           </div>
           <hr>
           <li class="list-group-item float-right">
            <a href="{{url('report/listpeminjaman')}}" class="btn btn-outline-success btn-sm">Export Ke PDF</a>
          </li>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection



