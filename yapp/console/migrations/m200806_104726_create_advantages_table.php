<?php

use yii\db\Migration;

/**
 * Handles the creation of table `advantages`.
 */
class m200806_104726_create_advantages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%advantages}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'long_text' => $this->text(),
            'image' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%advantages}}');
    }
}
