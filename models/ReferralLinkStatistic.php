<?php

namespace wscvua\ws_referral_link\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "{{%ReferralLink_statistic}}".
 *
 * @property integer $id
 * @property integer $rl_id
 * @property string $create_at
 *
 * @property ReferralLink $rl
 */
class ReferralLinkStatistic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ReferralLink_statistic}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rl_id'], 'integer'],
            [['create_at'], 'safe'],
            [['rl_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReferralLink::className(), 'targetAttribute' => ['rl_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'rl_id' => Yii::t('app', 'Rl ID'),
            'create_at' => Yii::t('app', 'Create At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRl()
    {
        return $this->hasOne(ReferralLink::className(), ['id' => 'rl_id']);
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['create_at'],
                ],
                'value' => function () {
                    return new Expression('CURRENT_TIMESTAMP');
                }
            ],
        ];
    }
}