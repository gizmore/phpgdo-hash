<?php
namespace GDO\Hash;

use GDO\Core\GDT_Char;

abstract class GDT_Hash extends GDT_Char
{

	protected function __construct()
	{
		$this->length($this->getAlgoLengthChars());
		$this->ascii();
		parent::__construct();
	}

	public function getAlgoLengthChars(): int
	{
		return $this->getAlgoLength() * 2;
	}

	public function getAlgoLength(): int
	{
		return @mhash_get_block_size($this->getMHashId());
	}

	abstract public function getMHashId(): int;

	public function toValue(null|string|array $var): null|bool|int|float|string|object|array
	{
		return $var === null ? null : @mhash($this->getMHashId(), $var);
	}

}
