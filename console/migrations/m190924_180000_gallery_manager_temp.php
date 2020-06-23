<?php

use \yii\db\Migration;
use yii\db\Schema;

class m190924_180000_gallery_manager_temp extends Migration
{

    public function up()
    {

        $this->createTable(
            '{{%gallery_temp}}',
            [
                'id' => Schema::TYPE_PK,
                'imageId' => Schema::TYPE_INTEGER,
                'temporaryIndex' => Schema::TYPE_INTEGER,
                'csrfToken' => Schema::TYPE_STRING,
                'userIdentityId' => Schema::TYPE_STRING,
                'sessionId' => Schema::TYPE_STRING,
            ]
        );

        $this->addColumn('{{%gallery_temp}}', 'type', $this->string()->null() . ' AFTER id');
        $this->createIndex('{{%i_type}}', '{{%gallery_temp}}', 'type');

        $this->createIndex('{{%i_uiid}}', '{{%gallery_temp}}', 'userIdentityId');
        $this->addForeignKey('{{%fk_gallery_temp_to_gallery}}', '{{%gallery_temp}}', 'imageId', '{{%gallery_image}}', 'id', 'CASCADE', 'CASCADE');

        Yii::$app->db->schema->refresh();
    }

    public function down()
    {
        $this->dropIndex('{{%i_type}}', '{{%gallery_temp}}');
        $this->dropColumn('{{%gallery_temp}}', 'type');

        Yii::$app->db->schema->refresh();
    }
}