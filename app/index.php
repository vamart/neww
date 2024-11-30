<?php
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
// Загрузка переменных окружения из файла .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Получаем данные для подключения из переменных окружения

$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

$name = 'Artem';

try {
    // Создаем подключение
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Устанвливаем режим ошибок PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Подключение к базе данных успешно!";
    // Создание таблицы
    $sql = "CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
    echo "Таблица users успешно создана!<br>";

    // Добавление данных
    $sql = "INSERT INTO users (name, email) VALUES ('Artem', 'artem@example.com')";
    $conn->exec($sql);
    echo "Данные добавлены в таблицу!<br>";

    // Выборка данных
    $stmt = $conn->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    print_r($users);
    echo "</pre";

    // Пример SQL-запроса
    $stmt = $conn->query("SHOW TABLES;");
    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    print_r($tables);
    echo "</pre>";
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}


echo $name;

echo "Hello, Docker with PHP and Apache!";
