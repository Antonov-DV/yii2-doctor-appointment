<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 27.05.18
 * Time: 11:59
 */

namespace app\controllers;


use app\models\AppointmentRequest;
use app\models\Language;
use Yii;
use yii\rest\Controller;

class ApiController extends Controller
{
    /**
     * @param $action
     *
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $requestedLang = Yii::$app->request->get('lang');

        if (!empty($requestedLang) && Language::find()->where(['code' => $requestedLang])->exists()) {
            Yii::$app->language = $requestedLang;
        }

        return parent::beforeAction($action);
    }

    /**
     * @return array
     */
    public function actionRequestAppointment()
    {
        $appointmentModel = new AppointmentRequest();

        $appointmentModel->firstName        = Yii::$app->request->post('firstname');
        $appointmentModel->lastName         = Yii::$app->request->post('lastname');
        $appointmentModel->fatherName       = Yii::$app->request->post('fathername');
        $appointmentModel->description      = Yii::$app->request->post('description');
        $appointmentModel->willingAt        = Yii::$app->request->post('willingAt');
        $appointmentModel->specializationId = Yii::$app->request->post('specializationId');
        $appointmentModel->scienceDegreeId  = Yii::$app->request->post('scienceDegreeId');

        if ($appointmentModel->validate()) {

            $result = Yii::$app->appointmentService->createAppointment($appointmentModel);

            if ($result == true) {

                $response = [
                    'message' => Yii::t('app', 'Request created successfully'),
                ];

            } else {


                $response = [
                    'message' => Yii::t('app', 'Error'),
                    'errors'  => $result,
                ];
            }

        } else {

            Yii::$app->response->setStatusCode(422);

            $response = $appointmentModel->firstErrors;
        }

        return $response;
    }

    /**
     * @return array
     */
    public function actionSpecializations()
    {
       return Yii::$app->appointmentService->getSpecializationsList();
    }

    /**
     * @return array
     */
    public function actionScienceDegrees()
    {
        return Yii::$app->appointmentService->getScienceDegreesList();
    }
}