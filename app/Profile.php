<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public static $COLUMN_ID = "ID";
    public static $COLUMN_TEN = "Ho_va_ten";
    public static $COLUMN_LEVEL = "Hoc_vi";
    public static $COLUMN_NAMSINH = "Nam_sinh";
    public static $COLUMN_CHUYENNGANH = "Chuyen_nganh";
    public static $COLUMN_COQUAN = "Co_quan";
    public static $COLUMN_HUONGNGHIENCUU = "Huong_nghien_cuu";
    public static $COLUMN_DSNGHIENCUU = "DsCong_trinh_nghien_cuu";
    public static $COLUMN_DSKETQUA = "DsKet_qua_nghien_cuu";
    public static $COLUMN_LINKANH = "Link_anh";
    public static $COLUMN_SLCONGTRINH = "Sl_congTrinh_baiBao";

    protected $table='profiles';
    protected $primaryKey = "ID";

    public $timestamps = false;

    //  protected $fillable = array('ID');
    public function updateData($ht, $hv, $ns, $cn, $cq, $hnc, $dsctnc, $dskqnc, $la){
      $this->Ho_va_ten=$ht;
      $this->Hoc_vi=$hv;
      $this->Nam_sinh=$ns;
      $this->Chuyen_nganh=$cn;
      $this->Co_quan=$cq;
      $this->Huong_nghien_cuu=$hnc;
      $this->DsCong_trinh_nghien_cuu=$dsctnc;
      $this->DsKet_qua_nghien_cuu=$dskqnc;
      $this->Link_anh=$la;
    }
    public function updateDatabyarray($insert){
      $this->Ho_va_ten=$insert[Profile::$COLUMN_TEN];
      $this->Hoc_vi=$insert[Profile::$COLUMN_LEVEL];
      $this->Nam_sinh=$insert[Profile::$COLUMN_NAMSINH];
      $this->Chuyen_nganh=$insert[Profile::$COLUMN_CHUYENNGANH];
      $this->Co_quan=$insert[Profile::$COLUMN_COQUAN];
      $this->Huong_nghien_cuu=$insert[Profile::$COLUMN_HUONGNGHIENCUU];
      $this->DsCong_trinh_nghien_cuu=$insert[Profile::$COLUMN_DSNGHIENCUU];
      $this->DsKet_qua_nghien_cuu=$insert[Profile::$COLUMN_DSKETQUA];
      $this->Link_anh=$insert[Profile::$COLUMN_LINKANH];
    }
    public function getNameAttribute(){
      return $this->Ho_va_ten;
    }
    public function getLevelAttribute(){
      return $this->Hoc_vi;
    }
    public function getDateAttribute(){
      return $this->Nam_sinh;
    }
    public function getMajorAttribute(){
      return $this->Chuyen_nganh;
    }
    public function getWorkAddrAttribute(){
      return $this->Co_quan;
    }
    public function getMajorResearchAttribute(){
      return $this->Huong_nghien_cuu;
    }
    public function getListResearchAttribute(){
      return $this->DsCong_trinh_nghien_cuu;
    }
    public function getListResultAttribute(){
      return $this->DsKet_qua_nghien_cuu;
    }
    public function getImageLinkAttribute(){
      return $this->Link_anh;
    }
    public function getNumResearchAttribute(){
      return $this->Sl_congTrinh_baiBao;
    }
    public function getIIDAttribute(){
      return $this->ID;
    }
    public function setName($name){
      $this->Ho_va_ten=$name;
    }
    public function setLevel($level){
      $this->Hoc_vi=$level;
    }
    public function setDate($in){
      $this->Nam_sinh=$in;
    }
    public function setMajor($in){
      $this->Chuyen_nganh=$in;
    }
    public function setWorkAddr($in){
      $this->Co_quan=$in;
    }
    public function setMajorResearch($in){
      $this->Huong_nghien_cuu=$in;
    }
    public function setListResearch($in){
      $this->DsCong_trinh_nghien_cuu=$in;
    }
    public function setListResult($in){
      $this->DsKet_qua_nghien_cuu=$in;
    }
    public function setImageLink($in){
      $this->Link_anh=$in;
    }
    public function setNumResearch($in){
      $this->Sl_congTrinh_baiBao=$in;
    }
    public function getID(){
      return $this->ID;
    }

}
