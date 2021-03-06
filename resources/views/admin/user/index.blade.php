@extends('layouts.admin')
@section('title')
User Dasboard
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">User Dashboard</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="example">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i= 1;
                $user = \App\User::all();
                ?>
                @foreach($user as $q)
                <tr>
                  <th scope="row">{{$i++}}</th>
                  <td>{{$q->username}}</td>
                  <td>@if($q->status==1)<a class="btn btn-info btn-sm" style="color: white;">Admin</a> 
                    @elseif($q->status==2)<a class="btn btn-warning btn-sm" style="color: white;">Operator</a> 
                  @endif</td>
                  <td>
                   <a href="{{url('admin/user/edit/'.$q->id)}}" class="btn btn-outline-warning btn-sm">Edit</a>
                   <a href="{{url('admin/user/delete/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" 
                     class="btn btn-outline-danger btn-sm">Delete</a>
                   </tr>
                   @endforeach
                 </tbody>
               </table>
             </div>
             <hr>
             <li class="list-group-item float-right">
              <a href="{{url('admin/user/pdf')}}" class="btn btn-outline-success btn-sm">Export Ke PDF</a>
            </li>
            <li class="list-group-item float-left">
              <a href="{{url('admin/user/add')}}" class="btn btn-outline-primary btn-sm">Tambah Data</a>
            </li>
          </div>
        </div>
      </div>
    </div>
  </div>


  @endsection



