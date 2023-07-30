<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 29.07.2023
 * Time: 23:38
 */

define('BASE_DIR', dirname(__FILE__) . '/');

require_once BASE_DIR . 'vendor/autoload.php';
$appClass = 'modY';
$envfile = BASE_DIR . '.env';

\App\Helpers\Env::loadFile($envfile);


echo 'Hello world!' . PHP_EOL;

echo 'DB_USERNAME: ' . getenv('DB_USERNAME');
