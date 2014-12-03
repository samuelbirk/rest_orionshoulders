<?php
/**
 * Country Model
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
namespace app\models;

use Yii;
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }
 
    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['code'];
    }
 
    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['code', 'name', 'population'], 'required']
        ];
    }
}
?>