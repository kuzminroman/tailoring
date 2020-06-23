<?php

use yii\db\Migration;

class m200201_000000_create_table_registration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);

        $this->createTable('{{%geography}}', [
            'id' => $this->primaryKey(),
            'country' => $this->string(),
            'city' => $this->integer(),
            'street' => $this->string(),
            'house' => $this->string(),
            'geoIp' => $this->string(),
        ]);

        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'gender' => $this->integer(),
            'geography' => $this->integer(),
            'phone' => $this->string(),
            'mail' => $this->string(),
            'desc' => $this->string(),
            'type' => $this->integer(),
            'dateCreate' => $this->dateTime(),
            'dateUpdate' => $this->dateTime(),
            'viewCategory' => $this->string(),
            'typeWork' => $this->string(),
            'approve' => $this->integer(),
            'title' => $this->text(),
            'keywords' => $this->text(),
            'descriptionSeo' => $this->text(),
            'status' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%client_and_subject}}', [
            'id' => $this->primaryKey(),
            'clientId' => $this->integer(),
            'subjectId' => $this->integer(),
        ]);

        $this->createTable('{{%gallery}}', [
            'id' => $this->primaryKey(),
            'clientId' => $this->integer(),
            'avatar' => $this->integer(),
            'image' => $this->string()
        ]);

        $this->createIndex(
            '{{%idx-client-id}}',
            '{{%client}}',
            'id'
        );

        $this->createIndex(
            '{{%idx-client-status}}',
            '{{%client}}',
            'status'
        );

        $this->createIndex(
            '{{%idx-client-name}}',
            '{{%client}}',
            'name'
        );

        $this->createIndex(
            '{{%idx-client-approve}}',
            '{{%client}}',
            'approve'
        );

        $this->createIndex(
            '{{%idx-client-date-create}}',
            '{{%client}}',
            'dateCreate'
        );

        $this->createIndex(
            '{{%idx-client-date-update}}',
            '{{%client}}',
            'dateUpdate'
        );

        $this->createIndex(
            '{{%idx-gallery-id}}',
            '{{%gallery}}',
            'id'
        );

        $this->createIndex(
            '{{%idx-city-id}}',
            '{{%city}}',
            'id'
        );

        $this->createIndex(
            '{{%idx-ctag-id}}',
            '{{%client_and_subject}}',
            'subjectId'
        );

        $this->createIndex(
            '{{%idx-stag-id}}',
            '{{%client_and_subject}}',
            'clientId'
        );

        $this->addForeignKey(
            '{{%fk-geo-id}}',
            '{{%client}}',
            'geography',
            '{{%geography}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            '{{%fk-city-id}}',
            '{{%geography}}',
            'city',
            '{{%city}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            '{{%fk-client-id}}',
            '{{%gallery}}',
            'clientId',
            '{{%client}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            '{{%fk-crud-id}}',
            '{{%client_and_subject}}',
            'subjectId',
            '{{%client}}',
            'id',
        'CASCADE'
        );

        $this->addForeignKey(
            '{{%fk-cli-id}}',
            '{{%client_and_subject}}',
            'clientId',
            '{{%subjects}}',
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
        $this->dropTable('{{%geography}}');
        $this->dropTable('{{%client}}');
        $this->dropTable('{{%gallery}}');
        $this->dropTable('{{%client_and_subject}}');
    }
}
