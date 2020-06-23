<?php

use yii\db\Migration;

class m200127_000000_create_main_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
/*        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'title' => $this->string(),
            'keywords' => $this->text(),
            'description' => $this->text(),
            'status' => $this->integer()->notNull(),
        ]);*/

        $this->createTable('{{%subjects}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'title' => $this->string(),
            'keywords' => $this->text(),
            'description' => $this->text(),
            'status' => $this->integer()->notNull(),
        ]);

    /*    $this->createIndex(
            '{{%idx_category_id}}',
            '{{%category}}',
            'id'
        );

        $this->createIndex(
            '{{%idx_category_status}}',
            '{{%category}}',
            'status'
        );

        $this->createIndex(
            '{{%idx_category_name}}',
            '{{%category}}',
            'name'
        );*/

        $this->createIndex(
            '{{%idx_subject_id}}',
            '{{%subjects}}',
            'id'
        );

        $this->createIndex(
            '{{%idx_subject_status}}',
            '{{%subjects}}',
            'status'
        );

  /*      $this->addForeignKey(
            '{{%fk-category_id}}',
            '{{%crud}}',
            'categoryId',
            '{{%category}}',
            'id',
            'CASCADE'
        );*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subjects}}');
//        $this->dropTable('{{%category}}');
    }
}