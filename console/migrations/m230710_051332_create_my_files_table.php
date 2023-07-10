<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%my_files}}`.
 */
class m230710_051332_create_my_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%my_files}}', [
            'id' => $this->primaryKey(),
            'file_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%my_files}}');
    }
}
