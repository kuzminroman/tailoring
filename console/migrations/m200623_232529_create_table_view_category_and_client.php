<?php

use \yii\db\Migration;
use yii\db\Schema;

class m200623_232529_create_table_view_category_and_client extends Migration
{

    public function up()
    {

        $this->createTable(
            '{{%viewcategory_and_client}}',
            [
                'id' => Schema::TYPE_PK,
                'clientId' => Schema::TYPE_INTEGER,
                'viewCategoryId' => Schema::TYPE_INTEGER,

            ]
        );

        Yii::$app->db->schema->refresh();
    }

    public function down()
    {
        $this->dropTable('{{%viewcategory_and_client}}');

        Yii::$app->db->schema->refresh();
    }
}