<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $fathername
 * @property int $specialization_id
 * @property int $science_degree_id
 * @property string $description
 * @property string $created_at
 * @property string $willing_at
 * @property int $is_paid
 *
 * @property ScienceDegree $scienceDegree
 * @property Specialization $specialization
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'fathername', 'willing_at'], 'required'],
            [['specialization_id', 'science_degree_id', 'is_paid'], 'default', 'value' => null],
            [['specialization_id', 'science_degree_id', 'is_paid'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'willing_at'], 'safe'],
            [['firstname', 'lastname', 'fathername'], 'string', 'max' => 255],
            [['science_degree_id'], 'exist', 'skipOnError' => true, 'targetClass' => ScienceDegree::className(), 'targetAttribute' => ['science_degree_id' => 'id']],
            [['specialization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialization::className(), 'targetAttribute' => ['specialization_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstname' => Yii::t('app', 'Firstname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'fathername' => Yii::t('app', 'Fathername'),
            'specialization_id' => Yii::t('app', 'Specialization ID'),
            'science_degree_id' => Yii::t('app', 'Science Degree ID'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'willing_at' => Yii::t('app', 'Willing At'),
            'is_paid' => Yii::t('app', 'Is Paid'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScienceDegree()
    {
        return $this->hasOne(ScienceDegree::className(), ['id' => 'science_degree_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialization()
    {
        return $this->hasOne(Specialization::className(), ['id' => 'specialization_id']);
    }
}
