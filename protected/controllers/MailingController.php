<?php
/*
 * getlicense.io
 * Copyright (C) 2014 klicap - ingeniería del puzle
 *
 * klicap - ingeniería del puzle, S.L.
 *
 * Parque Empresarial PISA
 * C/Industria 1, Edificio Metropol 1, planta 3ª, módulo 3
 * 41927 Mairena del Aljarafe
 * Sevilla, España
 *
 * C.I.F. B-91858241
 * hello@klicap.es | +34 664 00 06 29 | +34 954 89 43 22
 *
 * $Id: MailingController.php 72 2014-03-12 21:58:54Z recena $
 */

class MailingController extends Controller {

    /**
     * Representa la categoría en la que irán los mensajes de logs.
     */
    const CATEGORY = 'application.controllers.MailingController';

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->render('index');
    }

    public function actionSubscribe() {
        if (isset($_POST['SubscriptorForm'])) {
            Yii::log('Processing subscription form', 'info', MailingController::CATEGORY);
            $model = new SubscriptorForm;
            $model->attributes = $_POST['SubscriptorForm'];
            $session = Yii::app()->getSession();
            if ($model->validate()) {
                $session->add('model', $model);
                Yii::log("Form has been validated", "trace", MailingController::CATEGORY);
                $this->registerContactOnMailchimp($model, Yii::app()->request->userHostAddress);
                Yii::log("A subscription has been sent to MailChimp", "info", MailingController::CATEGORY);
                $this->redirect('/mailing/success');
            } else {
                $session->add('model', $model);
                Yii::log("Invalid form data", "trace", MailingController::CATEGORY);
            }
        } else {
            throw new CHttpException(503, 'Unexpected error');
        }
        $this->redirect('/');
    }

    public function actionSuccess() {
        $session = Yii::app()->getSession();
        if ($session->getIsStarted() && $session->contains('model')) {
            $model = $session->get('model');
            $this->render('//site/success');
            $session->destroy();
        } else {
            $this->redirect(Yii::app()->getRequest()->getBaseUrl(true));
        }
    }

    /**
     * This method registers a contact on Mailchimp.
     */
    private function registerContactOnMailchimp($model, $ip) {
        $mailchimp = Yii::app()->kMailchimp;
        $merge_vars = array (
            "NAME" => $model->fullname,
            "IP" => $ip,
            "optin_time" => gmdate("Y-m-d H:i:s")
        );
        $mail = array(
            "email" => $model->email
        );
        $result = $mailchimp->mc->lists->subscribe("1257a346a6", $mail, $merge_vars, 'html', false, true, true, false);
        if ($result) {
            Yii::log('Contact has been registered on Mailchimp ('.$result["leid"].')', 'info', MailingController::CATEGORY);
        } else {
            Yii::log('Contact has not been registered on Mailchimp', 'error', MailingController::CATEGORY);
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
    }
}