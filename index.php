<?php

require __DIR__ . '/vendor/autoload.php';

if (!file_exists(__DIR__ . '/.env')) {
    die("Файл .env не найден в директории " . __DIR__);
}

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$logServerIp = $_ENV['LOG_SERVER_IP'] ?? false;
$logServerPort = $_ENV['LOG_SERVER_PORT'] ?? false;

if ($logServerIp === false || $logServerPort === false) {
    die("Ошибка: Не установлены переменные окружения LOG_SERVER_IP или LOG_SERVER_PORT.");
}

/**
 * @throws Exception
 */
function sendLog(string $message, string $serverIp, int $serverPort = 514): void
{
    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    if ($sock === false) {
        throw new Exception("Не удалось создать сокет: " . socket_strerror(socket_last_error()));
    }

    if (socket_sendto($sock, $message, strlen($message), 0, $serverIp, $serverPort) === false) {
        throw new Exception("Не удалось отправить сообщение: " . socket_strerror(socket_last_error($sock)));
    }

    echo "Сообщение успешно отправлено на сервер {$serverIp}:{$serverPort}\n";
    socket_close($sock);
}

try {
    $hostname = gethostname(); // Получение имени хоста
    $facility = 1;
    $severity = LOG_INFO; // INFO
    $priority = ($facility * 8) + $severity; // Формируем приоритет
    $time = time();

    // Формирование сообщения
    $message = "<{$priority}>" . date("M d H:i:s") . " {$hostname} my_php_script: This PHP script was sent by Tolebi, {$time}\n";

    sendLog($message, $logServerIp, $logServerPort);
} catch (Exception $e) {
    echo $e->getMessage();
}





