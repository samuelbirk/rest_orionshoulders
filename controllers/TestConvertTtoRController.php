<?php
namespace app\controllers;
use Yii;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use yii\filters\Cors;
use yii\web\HeaderCollection;
use yii\data\ActiveDataProvider;
use app\models\User;

class TestconvertttotController extends ActiveController
{


    public $modelClass = 'app\models\TestConvertTToT';
   
    public function behaviors()
    {

        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' =>  QueryParamAuth::className(),
        ];
       
        return $behaviors;
    }

    public function actionLast()
    {
        if (!empty($_GET)) {
            $model = new $this->modelClass;
           
            try {
                //echo Yii::$app->user->id;
                $provider = new ActiveDataProvider([
                    'query' => $model->find()->where(['created_by_id' => \Yii::$app->user->id])->orderBy(['create_time'=>SORT_DESC])->limit(1),
                    'pagination' => false
                ]);
            } catch (Exception $ex) {
                throw new \yii\web\HttpException(500, 'Internal server error');
            }

            if ($provider->getCount() <= 0) {
                throw new \yii\web\HttpException(404, 'No entries found with this query string');
            } else {
                return $provider;
            }
        } else {
            throw new \yii\web\HttpException(400, 'No query strings were provided');
        }
    }

    public function actionMine()
    {
        if (!empty($_GET)) {
            $model = new $this->modelClass;
           
            try {
                $user = User::findOne(Yii::$app->user->id);
                if($user->username == 'guest'){
                    //we do not want to return any results because there is only one generic guest user
                    throw new \yii\web\HttpException(404, 'No entries found with this query string');
                }
                else{
                    $provider = new ActiveDataProvider([
                        'query' => $model->find()->where(['created_by_id' => \Yii::$app->user->id])->orderBy(['create_time'=>SORT_DESC]),
                        'pagination' => false
                    ]);
                }
            } catch (Exception $ex) {
                throw new \yii\web\HttpException(500, 'Internal server error');
            }

            if ($provider->getCount() <= 0) {
                throw new \yii\web\HttpException(404, 'No entries found with this query string');
            } else {
                return $provider;
            }
        } else {
            throw new \yii\web\HttpException(400, 'No query strings were provided');
        }
    }

    public function actionFirst()
    {
        if (!empty($_GET)) {
            $model = new $this->modelClass;
           
            try {
                //echo Yii::$app->user->id;
                $provider = new ActiveDataProvider([
                    'query' => $model->find()->where(['created_by_id' => \Yii::$app->user->id])->orderBy(['create_time'=>SORT_ASC])->limit(1),
                    'pagination' => false
                ]);
            } catch (Exception $ex) {
                throw new \yii\web\HttpException(500, 'Internal server error');
            }

            if ($provider->getCount() <= 0) {
                throw new \yii\web\HttpException(404, 'No entries found with this query string');
            } else {
                return $provider;
            }
        } else {
            throw new \yii\web\HttpException(400, 'No query strings were provided');
        }
    }

    /*public function checkAccess() {
    	return true;
    }*/

}