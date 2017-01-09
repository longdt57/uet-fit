<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bangphatminh_sangche extends Model
{
    public static $COLUMN_ID = "id";
    public static $COLUMN_TEN = "ten_sangche_phatminh_giaiphap";
    public static $COLUMN_SOBANG = "sobang_kyhieu";
    public static $COLUMN_LINHVUC = "thuoclinhvucKHCN";
    public static $COLUMN_NGAYCONGBO = "ngaycongbo";
    public static $COLUMN_NGAYCAP = "ngaycap";
    public static $COLUMN_CHUSOHUU = "chusohuuchinh";
    public static $COLUMN_TACGIA = "tacgia";
    public static $COLUMN_DDNOIBAT = "diem_noi_bat";
    public static $COLUMN_MOTACHUNG = "mota_ve_sangche_phatminh_giaiphap";
    public static $COLUMN_CHUYENGIAO = "noidung_cothe_chuyengiao";
    public static $COLUMN_UNGDUNG = "thitruong_ungdung";

    protected $table='bangphatminh_sangche';

    protected $primaryKey = "id";
    public $timestamps = false;

    public function updateDatabyarray($insert){
      $this->ten_sangche_phatminh_giaiphap=$insert[Bangphatminh_sangche::$COLUMN_TEN];
      $this->sobang_kyhieu=$insert[Bangphatminh_sangche::$COLUMN_SOBANG];
      $this->thuoclinhvucKHCN=$insert[Bangphatminh_sangche::$COLUMN_LINHVUC];
      $this->ngaycongbo=$insert[Bangphatminh_sangche::$COLUMN_NGAYCONGBO];
      $this->ngaycap=$insert[Bangphatminh_sangche::$COLUMN_NGAYCAP];
      $this->chusohuuchinh=$insert[Bangphatminh_sangche::$COLUMN_CHUSOHUU];
      $this->tacgia=$insert[Bangphatminh_sangche::$COLUMN_TACGIA];
      $this->diem_noi_bat=$insert[Bangphatminh_sangche::$COLUMN_DDNOIBAT];
      $this->mota_ve_sangche_phatminh_giaiphap=$insert[Bangphatminh_sangche::$COLUMN_MOTACHUNG];
      $this->noidung_cothe_chuyengiao=$insert[Bangphatminh_sangche::$COLUMN_CHUYENGIAO];
      $this->thitruong_ungdung=$insert[Bangphatminh_sangche::$COLUMN_UNGDUNG];

    }
    public function getID(){return $this->id;}
    public function getTen(){return $this->ten_sangche_phatminh_giaiphap;}
    public function getSoBang(){return $this->sobang_kyhieu;}
    public function getLinhvuc(){return $this->thuoclinhvucKHCN;}
    public function getNgayCongBo(){return $this->ngaycongbo;}
    public function getNgaycap(){return $this->ngaycap;}
    public function getChuSoHuu(){return $this->chusohuuchinh;}
    public function getTacgia(){return $this->tacgia;}
    public function getDDnoibat(){return $this->diem_noi_bat;}
    public function getMotachung(){return $this->mota_ve_sangche_phatminh_giaiphap;}
    public function getChuyengiao(){return $this->noidung_cothe_chuyengiao;}
    public function getUngdung(){return $this->thitruong_ungdung;}

    public function getNameAttribute(){
      return $this->ten_sangche_phatminh_giaiphap;
    }
    public function getCodeAttribute(){
      return $this->sobang_kyhieu;
    }
    public function getFieldAttribute(){
      return $this->thuoclinhvucKHCN;
    }
    public function getDatePublishAttribute(){
      return $this->ngaycongbo;
    }
    public function getDateLicenseAttribute(){
      return $this->ngaycap;
    }
    public function getOwnerAttribute(){
      return $this->chusohuuchinh;
    }
    public function getAuthorAttribute(){
      return $this->tacgia;
    }
    public function getHighlightAttribute(){
      return $this->diem_noi_bat;
    }
    public function getDescribeAttribute(){
      return $this->mota_ve_sangche_phatminh_giaiphap;
    }
    public function getContentAbleTransferAttribute(){
      return $this->noidung_cothe_chuyengiao;
    }
    public function getIIDAttribute(){
      return $this->id;
    }
    public function getMarketAppAttribute(){
      return $this->thitruong_ungdung;
    }

}
