## Тестовое задание!
Инструкция по установке 
Клонируем репозиторий с github.com, заходим в папку с проектом, обновляем композер, 
во время обрновления композера идем в файлик /project-folder-name/app/config/local/database.php
указываем свои настройки поключения к базе данных(использовалась MySql), 
запускаем миграции, запускаем встоенный сервер artisan и заходим в приложение.
Если миграции по не прошли в папке с проектом есть sql файлик с копией базы данных(wemir.sql).
Если браузер попадает на циклцескую ссылку то нужно отключить обработчик ошибок в файле 
/project-folder-name/app/routes.php и занятся отладкой( надеюсь этого не произойдет) 
