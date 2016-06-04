<?php

namespace app\modules\groups\models;

use Yii;
use app\modules\students\models\Student;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "groups".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Students[] $students
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['group' => 'id']);
    }

    /**
     * @inheritdoc
     * @return GroupsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GroupsQuery(get_called_class());
    }
    
    public function getGroupForDropDown($withDefault = false)
    {
        $items = Group::find()->select(['title', 'id'])->indexBy('id')->column();
        
        if ($withDefault)
            $items = ArrayHelper::merge(['' => 'Все'], $items);
        
        return $items;
    }
}
