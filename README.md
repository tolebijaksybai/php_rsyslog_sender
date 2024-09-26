# PHP Rsyslog Sender

Этот проект позволяет отправлять логи на сервер `rsyslog` с помощью PHP. Логи отправляются через UDP и могут иметь разные уровни серьезности (severity).

## Объяснение параметров

- **$message**: сообщение, которое вы хотите отправить.
- **$facility**: номер локальной подсистемы (например, `LOCAL0`).
- **$severity**: уровень серьезности сообщения (например, `INFO`, `WARNING`, `ERROR`, `CRITICAL`).

### Приоритет

Приоритет формируется как:
```php
$priority = ($facility * 8) + $severity;
```
## Уровни серьезности (Severity Levels)

| Уровень | Описание      |
|---------|---------------|
| **0**   | Emergency     |
| **1**   | Alert         |
| **2**   | Critical      |
| **3**   | Error         |
| **4**   | Warning       |
| **5**   | Notice        |
| **6**   | Informational |
| **7**   | Debug         |

