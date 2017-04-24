<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>MVC in practice</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<a href="/index.php?page=homepage">Home</a>
	<a href="/index.php?page=about">About us</a>
	<a href="/index.php?page=contact">Contact us</a>
	<a href="/index.php?page=books">Books</a>
	<hr>

	<?= $content ?>

	<hr>

	All rights reserved &copy; <?= $date ?>
</body>
</html>