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


echo 'Подключение к DB' . PHP_EOL;

$servername = "mysql"; // имя сервиса MySQL в вашем стеке
$username = "root"; // имя пользователя MySQL
$password = "password"; // пароль пользователя MySQL
$dbname = "database"; // имя базы данных MySQL

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Выполняем запросы к базе данных
$sql = "SELECT * FROM ara3_categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Обрабатываем результаты запроса
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . PHP_EOL;
    }
} else {
    echo "0 результатов" . PHP_EOL;
}

// Закрываем подключение
$conn->close();
