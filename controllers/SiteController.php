<?php

namespace app\controllers;

use app\models\UserDuties;
use app\models\UserOrganization;
use app\models\UserRegistration;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
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


    public function actionUser()
    {
        $model = new \app\models\UserRegistration();
        if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->post('UserRegistration')['id'] != 0){
                $model = \app\models\UserRegistration::findOne(Yii::$app->request->post('UserRegistration')['id']);
            }

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if(Yii::$app->request->post('action') == 'delete'){
                $model = \app\models\UserRegistration::findOne(Yii::$app->request->post('id'));
                $model->delete();
                return [
                    'data' => [
                        'success' => true,
                        'message' => 'Пользователь удален.',
                    ],
                ];
            }

            if ($model->load(Yii::$app->request->post()) && Yii::$app->request->post('save_user') && $model->validate() && $model->save()) {
                UserOrganization::deleteAll([
                    'user_id' => $model->id,
                ]);

                foreach (Yii::$app->request->post('UserRegistration')['organization'] as $item){
                    $group = new UserOrganization();
                    $group->user_id = $model->id;
                    $group->organization_id = $item;
                    $group->save();
                }

                UserDuties::deleteAll([
                    'user_id' => $model->id,
                ]);

                foreach (Yii::$app->request->post('UserRegistration')['duties'] as $item){
                    $group = new UserDuties();
                    $group->user_id = $model->id;
                    $group->duties_id = $item;
                    $group->save();
                }
                $model = UserRegistration::find()->where(['id'=>$model->id])->with(['organization','duties'])->asArray()->one();
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'Пользователь добавлен.',
                    ],
                ];
            } else {
                return [
                    'data' => [
                        'success' => false,
                        'message' => 'Произошла ошибка.',
                    ],
                ];
            }
        }
        $users = $model::find()->orderBy(['id'=>SORT_DESC])->with(['organization','duties'])->asArray()->all();
        return $this->render('user', [
            'model' => $model,
            'users' => $users,
        ]);
    }

    public function actionOrganization(){
        $model = new \app\models\Organization();

        if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->post('Organization')['id'] != 0){
                $model = \app\models\Organization::findOne(Yii::$app->request->post('Organization')['id']);
            }

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if(Yii::$app->request->post('action') == 'delete'){
                $model = \app\models\Organization::findOne(Yii::$app->request->post('id'));
                $model->delete();
                return [
                    'data' => [
                        'success' => true,
                        'message' => 'Организация удален.',
                    ],
                ];
            }

            if ($model->load(Yii::$app->request->post()) && Yii::$app->request->post('save_user') && $model->validate() && $model->save()) {
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'Организация добавлен.',
                    ],
                ];
            } else {
                return [
                    'data' => [
                        'success' => false,
                        'message' => 'Произошла ошибка.',
                    ],
                ];
            }
        }

        $organizations = $model::find()->orderBy(['id'=>SORT_DESC])->asArray()->all();

        return $this->render('organization', [
            'model' => $model,
            'organizations' => $organizations
        ]);

    }

    public function actionDuties(){

        $model = new \app\models\Duties();

        if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->post('Duties')['id'] != 0){
                $model = \app\models\Duties::findOne(Yii::$app->request->post('Duties')['id']);
            }
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if(Yii::$app->request->post('action') == 'delete'){
                $model = \app\models\Duties::findOne(Yii::$app->request->post('id'));
                $model->delete();
                return [
                    'data' => [
                        'success' => true,
                        'message' => 'Обязанности удален.',
                    ],
                ];
            }

            if ($model->load(Yii::$app->request->post()) && Yii::$app->request->post('save_user') && $model->validate() && $model->save()) {
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'Обязанности добавлен.',
                    ],
                ];
            } else {
                return [
                    'data' => [
                        'success' => false,
                        'message' => 'Произошла ошибка.',
                    ],
                ];
            }
        }

        $duties = $model::find()->orderBy(['id'=>SORT_DESC])->asArray()->all();

        return $this->render('duties', [
            'model' => $model,
            'duties' => $duties
        ]);

    }

}
