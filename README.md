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

## Номера локальных подсистем (Facility Levels)

| Номер | Описание           |
|-------|--------------------|
| **0** | Kernel messages     |
| **1** | User-level messages |
| **2** | Mail system        |
| **3** | System daemons     |
| **4** | Security/authorization messages |
| **5** | Syslogd messages   |
| **6** | Line printer subsystem |
| **7** | Network news subsystem |
| **8** | UUCP subsystem     |
| **9** | Clock daemon       |
| **10**| FTP daemon         |
| **11**| NTP subsystem      |
| **12**| Log audit          |
| **13**| Log alert          |
| **14**| Clock daemon       |
| **15**| Local0            |
| **16**| Local1            |
| **17**| Local2            |
| **18**| Local3            |
| **19**| Local4            |
| **20**| Local5            |
| **21**| Local6            |
| **22**| Local7            |
