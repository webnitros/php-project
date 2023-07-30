<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 29.07.2023
 * Time: 23:38
 */

define('BASE_DIR', dirname(__FILE__, 2) . '/');

require_once BASE_DIR . 'vendor/autoload.php';
$envfile = BASE_DIR . '.env';

\App\Helpers\Env::loadFile($envfile);

echo 'Hello world!' . PHP_EOL;

echo 'DB_USERNAME: ' . getenv('DB_USERNAME');


echo 'Подключение к DB 11' . PHP_EOL;

$host = getenv('DB_HOST');
$db = getenv('DB_DATABASE');
$user = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    echo "Соединение с базой данных установлено";

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo "Список таблиц:\n";
    foreach ($tables as $table) {
        echo $table . "\n";
    }

} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
}
