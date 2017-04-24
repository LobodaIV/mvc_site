<h1>Books here</h1>


<form action="/index.php?page=books">
	Sort by:
	<select name="sort">
		<option value="price">Title</option>
		<option value="title">Price</option>
	</select>

	Order:
	<select name="order">
		<option value="asc">asc</option>
		<option value="desc">desc</option>
	</select>
	<button>Go</button>
</form>

<div class="books">
	<?php foreach($books as $key => $book) : ?>
		<div class="book-item">
			<div><?= $book['title']?></div>
			<hr>
			<?= $book['price']?>
			<br>
			<br>
			<a href="/index.php?page=book_item&amp;id=<?=$book['id']?>">Details</a>
		</div>
	<?php endforeach ?>

</div>

<div class="pagination">
	<?php foreach ($p->buttons as $button) :
    if ($button->isActive) : ?>
        <a href = '?page=books&pageNumber=<?=$button->page?> style="color:black;"'><?=$button->text?></a>
    <?php else : ?>
        <span style="color:black"><?=$button->text?></span>
    <?php endif;
	endforeach; ?>
</div>
<br style="clear:both">