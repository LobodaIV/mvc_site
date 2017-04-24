<?php

/*
asc - по возрастанию
+--------+
| price  |
+--------+
| 100.74 |
| 112.73 |
| 116.27 |
| 117.73 |
| 133.80 |
+--------+

desc - по убыванию
+--------+
| price  |
+--------+
| 975.85 |
| 961.87 |
| 953.77 |
| 943.31 |
| 928.69 |
+--------+

*/

function getSortedFields() {
	return ['title','price'];
}

/*
function findAllBooks($link,$sortField,$sortOrder) {


	if(!in_array(strtolower($sortField), getSortedFields())) {
		$sortField = 'price';
	}

	if( !in_array(strtolower($sortOrder), ['asc','desc']) ) {
		$sortOrder = 'asc';
	}


	$sql = "select * from book where status = 1 order by {$sortField} {$sortOrder}";
	$res = mysqli_query($link,$sql);

	if(mysqli_errno($link)) {
		die(mysqli_error($link));
	}
	//todo: make with: while() + mysqli_fetch_assoc();
	return mysqli_fetch_all($res,MYSQLI_ASSOC);

}
*/

function findBookById($link,$id) {

	$id = (int)$id;
	$sql = "select * from book where id = ?";
	$stmt = mysqli_prepare($link,$sql);
	mysqli_stmt_bind_param($stmt,'i',$id);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);

	return mysqli_fetch_assoc($res);
}

function countAllBooks($link)
{
	$sql = 'select count(*) from book where status = 1';
	return (int)mysqli_fetch_row(mysqli_query($link, $sql))[0];

}

function findAllBooks($link, $booksPerPage, $page, $sortField, $sortOrder) 
{

	if(!in_array(strtolower($sortField), getSortedFields())) {
		$sortField = 'price';
	}

	if( !in_array(strtolower($sortOrder), ['asc','desc']) ) {
		$sortOrder = 'asc';
	}

	$perPage = $booksPerPage;
	$offset = $perPage * ($page - 1);

	$sql = "select * from book where status = 1 order by {$sortField} {$sortOrder} limit {$perPage} offset {$offset}";

	$res = mysqli_query($link, $sql);

	if(mysqli_errno($link))
	{
		die(mysqli_error($link));
	}

	return mysqli_fetch_all($res, MYSQLI_ASSOC);
	
}