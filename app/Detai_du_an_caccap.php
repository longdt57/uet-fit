<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detai_du_an_caccap extends Model
{
    public static $COLUMN_ID = "id";
    public static $COLUMN_TEN = "ten_detai";
    public static $COLUMN_MASO = "maso_kyhieu";
    public static $COLUMN_LINHVUC = "linhvuc";
    public static $COLUMN_NAMBEGIN = "nam_begin";
    public static $COLUMN_NAMEND = "nam_end";
    public static $COLUMN_COQUAN = "co_quan";
    public static $COLUMN_CHUNHIEM = "chu_nhiem_detai";
    public static $COLUMN_DDNOIBAT = "diem_noi_bat";
    public static $COLUMN_MOTACHUNG = "mota_chung";
    public static $COLUMN_CHUYENGIAO = "mota_quytrinh_chuyengiao";
    public static $COLUMN_UNGDUNG = "ket_qua_thuchien_ungdung";

    protected $table = 'detai_du_an_caccap';
    protected $primaryKey = "id";

    public $timestamps = false;

    public function getIIDAttribute(){
      return $this->id;
    }
    public function updateDatabyarray($insert){
        $this->ten_detai = $insert[Detai_du_an_caccap::$COLUMN_TEN];
        $this->maso_kyhieu = $insert[Detai_du_an_caccap::$COLUMN_MASO];
        $this->linhvuc = $insert[Detai_du_an_caccap::$COLUMN_LINHVUC];
        $this->nam_begin=$insert[Detai_du_an_caccap::$COLUMN_NAMBEGIN];
        $this->nam_end=$insert[Detai_du_an_caccap::$COLUMN_NAMEND];
        $this->co_quan=$insert[Detai_du_an_caccap::$COLUMN_COQUAN];
        $this->chu_nhiem_detai=$insert[Detai_du_an_caccap::$COLUMN_CHUNHIEM];
        $this->diem_noi_bat=$insert[Detai_du_an_caccap::$COLUMN_DDNOIBAT];
        $this->mota_chung=$insert[Detai_du_an_caccap::$COLUMN_MOTACHUNG];
        $this->mota_quytrinh_chuyengiao=$insert[Detai_du_an_caccap::$COLUMN_CHUYENGIAO];
        $this->ket_qua_thuchien_ungdung=$insert[Detai_du_an_caccap::$COLUMN_UNGDUNG];
    }
    public function getID(){return $this->id;}
    public function getTen(){return $this->ten_detai;}
    public function getMaso(){return $this->maso_kyhieu;}
    public function getLinhvuc(){return $this->linhvuc;}
    public function getNamBegin(){return $this->nam_begin;}
    public function getNamEnd(){return $this->nam_end;}
    public function getCoquan(){return $this->co_quan;}
    public function getChuNhiem(){return $this->chu_nhiem_detai;}
    public function getDDnoibat(){return $this->diem_noi_bat;}
    public function getMotachung(){return $this->mota_chung;}
    public function getUngdung(){return $this->ket_qua_thuchien_ungdung;}

    public function updateData($name, $code, $field, $datebegin, $dateend, $work, $chairman,
      $highlight, $describe, $describetranfer, $result){
        $this->ten_detai = $name;
        $this->maso_kyhieu = $code;
        $this->linhvuc = $field;
        $this->nam_begin=$datebegin;
        $this->nam_end=$dateend;
        $this->co_quan=$work;
        $this->chu_nhiem_detai=$chairman;
        $this->diem_noi_bat=$highlight;
        $this->mota_chung=$describe;
        $this->mota_quytrinh_chuyengiao=$describetranfer;
        $this->ket_qua_thuchien_ungdung=$result;
    }
    public function getNameAttribute(){
      return $this->ten_detai;
    }
    public function getCodeAttribute(){
      return $this->maso_kyhieu;
    }
    public function getChairmanAttribute(){
      return $this->chu_nhiem_detai;
    }
    public function getDateendAttribute(){
      return $this->nam_end;
    }
    public function getDateStartAttribute(){
      return $this->nam_begin;
    }
}
