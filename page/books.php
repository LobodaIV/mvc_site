<?php

require ROOT . 'models/books.php';
require ROOT . 'include/button.class.php';
require ROOT . 'include/pagination.class.php';

$pageNumber = requestGet('pageNumber',1);
$sortField = requestGet('sort','price');
$sortOrder = requestGet('order','asc');

$p = new Pagination( 
	 array('itemsCount' => countAllBooks($link), 'itemsPerPage' => 5, 'currentPage' => $pageNumber)
	);

$books = findAllBooks($link,5,$pageNumber,$sortField,$sortOrder);
