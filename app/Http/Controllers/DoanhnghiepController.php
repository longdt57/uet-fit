<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doanhnghiep;
class DoanhnghiepController extends Controller
{
    public function detail(Doanhnghiep $doanhnghiep){
    	return view('doanhnghiep.detail',compact('doanhnghiep'));
    }
    public function create(){
    	return view('doanhnghiep.create');
    }
    public function store(Request $request){
    	$doanhnghiep = new Doanhnghiep;
    	$doanhnghiep->TenDoanhNghiep = $request->TenDoanhNghiep;
    	$doanhnghiep->LinhVuc = $request->LinhVuc;
    	$doanhnghiep->TinhThanhPho = $request->TinhThanhPho;
    	$doanhnghiep->DiaChi = $request->DiaChi;
    	$doanhnghiep->Email = $request->Email;
    	$doanhnghiep->Phone = $request->Phone;
    	$doanhnghiep->Fax = $request->Fax;

    	$doanhnghiep->Logo = "like you do";
    	$doanhnghiep->NgayCapNhat = "2016-10-20";
    	$doanhnghiep->TenDaiDien = "";
    	$doanhnghiep->DiaChiDaiDien="";
    	$doanhnghiep->EmailDaiDien="";
    	$doanhnghiep->save();
    	return view('doanhnghiep.create')->with('result','Success!');
    }
    public function edit(Doanhnghiep $doanhnghiep){
      return view('doanhnghiep.edit', compact('doanhnghiep'));
    }
    public function update(Request $request){
      $doanhnghiep = Doanhnghiep::find($request->ID);
      $doanhnghiep->updateData($request->TenDoanhNghiep,$request->LinhVuc,$request->TinhThanhPho,
      $request->DiaChi, $request->Email,$request->Phone,$request->Fax, $request->Website,
      "like you do", "2016-10-20", "", "",
      "");

      $doanhnghiep->save();
      $doanhnghiep=Doanhnghiep::find($request->ID);
      return view('doanhnghiep.detail',compact('doanhnghiep'));
    }
}
