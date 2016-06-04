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
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout'],
//                'rules' => [
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
            $select = \Yii::$app->request->get()['StudentsSearch']['group'];
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
