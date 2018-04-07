<?php
class Filters {
  static function date($time,$format='Y-m-d') {
    if (!is_numeric($time))
      $time=strtotime($time);// convert string dates to unix timestamps
    return date($format,$time);
  }
}