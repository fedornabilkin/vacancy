<?php

namespace common\models;

use common\behaviors\ServicesHistoryBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $price
 * @property string $description
 * @property int $status
 * @property string $expiration_date
 * @property int $city_id
 *
 * @property HistoryServices[] $historyServices
 * @property Cities $city
 */
class Services extends \yii\db\ActiveRecord
{

    CONST STATUS_ENABLED = 1;
    CONST SCENARIO_STATUS = 'status';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    public function behaviors()
    {
        return array_merge_recursive(parent::behaviors(), [
            'ServicesHistoryBehavior' => [
                'class' => ServicesHistoryBehavior::class,
            ],

        ]);
    }

    public function scenarios()
    {
        $s =  parent::scenarios();
        $s[self::SCENARIO_STATUS] = ['status'];
        return $s;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'city_id'], 'integer'],
            [['price', 'city_id'], 'filter', 'filter' => 'intval'],
            [['description'], 'string'],
            [['expiration_date'], 'safe'],
            [['name', 'code'], 'string', 'max' => 255],

            ['status', 'filter', 'filter' => function ($value) {
                return (int) $value;
            }, 'on' => self::SCENARIO_STATUS],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'price' => 'Price',
            'description' => 'Description',
            'status' => 'Status',
            'expiration_date' => 'Expiration Date',
            'city_id' => 'City ID',
        ];
    }

    public function getCitiesForSelect()
    {
        $authors = Cities::find()->all();
        return ArrayHelper::map($authors,'id','name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistory()
    {
        return $this->hasMany(HistoryServices::class, ['services_id' => 'id'])->orderBy(['id' => SORT_DESC]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::class, ['id' => 'city_id']);
    }
}
