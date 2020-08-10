<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m200806_110531_create_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey(),
            'hrurl' => $this->string(),
            'seo_insert' => $this->text(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'keywords' => $this->text(),
            'pagehead' => $this->text(),
            'pagedescription' => $this->text(),
            'text' => $this->text(),
            'imagelink' => $this->string(),
            'imagelink_alt' => $this->string(),
            'sendtopage' => $this->string(),
            'promolink' => $this->string(),
            'promoname' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pages}}');
    }
}
