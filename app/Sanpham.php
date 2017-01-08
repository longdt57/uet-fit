<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    // public static columns = Schema::getColumnListing('sanpham');

    protected $table = 'sanpham';
    protected $primaryKey = "id";
    public $timestamps = false;

    
    public function getIIDAttribute(){
      return $this->id;
    }
    public function getFieldAttribute(){
      return $this->linh_vuc;
    }
    public function getHighlightAttribute(){
      return $this->dac_diem_noi_bat;
    }
    public function getDescribeAttribute(){
      return $this->mo_ta_chung;
    }
    public function getTranferAttribute(){
      return $this->quy_trinh_chuyen_giao;
    }
    public function getAppAttribute(){
      return $this->kha_nang_ung_dung;
    }
    public function getNameAttribute(){
      return $this->ten_san_pham;
    }
    public function getID(){ return $this->id; }
    public function getTen(){ return $this->ten_san_pham;    }
    public function getLinhvuc(){      return $this->linh_vuc;    }
    public function getDDNoibat(){return $this->dac_diem_noi_bat;}
    public function getMoTaChung(){return $this->mo_ta_chung;}
    public function getChuyenGiao(){return $this->quy_trinh_chuyen_giao;}
    public function getUngdung(){return $this->kha_nang_ung_dung;}
}
