<?php
include ROOT . 'models/books.php';

$id = requestGet('id');
$book = findBookById($link,$id);

if(!$book) {
	die("Book not found");
}