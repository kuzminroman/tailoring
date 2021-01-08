<?php

use yii\db\Migration;

class m210107_162501_create_table_user extends Migration
{
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->unique(),
            'mail' => $this->string()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->defaultValue(0),
        ], $tableOptions);

        $this->createIndex(
            '{{%idx-id}}',
            '{{%user}}',
            'id'
        );

        $this->createIndex(
            '{{%idx-mail}}',
            '{{%user}}',
            'mail'
        );

        $this->createIndex(
            '{{%idx-status}}',
            '{{%user}}',
            'status'
        );

    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
