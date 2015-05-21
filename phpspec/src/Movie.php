<?php

class Movie {
	protected $rate;
	protected $watched;
	protected $title;
	public function setRate($rate)
	{
		// TODO: write logic here
		if ($rate >= 5)
		{
			throw new InvalidArgumentException;

		}
		$this->rate = $rate;

	}

	public function getRate()
	{
		// TODO: write logic here
		return $this->rate;
	}

	public function watch()
	{
		$this->watched = true;
	}

	public function isWatched()
	{
		// TODO: write logic here
		return $this->watched;
	}

	public function __construct($title)
	{
		// TODO: write logic here
		$this->title = $title;
	}

	public function getTitle()
	{
		// TODO: write logic here
		return $this->title;
	}
}
