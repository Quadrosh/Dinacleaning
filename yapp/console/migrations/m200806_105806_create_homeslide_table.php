<?php

use yii\db\Migration;

/**
 * Handles the creation of table `homeslide`.
 */
class m200806_105806_create_homeslide_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%home_slides}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'lead' => $this->string()->notNull(),
            'lead2' => $this->string(),
            'text' => $this->text(),
            'image' => $this->string(),
            'promolink' => $this->string(),
            'promoname' => $this->string(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%home_slides}}');
    }
}
