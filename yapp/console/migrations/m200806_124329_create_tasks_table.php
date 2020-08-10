<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m200806_124329_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tasks}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'name' => $this->string(),
            'description' => $this->text(),
            'price' => $this->integer(),
            'price_description' => $this->text(),
            'image' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tasks}}');
    }
}
