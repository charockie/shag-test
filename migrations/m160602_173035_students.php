<?php

use yii\db\Migration;

class m160602_173035_students extends Migration
{
    public function up()
    {
        $this->createTable('students',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(50)->notNull(),
                'surname' => $this->string(50)->notNull(),
                'email' => $this->string(50)->notNull(),
                'phone' => $this->string(20)->notNull(),
                'address' => $this->string(20)->notNull(),
                'age' => $this->integer()->notNull(),
                'GPA' => $this->string(20)->notNull(),
                'last_visit' => $this->dateTime()->notNull(),
                'group' => $this->integer()->notNull(),
            ]);
    }

    public function down()
    {
        $this->dropTable('students');
    }
}
