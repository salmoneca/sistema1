<?php
global $__util;

if ($__util)
	return;

$__util = 1;

function UTIL_GetCGIVar($str) {
	$value = false;
	if (array_key_exists($str, $_POST)) {
		$value = $_POST[$str];
        //echo("post " . $str . "=". $value);
	}
	if (($value == "") and (array_key_exists($str, $_GET))) {
		$value = $_GET[$str];
        //echo("get " . $str . "=". $value);
	}
	return $value;
}

function UTIL_StringVazio($val) {
	if (empty($val))
		return true;
	if ($val == "")
		return true;
	return false;
}



?>