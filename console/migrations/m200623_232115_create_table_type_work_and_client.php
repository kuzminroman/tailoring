<?php

use \yii\db\Migration;
use yii\db\Schema;

class m200623_232115_create_table_type_work_and_client extends Migration
{

    public function up()
    {

        $this->createTable(
            '{{%typework_and_client}}',
            [
                'id' => Schema::TYPE_PK,
                'clientId' => Schema::TYPE_INTEGER,
                'typeworkId' => Schema::TYPE_INTEGER,

            ]
        );

        Yii::$app->db->schema->refresh();
    }

    public function down()
    {
        $this->dropTable('{{%typework_and_client}}');

        Yii::$app->db->schema->refresh();
    }
}