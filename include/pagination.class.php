<?php

class Pagination
{
	public $buttons = array();

	public function __construct(Array $options = array('itemsCount' => 257, 'itemsPerPage' => 10, 'currentPage' => 1))
	{

		extract($options);

		//если передан 0
		if(!$currentPage)
		{
			return;
		}

		//получаем количество страниц
		$pagesCount = ceil($itemsCount / $itemsPerPage);

		//если количество страниц равно 1
		if($pagesCount == 1)
		{
			return;
		}

		//если текущая страница больше количества страниц в целом
		if($currentPage > $pagesCount)
		{
			$currentPage = $pagesCount;
		}

		$this->buttons[] = new Button($currentPage - 1, $currentPage > 1, 'Previous');

		for($i = 1; $i <= $pagesCount; $i++)
		{
			$active = $currentPage != $i;
			$this->buttons[] = new Button($i, $active);
		}

		$this->buttons[] = new Button($currentPage + 1, $currentPage < $pagesCount, 'Next');
	}
}