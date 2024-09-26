<?php

// Настройка параметров
$myHostIp = '127.0.0.1';
$server_ip = '192.168.255.24'; // IP сервера
$port = 514; // Порт по умолчанию для rsyslog (UDP)
$message = "<134>" . date("M d H:i:s") . " hostname {$myHostIp} This php script was sent by Tolebi\n";

// Отправка логов через UDP
$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
if ($sock === false) {
    die("Не удалось создать сокет: " . socket_strerror(socket_last_error()));
}

// Отправка сообщения
$result = socket_sendto($sock, $message, strlen($message), 0, $server_ip, $port);
if ($result === false) {
    die("Не удалось отправить сообщение: " . socket_strerror(socket_last_error($sock)));
}

echo "Сообщение успешно отправлено!";
socket_close($sock);



