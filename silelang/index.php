<?php
require_once ('vendor/dompdf/autoload.inc.php');

// Kickstart the framework
$f3=require('vendor/fatfree/base.php');

$f3->config('configs/config.ini');
$f3->config('configs/routes.ini');

$f3->run();
