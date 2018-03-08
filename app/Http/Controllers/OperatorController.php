<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class OperatorController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){
		return view('operator.index');
	}

	public function postpeminjaman(Request $r){
		$pem = new \App\peminjaman;
		$pem->namapeminjam = $r->input('namapeminjam');
		$pem->alamatpeminjam = $r->input('alamat');
		$pem->judulbuku = $r->input('judulbuku');
		$pem->tanggalpinjam = $r->input('tanggalpinjam');
		$pem->statuspeminjaman = 1;
		$pem->save();
		$getid = \App\stok_buku::where('judulbuku',$r->input('judulbuku'))->value('id');
		$getstok = \App\stok_buku::where('judulbuku',$r->input('judulbuku'))->value('jumlahbuku');
		$stok = \App\stok_buku::find($getid);
		$stok->jumlahbuku = $getstok - 1;
		$stok->save();
		return redirect(url('operator'));
	}

	public function pengembalian(){
		$pem = \App\peminjaman::where('statuspeminjaman',1)->get();
		return view('operator.pengembalian')->with('pem',$pem);
	}

	public function search(Request $r)
	{
		$query = $r->input('query');
		$show = \App\peminjaman::where('namapeminjam',$query)->get();
		return view('operator.pengembalian')->with('pem', $show);
	}

	public function formpengembalian($id){
		$pem = \App\peminjaman::find($id);
		return view('operator.formpengembalian')->with('pem',$pem);
	}

	public function postformpengembalian(Request $r){
		$pem = \App\peminjaman::find($r->input('id'));
		$pem->tanggalkembali = $r->input('tanggalkembali');
		$pem->denda = $r->input('denda');
		$pem->statuspeminjaman = 2;
		$pem->save();
		$getid = \App\stok_buku::where('judulbuku',$r->input('judulbuku'))->value('id');
		$getstok = \App\stok_buku::where('judulbuku',$r->input('judulbuku'))->value('jumlahbuku');
		$stok = \App\stok_buku::find($getid);
		$stok->jumlahbuku = $getstok + 1;
		$stok->save();
		return redirect(url('operator/pengembalian'));
	}

	public function listpeminjaman(){
		$pem = \App\peminjaman::where('statuspeminjaman',1)->get();
		return view('operator.listpeminjaman')->with('pem',$pem);
	}

	public function deletelistpeminjaman($id){
		$list = \App\peminjaman::find($id);
		$list->delete();
		return redirect(url('operator/listpeminjaman'));
	}

	public function reportlistpeminjaman()
	{
		$data['peminjaman'] = \App\peminjaman::where('statuspeminjaman',1)->get();
		$pdf = PDF::loadview('operator.pdflistpeminjaman', $data);
		return $pdf->stream();
	}

	public function listpengembalian(){
		$pem = \App\peminjaman::where('statuspeminjaman',2)->get();
		return view('operator.listpengembalian')->with('pem',$pem);
	}

	public function deletelistpengembalian($id){
		$list = \App\peminjaman::find($id);
		$list->delete();
		return redirect(url('operator/listpengembalian'));
	}

	public function reportlistpengembalian()
	{
		$data['pengembalian'] = \App\peminjaman::where('statuspeminjaman',2)->get();
		$pdf = PDF::loadview('operator.pdflistpengembalian', $data);
		return $pdf->stream();
	}
}
