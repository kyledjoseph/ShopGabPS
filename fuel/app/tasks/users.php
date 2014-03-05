<?php

namespace Fuel\Tasks;

class Users
{

	public function run($number = 5)
	{
		echo "creating $number users\n";

		for ($i = 1; $i <= $number; $i++)
		{
			\Model_User::create_user("sample{$i}@email.com", "pass{$i}", "First{$i}", "Last{$i}");
			echo "created 'sample{$i}@email.com' with password 'pass{$i}'\n";
		}
	}
}