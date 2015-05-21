<?php

class MovieCollection implements Countable {
	protected $collection;
	protected $title;
	public function __construct($title)
	{
		$this->title = $title;
	}
	public function add($movie)
	{
		// TODO: write logic here

		if (is_array($movie))
		{
			return array_map([$this, 'add'], $movie);
		}
		$this->collection[] = $movie;
	}

	public function count()
	{
		return count($this->collection);
	}

	public function markAllWateched()
	{
		foreach ($this->collection as $movie)
		{
			$movie->watch();
		}
	}

	public function getTitle()
	{
		return $this->title;
	}
}
