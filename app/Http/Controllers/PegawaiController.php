<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Pegawai;

class PegawaiController extends Controller
{
	public function page()
	{
		// $pegawai = DB::table('pegawai')->paginate(3);
		
		$pegawai = Pegawai::orderBy('id', 'DESC')->paginate(5);
		
		return response()->json($pegawai);
	}
	
	public function view()
	{
		return view('pegawai.view');
	}
	
	public function add(Request $request)
	{
		$this->validate(
			$request,
			[
				'nama' => 'required|min:5|max:20',
				'alamat' => 'required',
			]
		);
		
		$pegawai = Pegawai::create([
			'pegawai_nama' => $request->nama,
			'pegawai_alamat' => $request->alamat
		]);
		
		return response()->json($pegawai);
	}
	
	public function edit($id)
	{
		$pegawai = Pegawai::find($id);
		
		return response()->json($pegawai);
	}
	
	public function update($id, Request $request)
	{
		$this->validate(
			$request,
			[
				'nama' => 'required|min:5|max:20',
				'alamat' => 'required',
			]
		);
		
		$pegawai = Pegawai::find($id);
		$pegawai->pegawai_nama = $request->nama;
		$pegawai->pegawai_alamat = $request->alamat;
		$pegawai->save();
		
		return response()->json($pegawai);
	}
	
	public function find(Request $request)
	{
		$pegawai = DB::table('pegawai')->where('pegawai_nama', 'like', '%' . $request->find . '%')->paginate();
		
		return view( 'pegawai', ['pegawai' => $pegawai] );
	}
}
