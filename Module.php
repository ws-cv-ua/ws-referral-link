<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30.07.2017
 * Time: 13:41
 */

namespace wscvua\ws_referral_link;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'wscvua\ws_referral_link\controllers';

    public $adminPermission = 'adminPermission';

    public function init()
    {
        parent::init();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['wscvua/ws_admin_simple/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@vendor/ws-cv-ua/ws-referral-link/messages',
            'fileMap' => [
                'wscvua/ws_referral_link/app' => 'app.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('wscvua/ws_referral_link/' . $category, $message, $params, $language);
    }

}