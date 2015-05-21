<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamWrapper;

class FileSystemSpec extends ObjectBehavior {

	public function let()
	{
		vfsStream::setup('root_dir', null, ['foo.txt' => 'foobar']);
		$this->beConstructedWith(vfsStream::url('root_dir'));
	}
	function it_is_initializable()
	{
		$this->shouldHaveType('Acme\FileSystem');
	}

	public function it_gets_the_content()
	{
		$this->get('foo.txt')->shouldReturn('foobar');
	}

	public function it_replace_the_file_with_content()
	{
		$this->put('foo.txt', 'hexu');
		$this->get('foo.txt')->shouldReturn('hexu');
	}

	public function it_could_append_text_to_the_file()
	{
		$this->append('foo.txt', ' is very good');
		$this->get('foo.txt')->shouldReturn('foobar is very good');
	}
	public function it_could_delete_the_file()
	{
		$this->delete('foo.txt')->shouldDeleteFile('foo.txt');
		// $this->shouldThrow('Acme\FileDoes NotExist')->duringGet('foo.txt');
	}

	public function getmatchers()
	{
		return [
			'deleteFile' => function($actual, $file)
			{
				return  ! vfsStreamWrapper::getRoot()->hasChild($file);
			},
		];
	}
}
