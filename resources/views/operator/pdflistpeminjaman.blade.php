<title>Rekap Peminjaman</title>
<center>
  <h1>Rekap Daftar Peminjaman</h1>
</center>

@foreach($peminjaman as $q)
<hr>
Nama Peminjaman : {{$q->namapeminjam}} <br>
Alamat : {{$q->alamatpeminjam}} <br>
Judul Buku : {{$q->judulbuku}} <br>
Tanggal Peminjaman : {{$q->tanggalpinjam}} <br>
Status : Belum Kembali
<hr>
@endforeach