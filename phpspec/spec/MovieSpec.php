<?php namespace spec;

use PhpSpec\ObjectBehavior;

class MovieSpec extends ObjectBehavior {
	function let()
	{
		//因为我已经有Movie对象了，所以这里可以用beAnInstatnceOf
		//
		$this->beConstructedWith('2046');
		$this->shouldHaveType('Movie');
	}

	public function it_should_be_rate()
	{
		$this->setRate(5);
		$this->getRate()->shouldBe(5);
	}
	public function it_should_not_be_rated_exceed_five()
	{
		$this->shouldThrow('InvalidArgumentException')->duringSetRate(8);
	}

	public function it_could_be_watched()
	{
		$this->watch();
		$this->shouldBewatched();
	}

	public function it_could_get_the_title()
	{
		$this->getTitle()->shouldBe('2046');
	}
}
