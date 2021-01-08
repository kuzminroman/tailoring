<?php

use yii\db\Migration;

class m210107_232243_add_column_user_id extends Migration
{
    public function up()
    {
        try{
            $this->addColumn('{{%client}}', 'user_id', $this->integer()->after('city'));
        }  catch (\Exception $e) {
            return true;
        }
    }

    public function down()
    {
        try{
            $this->dropColumn('{{%client}}', 'user_id');
        }  catch (\Exception $e) {
            return true;
        }
    }
}
