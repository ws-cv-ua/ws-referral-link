<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model wscvua\ws_referral_link\models\ReferralLink */

$this->title = Yii::t('app', 'Create Referral Link');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Referral Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referral-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
