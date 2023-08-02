<?php

use yii\db\Migration;

/**
 * Class m230414_065737_alter_documents_table
 */
class m230414_065737_alter_documents_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // I change all integer columns to unsigned integer, add price column with real type
        $this->alterColumn('documents', 'downloads', $this->integer()->unsigned()->notNull()->defaultExpression(0));
        $this->alterColumn('documents', 'views', $this->integer()->unsigned()->notNull()->defaultExpression(0));
        $this->alterColumn('documents', 'category_id', $this->integer()->unsigned()->notNull());
        $this->alterColumn('documents', 'subject_id', $this->integer()->unsigned()->notNull());
        $this->alterColumn('documents', 'created_by', $this->integer()->unsigned()->notNull()->defaultExpression(1));
        $this->alterColumn('documents', 'updated_by', $this->integer()->unsigned()->notNull()->defaultExpression(1));
        $this->addColumn('documents', 'price', $this->double()->unsigned()->notNull()->defaultExpression(0));
        // add column status with boolean type
//        $this->addColumn('documents', 'status', $this->boolean()->notNull()->defaultValue(true));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230414_065737_alter_documents_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230414_065737_alter_documents_table cannot be reverted.\n";

        return false;
    }
    */
}
