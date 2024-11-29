<?php

$name = 'Artem';
$servername = "db"; // Имя сервиса MySQL из docker-compose.yml
$username = "testuser";
$password = "testpassword";
$dbname = "testdb";

try {
    // Создаем подключение
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Устанвливаем режим ошибок PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Подключение к базе данных успешно!";

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
