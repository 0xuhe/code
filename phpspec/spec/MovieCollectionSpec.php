<?php namespace spec;

use Movie;
use PhpSpec\ObjectBehavior;

class MovieCollectionSpec extends ObjectBehavior {
	function it_is_initializable()
	{
		$this->shouldHaveType('MovieCollection');
	}

	public function it_add_a_new_movie(Movie $movie)
	{
		$this->add($movie);
		$this->add($movie);
		$this->shouldHaveCount(2);
	}

	public function it_could_add_multiply_movie_at_once(Movie $movie1, Movie $movie2)
	{
		$this->add([$movie1, $movie2]);
		$this->shouldHaveCount(2);
	}

	public function it_marks_the_watched_movies(Movie $movie1, Movie $movie2)
	{
		$movie1->watch()->shouldBeCalled();
		$movie2->watch()->shouldBeCalled();
		$this->add([$movie1, $movie2]);

		$this->markAllWateched();
	}

}
