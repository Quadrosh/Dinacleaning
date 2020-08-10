<?php

use yii\db\Migration;

/**
 * Handles adding created_at to table `review`.
 */
class m200807_083817_add_created_at_column_to_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%review}}', 'created_at', $this->integer());
        $this->addColumn('{{%review}}', 'updated_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%review}}', 'created_at');
        $this->dropColumn('{{%review}}', 'updated_at');
    }
}
