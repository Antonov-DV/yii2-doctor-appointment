<?php

namespace app\services;

use app\models\AppointmentRequest;
use app\models\Request;
use app\models\ScienceDegree;
use app\models\Specialization;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 27.05.18
 * Time: 14:27
 */
class AppointmentService extends \yii\base\Component
{

    /**
     * @param AppointmentRequest $appointmentRequest
     *
     * @return array|bool
     */
    public function createAppointment(AppointmentRequest $appointmentRequest)
    {
        $requestModel = new Request();

        $requestModel->firstname         = $appointmentRequest->firstName;
        $requestModel->lastname          = $appointmentRequest->lastName;
        $requestModel->fathername        = $appointmentRequest->fatherName;
        $requestModel->science_degree_id = $appointmentRequest->scienceDegreeId;
        $requestModel->specialization_id = $appointmentRequest->specializationId;
        $requestModel->description       = $appointmentRequest->description;
        $requestModel->willing_at        = $appointmentRequest->willingAt;
        $requestModel->is_paid           = 0;

        if ($requestModel->save()) {
            return true;
        } else {
            return $requestModel->firstErrors;
        }
    }

    /**
     * @return array
     */
    public function getSpecializationsList()
    {
        $specializationModels = Specialization::find()->all();

        $specializations = ArrayHelper::map($specializationModels, 'id', 'value');

        foreach ($specializations as &$specialization) {
            $specialization = Yii::t('app', $specialization);
        }

        return $specializations;
    }

    /**
     * @return array
     */
    public function getScienceDegreesList()
    {
        $scienceDegreeModels = ScienceDegree::find()->all();

        $scienceDegrees = ArrayHelper::map($scienceDegreeModels, 'id', 'value');

        foreach ($scienceDegrees as &$scienceDegree) {
            $scienceDegree = Yii::t('app', $scienceDegree);
        }

        return $scienceDegrees;
    }

}