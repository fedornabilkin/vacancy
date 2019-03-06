<?php
/**
 * Created by PhpStorm.
 * User: fedornabilkin
 * Date: 05.03.2019
 * Time: 23:07
 */

namespace common\behaviors;


use common\models\HistoryServices;
use common\models\Services;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class ServicesHistoryBehavior extends Behavior
{

    private $dirtyAttributes = [];
    private $oldAttributes = [];
    /** @var  HistoryServices */
    private $historyModel;
    /** @var Services */
    private $ownerModel;

    /**
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterUpdate',
        ];
    }

    public function beforeUpdate()
    {
        $this->ownerModel = $this->owner;
        $this->dirtyAttributes = $this->ownerModel->getDirtyAttributes();
        $this->oldAttributes = $this->ownerModel->getOldAttributes();
    }

    public function afterUpdate()
    {
//        $this->ownerModel = $this->owner;
        \Yii::debug($this->dirtyAttributes, 'qwe');
        \Yii::debug($this->oldAttributes, 'qwe');

        foreach($this->dirtyAttributes as $attr => $val){
            $this->historyModel = new HistoryServices();

            $this->historyModel->attr = $attr;
            $this->historyModel->val = $this->oldAttributes[$attr];
            $this->historyModel->services_id = $this->ownerModel->id;

            if (!$this->historyModel->save(false)) {
                $this->setErrors();
            }
        }
    }

    /**
     * @return void
     */
    protected function setErrors()
    {
        // логировать
        \Yii::debug($this->historyModel, 'qwe');
    }
}