<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders`.
 */
class m200806_125548_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'work_date' => $this->string(),
            'work_type' => $this->string(),
            'workplace' => $this->string(),
            'area' => $this->string(),
            'address' => $this->string(510),
            'name' => $this->string(),
            'phone' => $this->string(),
            'comment' => $this->text(),
            'contacts' => $this->string(),
            'to_master_id' => $this->integer(),
            'email' => $this->string(),
            'status' => $this->string(),
            'rooms' => $this->integer(),
            'windows' => $this->integer(),
            'windows_qnt' => $this->integer(),
            'work_time' => $this->string(),
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
        $this->dropTable('{{%orders}}');
    }
}
