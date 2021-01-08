<?php

use \yii\db\Migration;
use yii\db\Schema;

class m210107_162604_create_table_phones extends Migration
{
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%phones}}',
            [
                'id' => Schema::TYPE_PK,
                'client_id' => Schema::TYPE_INTEGER,
                'number' => Schema::TYPE_STRING,
            ], $tableOptions
        );

        Yii::$app->db->schema->refresh();
    }

    public function down()
    {
        $this->dropTable('{{%phones}}');

        Yii::$app->db->schema->refresh();
    }
}
