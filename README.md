1. Выкачиваем проект из репозитория
2. composer install
3. npm install
4. Создать .env файл (заполнить данные доступа к базе, при желании настроить mailtrap)
5. php artisan migrate
6. php artisan db:seed
7. php artisan storage:link

Будет создано несколько пользователей.<br>
Четверо имеют фиксированные данные.<br>
[login: user1, password: password]<br>
[login: user2, password: password]<br>
[login: user3, password: password]<br>
[login: user4, password: password]<br>
Оставшиеся 5 пользователей сгенерированы.<br>
Права для управления постами предоставлены только первым трем.
