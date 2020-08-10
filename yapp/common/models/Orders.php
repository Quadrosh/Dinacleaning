<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $user_id
 * @property string $work_date
 * @property string $work_type
 * @property string $workplace
 * @property int $area
 * @property string $address
 * @property string $name
 * @property string $phone
 * @property string $comment
 * @property string $contacts
 * @property int $to_master_id
 * @property string $email
 * _@property string $date
 * @property int $created_at
 * @property int $updated_at
 * @property string $status
 * @property int $rooms
 * @property int $windows
 * @property int $windows_qnt
 * @property string $work_time
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    public function behaviors()
    {
        return [
            'timestamp'  => [
                'class' => \yii\behaviors\TimestampBehavior::className(),
//                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'to_master_id', 'rooms', 'windows', 'windows_qnt', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string'],
//            [['date'], 'safe'],
            [['work_date', 'work_type', 'area', 'workplace', 'name', 'phone', 'contacts', 'email', 'status', 'work_time'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 510],
            [['phone','address','work_type'], 'required'],
            [['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], 'string'],
            ['utm_source', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_medium', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_campaign', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_term', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_content', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'work_date' => 'Work Date',
            'work_type' => 'Work Type',
            'workplace' => 'Workplace',
            'area' => 'Area',
            'address' => 'Address',
            'name' => 'Name',
            'phone' => 'Phone',
            'comment' => 'Comment',
            'contacts' => 'Contacts',
            'to_master_id' => 'To Master ID',
            'email' => 'Email',
            'date' => 'Date',
            'status' => 'Status',
            'rooms' => 'Rooms',
            'windows' => 'Windows',
            'windows_qnt' => 'Windows Qnt',
            'work_time' => 'Work Time',

            'utm_source' => 'UTM Source',
            'utm_medium' => 'UTM Medium',
            'utm_campaign' => 'UTM Campaign',
            'utm_term' => 'UTM Term',
            'utm_content' => 'UTM Content',
        ];
    }
}
