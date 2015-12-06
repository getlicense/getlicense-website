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
 * $Id: main.tpl.php 68 2014-03-09 21:35:14Z recena $
 */

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name' => 'getlicense.io website',
    'theme' => 'galactic',
    'language' => 'en',
    'sourceLanguage' => 'en',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*'
    ),

    'modules' => array(),

    // application components
    'components' => array(
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'css' => array('site/error', 'defaultParams' => array('code' => '403'), 'parsingOnly' => true),
                'images' => array('site/error', 'defaultParams' => array('code' => '403'), 'parsingOnly' => true),
                'assets' => array('site/error', 'defaultParams' => array('code' => '403'), 'parsingOnly' => true)
            )
        ),
       'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels'=> 'error, warning, info, trace',
                )
            ),
        ),
        'kMailchimp' => array (
            'class' => 'application.extensions.kMailchimp.KMailchimp',
            'apiKey' => '08afcd8576212bd43de99aec34e135f1-us2'
        )
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        'adminEmail' => 'hello@clinkerhq.com',
        'version' => '${project.version}',
        'defaultPageTitle' => 'Clinker - Software Development Ecosystem'
    )
);