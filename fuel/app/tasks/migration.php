<?php

namespace Fuel\Tasks;

class Migration
{

	public static function run()
	{
		$table_results = \DB::query('SHOW TABLES FROM itemnation', \DB::SELECT)->execute();

		$file_i = 1;

		foreach ($table_results->as_array() as $table)
		{
			$table_name     = array_values($table)[0];
			$create_results = \DB::query("SHOW CREATE TABLE $table_name", \DB::SELECT)->as_assoc()->execute();
			$create_table   = $create_results[0]['Create Table'];
			$drop_table     = "DROP TABLE `" . $table_name . "`";
			$file_name      = str_pad($file_i, 3, '0', STR_PAD_LEFT) . '_create_' . $table_name . '.php';
			$class_name     = \Inflector::words_to_upper($table_name);

			static::create_migration($file_name, $class_name, $create_table, $drop_table);

			$file_i++;

			// echo $table_name . "\n";
			// echo "------------------------------\n";
			// echo $create_table . "\n";
			// echo $drop_table . "\n";
			// echo "\n\n";



			// $columns_resules = \DB::query("SHOW COLUMNS FROM $table_name", \DB::SELECT)->execute();

			// foreach ($columns_resules->as_array() as $column)
			// {
			// 	echo var_dump($column);
			// 	echo "\n";
			// }
		}
	}


	protected static function create_migration($file_name, $class_name, $up, $down)
	{
		$path = APPPATH.'migrations/';
		// $up   = addslashes($up);
		// $down = addslashes($down);

		$file = "<?php\n";
		$file.= "\n";
		$file.= "namespace Fuel\Migrations;\n";
		$file.= "\n";
		$file.= "class {$class_name}\n";
		$file.= "{\n";
		$file.= "\tfunction up()\n";
		$file.= "\t{\n";
		$file.= "\t\t\DB::query(\"{$up}\");\n";
		$file.= "\t}\n";
		$file.= "\tfunction down()\n";
		$file.= "\t{\n";
		$file.= "\t\t\DB::query(\"{$down}\");\n";
		$file.= "\t}\n";
		$file.= "}\n";

		try
		{
			$success = \File::create($path, $file_name, $file);
		}
		catch (FileAccessException $e)
		{
			echo "migration {$file_name} failed: file already exists\n";
		}
		catch (InvalidPathException $e)
		{
			echo "migration {$file_name} failed: invalid path\n";
		}

		if ($success)
		{
			echo "migration {$file_name} created\n";
		}
		else
		{
			echo "migration {$file_name} failed\n";
		}
		
	}
}

// array(15) {
//   [0]=>
//   array(6) {
//     ["Field"]=>
//     string(2) "id"
//     ["Type"]=>
//     string(7) "int(11)"
//     ["Null"]=>
//     string(2) "NO"
//     ["Key"]=>
//     string(3) "PRI"
//     ["Default"]=>
//     NULL
//     ["Extra"]=>
//     string(14) "auto_increment"
//   }
//   [1]=>
//   array(6) {
//     ["Field"]=>
//     string(8) "username"
//     ["Type"]=>
//     string(11) "varchar(50)"
//     ["Null"]=>
//     string(3) "YES"
//     ["Key"]=>
//     string(3) "MUL"
//     ["Default"]=>
//     string(0) ""
//     ["Extra"]=>
//     string(0) ""
//   }
