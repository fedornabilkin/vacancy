<?php

use yii\db\Migration;

/**
 * Class m190306_213841_data_insert
 */
class m190306_213841_data_insert extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // user
        $this->batchInsert('{{%user}}', ['username', 'email', 'password_hash', 'auth_key', 'confirmed_at', 'created_at', 'updated_at'], [
            ['admin', 'admin@yandex.ru', '$2y$10$dECpKZ4jIL732up6ANgLiOeZ9dgYejEPqk8S0mvfZI5ZHF8Ugf1Eu', '89usvSMGe-CtraHBaoYOFDnre58Tu-AD', 1551804797, 1551804797, 1551804797],
            ['operator', 'operator@yandex.ru', '$2y$10$dECpKZ4jIL732up6ANgLiOeZ9dgYejEPqk8S0mvfZI5ZHF8Ugf1Eu', '89usvSMGe-CtraHBaoYOFDnre58Tu-AD', 1551804797, 1551804797, 1551804797],
        ]);
        // profile
        $this->batchInsert('{{%profile}}', ['user_id'], [[1], [2]]);
        // auth_item
        $this->batchInsert('{{%auth_item}}', ['name', 'type', 'description'], [
            ['/admin/*', '2', ''],
            ['/cities/*', '2', ''],
            ['/gii/*', '2', ''],
            ['/services/*', '2', ''],
            ['/site/*', '2', ''],
            ['/user/*', '2', ''],
            ['admin', '1', 'Админка. Супер Админ'],
            ['operator', '1', 'Админка. Оператор.'],
        ]);
        // auth_item_child
        $this->batchInsert('{{%auth_item_child}}', ['parent', 'child'], [
            ['admin', '/admin/*'],
            ['admin', '/cities/*'],
            ['admin', '/gii/*'],
            ['admin', '/services/*'],
            ['admin', '/site/*'],
            ['admin', '/user/*'],
            ['operator', '/cities/*'],
            ['operator', '/services/*'],
        ]);
        // auth_assignment
        $this->batchInsert('{{%auth_assignment}}', ['item_name', 'user_id'], [
            ['admin', '1'],
            ['operator', '2'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%auth_assignment}}');
        $this->delete('{{%auth_item_child}}');
        $this->delete('{{%auth_item}}');
        $this->delete('{{%profile}}');
        $this->delete('{{%user}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190306_213841_data_insert cannot be reverted.\n";

        return false;
    }
    */
}
