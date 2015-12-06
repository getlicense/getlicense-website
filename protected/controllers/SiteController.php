<?php
/*
 * Clinker - Software Development Ecosystem
 * Copyright (C) 2011-2012 klicap - ingeniería del puzle
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
 * $Id: SiteController.php 68 2014-03-09 21:35:14Z recena $
 */

class SiteController extends Controller {

    /**
     * Representa la categoría en la que irán los mensajes de logs.
     */
    const CATEGORY = 'application.controllers.SiteController';

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $session = Yii::app()->getSession();
        $request = Yii::app()->getRequest();
        $model = $session->get("model");
        if (!$model) {
            $model = new SubscriptorForm;
        }
        $this->render('//site/index', array('model' => $model));
    }

    /**
     *
     */
    public function actions() {
        return array(
            'page' => array(
                'class' => 'CViewAction',
            )
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
    }
}