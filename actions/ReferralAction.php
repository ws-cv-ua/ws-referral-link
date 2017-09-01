<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01.09.2017
 * Time: 15:44
 */

namespace wscvua\ws_referral_link\actions;

use wscvua\ws_referral_link\models\ReferralLink;
use Yii;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class ReferralAction extends Action
{

    public function init()
    {
        Yii::$app->response->statusCode = 301;
    }

    public function run($key)
    {
        $model = ReferralLink::findByKey($key);
        if (!$model)
            throw new NotFoundHttpException();

        $model->addFollowing();

        return Yii::$app->response->redirect($model->link);
    }

}