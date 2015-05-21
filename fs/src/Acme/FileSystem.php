<?php namespace Acme;

class FileDoesNotExist extends \Exception {

}
class FileSystem {
	protected $root;
	public function __construct($root = null)
	{
		$this->root = $root ?: __DIR__.'/../';
	}
	public function get($file)
	{
		// TODO: write logic here
		if ( ! file_exists($this->root.'/'.$file))
		{
			throw new FileDoesNotExist;
		}
		return file_get_contents($this->root.'/'.$file);
	}

	public function put($file, $content)
	{
		file_put_contents($this->root.'/'.$file, $content);
	}

	public function delete($file)
	{
		unlink($this->root.'/'.$file);
	}

	public function append($file, $body)
	{
		if ( ! file_exists($this->root.'/'.$file))
		{
			throw new FileDoesNotExist;
		}
		file_put_contents($this->root.'/'.$file, $body, FILE_APPEND);
	}
}
