<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doanhnghiep extends Model
{
    protected $table='thongtinchung';
    protected $primaryKey = "Id";

    public $timestamps = false;

    public function getNameAttribute(){
      return $this->TenDoanhNghiep;
    }
    public function getFieldAttribute(){
      return $this->LinhVuc;
    }
    public function getCityAttribute(){
      return $this->TinhThanhPho;
    }
    public function getAddrAttribute(){
      return $this->DiaChi;
    }
    // public function getEmailAttribute(){
    //   return $this->Email;
    // }
    // public function getPhoneAttribute(){
    //   return $this->Phone;
    // }
    // public function getFaxAttribute(){
    //   return $this->Fax;
    // }
    public function getIIDAttribute(){
      return $this->Id;
    }
    public function updateData($name, $lv, $tp, $dc, $em, $phone, $fax,$ws, $Logo,
  $ncn, $tdd, $dcdd, $emdd){
      $this->TenDoanhNghiep = $name;
      $this->LinhVuc = $lv;
      $this->TinhThanhPho=$tp;
      $this->DiaChi=$dc;
      $this->Email=$em;
      $this->Phone=$phone;
      $this->Fax=$fax;
      $this->Website=$ws;
      $this->Logo=$Logo;
      $this->NgayCapNhat=$ncn;
      $this->TenDaiDien=$tdd;
      $this->DiaChiDaiDien=$dcdd;
      $this->EmailDaiDien=$emdd;
  }


}
