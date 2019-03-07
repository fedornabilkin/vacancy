Клонировать репозиторий
`https://github.com/fedornabilkin/vacancy.git`

Обновить зависимости проекта `composer update`  
Настроить доступ к БД в файле `environments/.../main-local.php`  
Выполнить инициализацию `php init`  
Выполнить миграции:  
`php yii migrate --migrationPath=@vendor/dektrium/yii2-user/migrations`  
`php yii migrate --migrationPath=@yii/rbac/migrations`  
`php yii migrate`  


`php yii migrate/down 12 --migrationPath=@vendor/dektrium/yii2-user/migrations`  
`php yii migrate/down 3 --migrationPath=@yii/rbac/migrations`  
`php yii migrate/down 4`

**Аккаунты для тестирования**  
admin 123456  
operator 123456

Настроить хосты на `/backend` и `/api`. В админке есть меню.  
Получить все модели (status = 1) `api.site.test/v1/services`  
Получить детали модели по id `api.site.test/v1/services/1`  
Получить модели по id города `api.site.test/v1/services/city?id=1`  
