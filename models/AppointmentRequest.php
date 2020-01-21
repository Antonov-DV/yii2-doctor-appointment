<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 27.05.18
 * Time: 14:28
 */

namespace app\models;


use Yii;
use yii\base\Model;

class AppointmentRequest extends Model
{
    public $firstName;
    public $lastName;
    public $fatherName;
    public $willingAt;
    public $specializationId;
    public $scienceDegreeId;
    public $description;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'fatherName', 'willingAt'], 'required'],
            [['willingAt'], 'date', 'format' => 'dd-MM-yyyy', 'min' => date('d-m-Y', strtotime('+1 day'))],
            [['specializationId', 'scienceDegreeId'], 'default', 'value' => null],
            [['specializationId', 'scienceDegreeId'], 'integer'],
            [['description'], 'string'],
            [['firstName', 'lastName', 'fatherName'], 'string', 'max' => 255],
            [['scienceDegreeId'], 'exist', 'skipOnError' => true, 'targetClass' => ScienceDegree::class, 'targetAttribute' => ['scienceDegreeId' => 'id']],
            [['specializationId'], 'exist', 'skipOnError' => true, 'targetClass' => Specialization::class, 'targetAttribute' => ['specializationId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstName' => Yii::t('app', 'Firstname'),
            'lastName' => Yii::t('app', 'Lastname'),
            'fatherName' => Yii::t('app', 'Fathername'),
            'specializationId' => Yii::t('app', 'Specialization ID'),
            'scienceDegreeId' => Yii::t('app', 'Science Degree ID'),
            'description' => Yii::t('app', 'Description'),
            'createdAt' => Yii::t('app', 'Created At'),
            'willingAt' => Yii::t('app', 'Willing At'),
        ];
    }

}