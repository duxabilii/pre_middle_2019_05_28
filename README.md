## Тестирование [28.05.2019] [pre-middle, PHP]

## Окружение

Apache 2.4, PHP 7.3

## Инструкции для запуска
Импортировать дамп `database.sql`

### 1. Сессии, кеши, сложные формы
* В папке `1_sessions_caches_forms` выполнить composer install для генерации автозагрузчика
* В файле `Classes\Db.php` сменить логины пароли для подключения к базе данных
* Логин/пароль для входа: `test@example.com / test123`
* Проверка на "Спам" по шаблону `script|alert|eval|prompt|confirm|cmd|passthru|eval|exec|expression|system|fopen|fsockopen|file|file_get_contents|readfile|unlink`

### 2. Трай, кетч, простые классы 
* В папке `2_try_catch_classes` выполнить `composer install` для генерации автозагрузчика
* Папка `Resize` должна быть доступна на запись
* Тесты `vendor/bin/phpunit Tests`


### 3.Трейты, интерфейсы, наследование классов
* В папке `3_trait_interface_extends` выполнить `composer install` для генерации автозагрузчика
* В файле `Classes\Db.php` сменить логины пароли для подключения к базе данных
* Папка `Export` должна быть доступна на запись


### 4. Code review
Особых условий нет