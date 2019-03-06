<?php

/**
 * Handles the creation of table `{{%sities}}`.
 */
class m190305_181425_create_cities_table extends \console\migrations\AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cities}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()
        ], $this->tableOptions);

        $this->batchInsert('{{%cities}}', ['name'], [
            ['Катманду'],
            ['Брест'],
            ['Смогири']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%cities}}');
        $this->dropTable('{{%cities}}');
    }
}
