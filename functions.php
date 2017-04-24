<?php

function requestPost($key, $default = null) {
	return isset($_POST[$key]) ? $_POST[$key] : $default;
}

function requestGet($key, $default = null) {
	return isset($_GET[$key]) ? $_GET[$key] : $default;
}

function isRequestPost() {
	return (bool)  $_POST;
}

