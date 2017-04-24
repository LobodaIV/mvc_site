<?php

function db_connect($host,$user,$pass,$db) {
	$link = mysqli_connect($host,$user,$pass,$db);

	if(mysqli_connect_errno()) {
		die(mysqli_connect_error());
	}

	return $link;
}

function mysql_get_result($link,$sql) {

	$res = mysqli_query($link,$sql);

	if($res == false) {
		die(mysqli_error($link));
	}

	return $res;

}

function requestPost($key, $default = null) {
	return isset($_POST[$key]) ? $_POST[$key] : $default;
}

function requestGet($key, $default = null) {
	return isset($_GET[$key]) ? $_GET[$key] : $default;
}

function isRequestPost() {
	return (bool)  $_POST;
}

