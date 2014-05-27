<?php

// Load in the Autoloader
require COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php';
class_alias('Fuel\\Core\\Autoloader', 'Autoloader');

// Bootstrap the framework DO NOT edit this
require COREPATH.'bootstrap.php';


Autoloader::add_classes(array(
        // Add classes you want to override here
        // Example: 'View' => APPPATH.'classes/view.php',
));

// Register the autoloader
Autoloader::register();

/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
Fuel::$env = (isset($_SERVER['FUEL_ENV']) ? $_SERVER['FUEL_ENV'] : Fuel::DEVELOPMENT);

function pre_var_dump($data) {
  echo "<pre>";
  var_dump($data);
  echo "</pre>";
}

/**
 * Gets or sets config option
 * @param string $name
 * @param mixed $value
 * @return mixed
 */
function configOption($name, $value = null) {
  $config_options = json_decode(file_get_contents(APPPATH . 'config/config.json'), true);

  if (is_null($value)) {
    return $config_options[$name];
  } else {
    $config_options[$name] = (string)$value;
    file_put_contents(APPPATH . 'config/config.json', json_encode($config_options));

    return true;
  } // if
} // configOption

/**
 * Get all config options
 * @return array
 */
function configOptions() {
  return json_decode(file_get_contents(APPPATH . 'config/config.json'), true);
} // configOption

// Initialize the framework with the config file.
Fuel::init('config.php');