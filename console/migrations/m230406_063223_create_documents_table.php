<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%documents}}`.
 */
class m230406_063223_create_documents_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%documents}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(255)->notNull(),
            'name' => $this->string(255)->notNull(),
            'file' => $this->string(255)->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'image' => $this->string(255)->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'downloads' => $this->integer()->notNull()->defaultExpression(0),
            'views' => $this->integer()->notNull()->defaultExpression(0),
            'status' => $this->integer()->notNull()->defaultExpression(1),
            'category_id' => $this->integer()->notNull(),
            'subject_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'created_by' => $this->integer()->notNull()->defaultExpression(1),
            'updated_by' => $this->integer()->notNull()->defaultExpression(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%documents}}');
    }
}
