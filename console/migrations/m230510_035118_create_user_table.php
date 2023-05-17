<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m230510_035118_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp(): void
    {
        $this->createTable('{{%user}}', [
                'id' => $this->primaryKey(),
                'username' => $this->string(255)->notNull()->unique(),
                'auth_key' => $this->string(32)->notNull(),
                'password_hash' => $this->string(255)->notNull(),
                'password_reset_token' => $this->string(255)->unique(),
                'email' => $this->string(255)->notNull()->unique(),
                'status' => $this->smallInteger()->notNull()->defaultValue(10),
                'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'verification_token' => $this->string(255)->defaultValue(null),
                'balance' => $this->integer()->notNull()->defaultValue(0),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown(): void
    {
        $this->dropTable('{{%user}}');
    }
}
