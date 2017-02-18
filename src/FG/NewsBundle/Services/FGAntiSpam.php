<?php

namespace FG\NewsBundle\Services;

class FGAntiSpam {
	private $minLength;
	public function __construct($minLength)
	{
		$this->minLength = $minLength;
	}

	public function isSpam($text)
	{

		return strlen($text) <$this->minLength;
	}

}