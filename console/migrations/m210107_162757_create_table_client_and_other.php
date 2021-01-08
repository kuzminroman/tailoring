<?php

use yii\db\Migration;

class m210107_162757_create_table_client_and_other extends Migration
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

        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ], $tableOptions);

        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'middle_name' => $this->string(),
            'gender' => $this->integer(),
            'description' => $this->string(),
            'type' => $this->integer(),
            'date_create' => $this->dateTime(),
            'date_update' => $this->dateTime(),
            'seo_title' => $this->text(),
            'seo_keywords' => $this->text(),
            'seo_description' => $this->text(),
            'address' => $this->string(),
            'city' => $this->integer(),
            'approve' => $this->integer(),
            'status' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%activities}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ], $tableOptions);

        $this->createIndex(
            '{{%idx-id}}',
            '{{%client}}',
            'id'
        );

        $this->createIndex(
            '{{%idx-status}}',
            '{{%client}}',
            'status'
        );

        $this->createIndex(
            '{{%idx-first_name}}',
            '{{%client}}',
            'first_name'
        );

        $this->createIndex(
            '{{%idx-approve}}',
            '{{%client}}',
            'approve'
        );

        $this->createIndex(
            '{{%idx-date_create}}',
            '{{%client}}',
            'date_create'
        );

        $this->createIndex(
            '{{%idx-date_update}}',
            '{{%client}}',
            'date_update'
        );

        $this->createIndex(
            '{{%idx-type}}',
            '{{%client}}',
            'type'
        );

        $this->createIndex(
            '{{%idx-city}}',
            '{{%client}}',
            'city'
        );

        $this->createIndex(
            '{{%idx-id}}',
            '{{%city}}',
            'id'
        );

        $this->createIndex(
            '{{%idx-tag_id}}',
            '{{%activities}}',
            'tag_id'
        );

        $this->createIndex(
            '{{%idx-client_id}}',
            '{{%activities}}',
            'client_id'
        );

        $this->addForeignKey(
            '{{%fk-client_id}}',
            '{{%activities}}',
            'client_id',
            '{{%client}}',
            'id',
        'CASCADE'
        );

        $this->addForeignKey(
            '{{%fk-tag_id}}',
            '{{%activities}}',
            'tag_id',
            '{{%tag}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city}}');
        $this->dropTable('{{%client}}');
        $this->dropTable('{{%activities}}');
    }
}
