1. Run command
```
composer require ws-cv-ua/ws-referral-link
```

2. Run migration 
```
yii migrate --migrationPath=@vendor/ws-cv-ua/ws-referral-link/migrations
```

3. Set referral action in frontend controller. For example:
```php
...
public function actions()
{
    return [
        ...
        'referral' => [
            'class' => '\wscvua\ws_referral_link\actions\ReferralAction',
        ],
        ...
    ];
}
...
```

4. Set referral module in admin (backend) part of application. For example:
```php
...
'modules' => [
    'referral' => [
        'class' => \wscvua\ws_referral_link\Module::className(),
        'adminPermission' => ['admin']
    ],
    ...
],
...
```
**adminPermission** is needle permission for access module

5. Referral widget example:
```php
use wscvua\ws_referral_link\widgets\ReferralLink;

ReferralLink::widget([
    'url' => $url,
    'controller' => 'site'
]);
```
If **controller** field not set, then it will be have value of current controller