<?php
namespace GDO\Hash;

final class GDT_MD5 extends GDT_Hash
{
	public function getMHashId() : int { return MHASH_MD5; }
	
}
