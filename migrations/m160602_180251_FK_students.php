<?php

use yii\db\Migration;

class m160602_180251_FK_students extends Migration
{
    public function up()
    {
        $this->addForeignKey('FK_students_group', 'students', 'group', 'groups', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('FK_students_group', 'students');
    }
}
