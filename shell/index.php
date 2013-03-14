<?php
use CConsoleCommand;
use CLogger;

class IndexCommand extends CConsoleCommand
{

	public function run(array $args = array())
	{
		print_r("index");

		return 1;
	}

}