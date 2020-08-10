<?php

use yii\db\Migration;

/**
 * Handles the creation of table `callme`.
 */
class m200806_160216_create_callme_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%callme}}', [
            'id' => $this->primaryKey(),
            'phone' => $this->string(),
            'comment' => $this->text(),
            'utm_content' => $this->string(510),
            'utm_source' => $this->string(510),
            'utm_medium' => $this->string(510),
            'utm_campaign' => $this->string(510),
            'utm_term' => $this->string(510),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%callme}}');
    }
}
