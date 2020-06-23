<?php

use \yii\db\Migration;
use yii\db\Schema;

class m200623_214643_create_table_client_phones extends Migration
{

    public function up()
    {

        $this->createTable(
            '{{%client_phones}}',
            [
                'id' => Schema::TYPE_PK,
                'clientId' => Schema::TYPE_INTEGER,
                'number' => Schema::TYPE_STRING,

            ]
        );

        Yii::$app->db->schema->refresh();
    }

    public function down()
    {
        $this->dropTable('{{%client_phones}}');

        Yii::$app->db->schema->refresh();
    }
}