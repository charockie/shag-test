<?php

use yii\db\Migration;

class m160602_175232_groups extends Migration
{
    public function up()
    {
        $this->createTable('groups',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(50)->notNull(),
            ]);
    }

    public function down()
    {
        $this->dropTable('groups');
    }
}
