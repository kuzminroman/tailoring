<?php

use \yii\db\Migration;
use yii\db\Schema;

class m200623_214643_create_table_typework extends Migration
{

    public function up()
    {

        $this->createTable(
            '{{%typework}}',
            [
                'id' => Schema::TYPE_PK,
                'status' => Schema::TYPE_INTEGER,
                'name' => Schema::TYPE_STRING,

            ]
        );

        Yii::$app->db->schema->refresh();
    }

    public function down()
    {
        $this->dropTable('{{%typework}}');

        Yii::$app->db->schema->refresh();
    }
}