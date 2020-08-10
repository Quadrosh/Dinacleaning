<?php

use yii\db\Migration;

/**
 * Handles the creation of table `review`.
 */
class m200806_100559_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'type' => $this->string(),
            'text' => $this->text(),
            'image' => $this->text(),
            'icon' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%review}}');
    }
}
