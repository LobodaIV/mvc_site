<?php

function saveMsg() {
	return;
}

function loadMsg() {
	return;
}

function createMsg() {
	$id = uniqid();
	return compact('username','email','message');
}