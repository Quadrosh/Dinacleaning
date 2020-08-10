<?php

use yii\db\Migration;

/**
 * Handles the creation of table `clean_type`.
 */
class m200806_102324_create_clean_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('clean_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('clean_type');
    }
}
