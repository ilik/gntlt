<?php
use CConsoleCommand;
use CLogger;

class TestCommand extends CConsoleCommand
{

	public function run($args)
	{
		if (strstr("AUTO INCREMENT TIMESTAMP NOT NULL", "NOT NULL")) {
			print_r("\nyes\n");
		} else {
			print_r("\nno\n");
		}
		print_r("\ntest\n");

		return 0;
	}

}