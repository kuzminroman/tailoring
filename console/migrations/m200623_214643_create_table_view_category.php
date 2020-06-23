<?php

use \yii\db\Migration;
use yii\db\Schema;

class m200623_214643_create_table_view_category extends Migration
{

    public function up()
    {

        $this->createTable(
            '{{%view_category}}',
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
        $this->dropTable('{{%view_category}}');

        Yii::$app->db->schema->refresh();
    }
}