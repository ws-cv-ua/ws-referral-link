<?php

namespace wscvua\ws_referral_link\widgets;

use wscvua\ws_referral_link\models\ReferralLink as ReferralLinkModel;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Url;

class ReferralLink extends Widget
{
    public $url;
    public $controller;

    public function init()
    {
        if (!$this->controller)
            $this->controller = \Yii::$app->controller->uniqueId;
    }

    public function run()
    {
        if (!$this->url)
            throw new Exception('You must set $url variable!');

        return Url::to(['/' . $this->controller . '/referral', 'key' => ReferralLinkModel::findByLink($this->url)->key]);
    }
}