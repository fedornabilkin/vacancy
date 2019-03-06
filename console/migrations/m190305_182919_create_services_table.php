<?php

/**
 * Handles the creation of table `{{%services}}`.
 */
class m190305_182919_create_services_table extends \console\migrations\AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'code' => $this->string(255),
            'price' => $this->integer()->unsigned(),
            'description' => $this->text(),
            'status' => $this->boolean()->defaultValue(0),
            'expiration_date' => $this->dateTime(),
            'city_id' => $this->integer()
        ], $this->tableOptions);

        $this->createIndex(
            'idx-services-city_id',
            '{{%services}}',
            'city_id'
        );

        $this->addForeignKey(
            'fk-services-city_id',
            '{{%services}}',
            'city_id',
            '{{%cities}}',
            'id',
            'CASCADE'
        );

        $this->batchInsert('{{%services}}', ['name', 'description', 'status', 'expiration_date', 'city_id'], [
            ['Конфигурация', 'Настройка проекта', 0, '2019-11-11', 1],
            ['Навигация', 'Поиск конфигурации', 1, '2019-11-11', 2],
            ['Трансформация', 'Аггрегация данных', 1, '2019-11-11', 2],
            ['Персонификация', 'Урбанизация относительности', 1, '2019-11-11', 2],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-services-city_id',
            '{{%services}}'
        );

        $this->dropIndex(
            'idx-services-city_id',
            '{{%services}}'
        );

        $this->delete('{{%services}}');
        $this->dropTable('{{%services}}');
    }
}
