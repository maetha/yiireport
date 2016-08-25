<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property integer $id
 * @property string $namegroup
 */
class Groups extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['namegroup'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'namegroup' => 'ชื่อกลุ่มงาน',
        ];
    }

    public function getGroupdep() {
        return $this->hasMany(Departments::className(), ['group_id' => 'id']);
    }

}
