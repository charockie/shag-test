<?php

namespace app\controllers;

use app\models\StudentsSearch;
use app\modules\groups\models\Group;
use app\modules\students\models\Student;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $studentSearch = new StudentsSearch();

        if(empty(\Yii::$app->request->get()))
        {
            $select = '';
        }else {
            $select = \Yii::$app->request->get()['group'];
        }

        return $this->render('index', [
            'searchModel' => $studentSearch,
            'dataProvider' => $studentSearch->search(\Yii::$app->request->queryParams),
            'groups' => Group::getGroupForDropDown(true),
            'select' => $select,
        ]);
    }

    public function actionStudent()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return Student::getOneStudent(\Yii::$app->request->post());
    }
}
