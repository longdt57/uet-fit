<?php

namespace App;
use Illuminate\Support\Facades\Schema;
use DB;

class Utils{

	public static $CHART_TITLE = "title";
	public static $CHART_COUNT = "counts";

  public static function requestToInsertArray($insert, $tableName){
    $columns = Schema::getColumnListing($tableName);
    unset($columns[0]);
    $out = array();
    foreach($columns as $columnName){
      $out[$columnName] = isset($insert[$columnName])?$insert[$columnName]:"";
    }
    return $out;
  }
  public static function createChart($rows, $title){
    $countTable = \Lava::DataTable();
    $countTable->addStringColumn('title')
      ->addNumberColumn('Percent');
    foreach ($rows as $key => $value) {
      $countTable->addRow([$key, $value]);
    }
    $chart = \Lava::PieChart('Tổng quan', $countTable, [
        'title'=>$title,
        'is3D'   => true,
        'slices' => [
        ['offset' => 0.1],
        ['offset' => 0.1],
        ['offset' => 0.1],
        ['offset' => 0.1]

    ]
        ]);
  }
  public static function createChart_QueryStr($queryStr, $title2){
  	$tableData = DB::select($queryStr);
    $title = Utils::$CHART_TITLE;
    $counts = Utils::$CHART_COUNT;
    $rows = array();
    foreach ($tableData as $row) {
      $rows[$row->$title]=$row->$counts;
    }
    Utils::createChart($rows, $title2);
  }
}

?>
