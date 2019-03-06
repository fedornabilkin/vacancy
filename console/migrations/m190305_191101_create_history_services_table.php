<?php

/**
 * Handles the creation of table `{{%history_services}}`.
 */
class m190305_191101_create_history_services_table extends \console\migrations\AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%history_services}}', [
            'id' => $this->primaryKey(),
            'attr' => $this->string(255),
            'val' => $this->text(),
            'services_id' => $this->integer(),
            'created_at' => $this->integer(),
            'created_by' => $this->integer()->notNull()
        ], $this->tableOptions);

        $this->createIndex(
            'idx-history_services-created_by',
            '{{%history_services}}',
            'created_by'
        );

        $this->addForeignKey(
            'fk-history_services-created_by',
            '{{%history_services}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-history_services-services_id',
            '{{%history_services}}',
            'services_id'
        );

        $this->addForeignKey(
            'fk-history_services-services_id',
            '{{%history_services}}',
            'services_id',
            '{{%services}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-history_services-services_id',
            '{{%history_services}}'
        );

        $this->dropIndex(
            'idx-history_services-services_id',
            '{{%history_services}}'
        );

        $this->dropForeignKey(
            'fk-history_services-created_by',
            '{{%history_services}}'
        );

        $this->dropIndex(
            'idx-history_services-created_by',
            '{{%history_services}}'
        );

        $this->dropTable('{{%history_services}}');
    }
}
