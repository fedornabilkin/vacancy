<?php

namespace common\models;

use dektrium\user\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "history_services".
 *
 * @property int $id
 * @property string $attr
 * @property string $val
 * @property int $services_id
 * @property int $created_at
 * @property int $user_at
 *
 * @property Services $services
 * @property User $userAt
 */
class HistoryServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history_services';
    }

    public function behaviors()
    {
        return array_merge_recursive(parent::behaviors(), [
            'TimestampBehavior' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
            'blameableBehavior' => [
                'class' => BlameableBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_by'],
                ],
            ],

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['val'], 'string'],
            [['services_id', 'created_at', 'created_by'], 'integer'],
            [['created_by'], 'required'],
            [['attr'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attr' => 'Attr',
            'val' => 'Val',
            'services_id' => 'Services ID',
            'created_at' => 'Created',
            'created_by' => 'User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasOne(Services::class, ['id' => 'services_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }
}
