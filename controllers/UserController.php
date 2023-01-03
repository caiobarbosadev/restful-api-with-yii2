<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use yii\base\Exception;
use yii\web\HttpException;

// configure here
class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';

    public function actionSearch()
    {
        $params = Yii::$app->request->queryParams;

        if ($params) {
            $model = new $this->modelClass;

            foreach ($params as $key => $value) {
                if (!$model->hasAttribute($key)) {
                    throw new HttpException(404, 'Invalid attribute:' . $key);
                }
            }

            try {
                $provider = new ActiveDataProvider([
                    'query' => $model->find()->where(['or', $params]),
                    'pagination' => false
                ]);
            } catch (Exception $ex) {
                throw new HttpException(500, 'Internal server error');
            }

            if ($provider->getCount() <= 0) {
                throw new HttpException(404, 'No entries found with this query string');
            } else {
                return $provider;
            }
        } else {
            throw new HttpException(400, 'There are no query string');
        }
    }
}
