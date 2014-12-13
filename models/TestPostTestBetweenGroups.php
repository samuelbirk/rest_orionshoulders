<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_post_test_between_groups".
 *
 * @property integer $id
 * @property double $treatment_mean
 * @property integer $treatment_n
 * @property double $treatment_sd
 * @property double $control_mean
 * @property integer $control_n
 * @property double $control_sd
 * @property double $pooled_sample_sd
 * @property double $final_result
 * @property string $create_time
 * @property string $update_time
 * @property integer $created_by_id
 * @property integer $last_modified_by_id
 * @property integer $history_id
 * @property integer $deleted
 * @property integer $active
 */
class TestPostTestBetweenGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_post_test_between_groups';
    }

    public static function find()
    {
        return parent::find()->where(['deleted' => 0, 'active' => 1]);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            //This is a new record
            $time = date('Y-m-d H:i:s',time());
            $model = $this;
            $model->create_time = $time;
            $model->created_by_id = \Yii::$app->user->id;
            return true;
        } else {
            //This is an update
            $time = date('Y-m-d H:i:s',time());
            $model = $this;
            $model->update_time = $time;
            $model->last_modified_by_id = \Yii::$app->user->id;

            return false;
        }
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['treatment_mean', 'treatment_sd', 'control_mean', 'control_sd', 'pooled_sample_sd', 'final_result'], 'number'],
            [['treatment_n', 'control_n', 'created_by_id', 'last_modified_by_id', 'history_id', 'deleted', 'active'], 'integer'],
            [['create_time', 'update_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'treatment_mean' => Yii::t('app', 'Treatment Mean'),
            'treatment_n' => Yii::t('app', 'Treatment N'),
            'treatment_sd' => Yii::t('app', 'Treatment Sd'),
            'control_mean' => Yii::t('app', 'Control Mean'),
            'control_n' => Yii::t('app', 'Control N'),
            'control_sd' => Yii::t('app', 'Control Sd'),
            'pooled_sample_sd' => Yii::t('app', 'Pooled Sample Sd'),
            'final_result' => Yii::t('app', 'Final Result'),
            'create_time' => Yii::t('app', 'Create Time'),
            'update_time' => Yii::t('app', 'Update Time'),
            'created_by_id' => Yii::t('app', 'Created By ID'),
            'last_modified_by_id' => Yii::t('app', 'Last Modified By ID'),
            'history_id' => Yii::t('app', 'History ID'),
            'deleted' => Yii::t('app', 'Deleted'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
}
