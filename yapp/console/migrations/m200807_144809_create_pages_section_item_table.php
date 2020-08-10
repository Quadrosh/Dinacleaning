<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages_section_item`.
 */
class m200807_144809_create_pages_section_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pages_section_item}}', [
            'id' => $this->primaryKey(),
            'section_id' => $this->integer(),
            'sort' => $this->integer(),
            'head' => $this->string(510),
            'description' => $this->string(510),
            'text' => $this->text(),
            'conclusion' => $this->string(510),

            'image' => $this->string(),
            'image_alt' => $this->string(),
            'image_title' => $this->text(),

            'call2action_description'=>$this->string(510),
            'call2action_name'=>$this->string(),
            'call2action_link'=>$this->string(),
            'call2action_class'=>$this->string(),
            'call2action_comment'=>$this->string(),

            'structure'=>$this->text(),
            'custom_class' => $this->text(),
            'color_key' => $this->string(),
            'view' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk_pages_section_item_section',
            '{{%pages_section_item}}', 'section_id',
            '{{%pages_section}}', 'id',
            'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey( 'fk_pages_section_item_section','{{%pages_section_item}}');
        $this->dropTable('{{%pages_section_item}}');
    }
}
