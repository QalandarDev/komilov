<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaction}}`.
 */
class m230511_081133_create_transaction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('transaction', [
            'id' => $this->primaryKey(),
            'from' => $this->string(),
            'to' => $this->string(),
            'cost' => $this->integer(),
            'message' => $this->text(),
            'time' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%transaction}}');
    }
}
