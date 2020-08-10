<?php

use yii\db\Migration;

/**
 * Handles adding created_at to table `pages`.
 */
class m200807_130612_add_created_at_column_to_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%pages}}', 'image', $this->string());
        $this->addColumn('{{%pages}}', 'image_alt', $this->string());
        $this->addColumn('{{%pages}}', 'image_title', $this->text());
        $this->addColumn('{{%pages}}', 'layout', $this->string());
        $this->addColumn('{{%pages}}', 'view', $this->string());
        $this->addColumn('{{%pages}}', 'updated_at', $this->integer());
        $this->addColumn('{{%pages}}', 'created_at', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%pages}}', 'image');
        $this->dropColumn('{{%pages}}', 'image_alt');
        $this->dropColumn('{{%pages}}', 'image_title');
        $this->dropColumn('{{%pages}}', 'layout');
        $this->dropColumn('{{%pages}}', 'view');
        $this->dropColumn('{{%pages}}', 'updated_at');
        $this->dropColumn('{{%pages}}', 'created_at');
    }
}
