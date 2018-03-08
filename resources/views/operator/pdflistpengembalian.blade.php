<title>Rekap Pengembalian</title>
<center>
  <h1>Rekap Daftar Pengembalian</h1>
</center>

@foreach($pengembalian as $q)
<hr>
Nama Peminjaman : {{$q->namapeminjam}} <br>
Alamat : {{$q->alamatpeminjam}} <br>
Judul Buku : {{$q->judulbuku}} <br>
Tanggal Peminjaman : {{$q->tanggalpinjam}} <br>
Tanggal Kembali : {{$q->tanggalkembali}} <br>
Denda : {{$q->denda}} <br>
Status : Sudah Kembali
<hr>
@endforeach