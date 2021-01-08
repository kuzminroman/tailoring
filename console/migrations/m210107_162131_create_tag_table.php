<?php

use yii\db\Migration;

class m210107_162131_create_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'seo_title' => $this->string(),
            'seo_keywords' => $this->text(),
            'seo_description' => $this->text(),
            'status' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex(
            '{{%idx-id}}',
            '{{%tag}}',
            'id'
        );

        $this->createIndex(
            '{{%idx-name}}',
            '{{%tag}}',
            'name'
        );

        $this->createIndex(
            '{{%idx-status}}',
            '{{%tag}}',
            'status'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tag}}');
    }
}
