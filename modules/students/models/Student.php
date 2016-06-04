<?php

namespace app\modules\students\models;

use Yii;
use app\modules\groups\models\Group;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property integer $age
 * @property string $GPA
 * @property string $last_visit
 * @property integer $group
 *
 * @property Group $group0
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'email', 'phone', 'address', 'age', 'GPA', 'last_visit'], 'required'],
            [['age', 'group'], 'integer'],
            [['last_visit'], 'safe'],
            [['name', 'surname', 'email'], 'string', 'max' => 50],
            [['phone', 'address', 'GPA'], 'string', 'max' => 20],
            [['group'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'age' => 'Age',
            'GPA' => 'Gpa',
            'last_visit' => 'Last Visit',
            'group.title' => 'Group',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasOne(Group::className(), ['id' => 'group']);
    }

    /**
     * @inheritdoc
     * @return StudentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentsQuery(get_called_class());
    }

    public function getOneStudent($id = null)
    {
        $student = Student::findOne($id)->toArray();
        $group = Group::find()->select('title')->where(['id' => $student['group']])->one()->toArray();
        return array_merge($student, $group);
    }
}
