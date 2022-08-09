<?php
namespace GDO\Hash;

use GDO\Core\GDT_Char;

abstract class GDT_Hash extends GDT_Char
{
	public abstract function getMHashId() : int;
	
	protected function __construct()
	{
		$this->length($this->getAlgoLengthChars());
		$this->ascii();
		parent::__construct();
	}
	
	public function getAlgoLength() : int
	{
		return @mhash_get_block_size($this->getMHashId());
	}
	
	public function getAlgoLengthChars() : int
	{
		return $this->getAlgoLength() * 2;
	}
	
	public function toValue($var = null)
	{
		return $var === null ? null : @mhash($this->getMHashId(), $var);
	}
	
}
