Обновить зависимости проекта `composer update`  
Настроить доступ к БД в файле `environments/dev/common/config/main-local.php`  
Выполнить инициализацию `php init`  
Выполнить миграции:  
`php yii migrate --migrationPath=@vendor/dektrium/yii2-user/migrations`  
`php yii migrate --migrationPath=@yii/rbac/migrations`  
`php yii migrate`  


`php yii migrate/down 12 --migrationPath=@vendor/dektrium/yii2-user/migrations`  
`php yii migrate/down 3 --migrationPath=@yii/rbac/migrations`  
`php yii migrate/down 4`
