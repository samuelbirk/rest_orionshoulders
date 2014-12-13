<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_pre_test_post_test_w_control".
 *
 * @property integer $id
 * @property double $post_treatment_mean
 * @property double $pre_treatment_mean
 * @property double $pre_treatment_sd
 * @property double $post_control_mean
 * @property double $pre_control_mean
 * @property double $pre_control_sd
 * @property double $final_result
 * @property string $create_time
 * @property string $update_time
 * @property integer $created_by_id
 * @property integer $last_modified_by_id
 * @property integer $history_id
 * @property integer $deleted
 * @property integer $active
 */
class TestPreTestPostTestWControl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_pre_test_post_test_w_control';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_treatment_mean', 'pre_treatment_mean', 'pre_treatment_sd', 'post_control_mean', 'pre_control_mean', 'pre_control_sd', 'final_result'], 'number'],
            [['create_time', 'update_time'], 'safe'],
            [['created_by_id', 'last_modified_by_id', 'history_id', 'deleted', 'active'], 'integer']
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'post_treatment_mean' => Yii::t('app', 'Post Treatment Mean'),
            'pre_treatment_mean' => Yii::t('app', 'Pre Treatment Mean'),
            'pre_treatment_sd' => Yii::t('app', 'Pre Treatment Sd'),
            'post_control_mean' => Yii::t('app', 'Post Control Mean'),
            'pre_control_mean' => Yii::t('app', 'Pre Control Mean'),
            'pre_control_sd' => Yii::t('app', 'Pre Control Sd'),
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
