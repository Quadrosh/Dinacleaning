<?php

use yii\db\Migration;

/**
 * Handles the creation of table `prices`.
 */
class m200806_121959_create_prices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prices}}', [
            'id' => $this->primaryKey(),
            'list_order' => $this->integer(),
            'type_id' => $this->integer(),
            'name' => $this->string(),
            'name_descr' => $this->text(),
            'price' => $this->integer(),
            'price_descr' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%prices}}');
    }
}
