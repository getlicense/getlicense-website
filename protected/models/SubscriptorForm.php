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
 * $Id: SubscriptorForm.php 72 2014-03-12 21:58:54Z recena $
 */

class SubscriptorForm extends CFormModel {

    /**
     * Name of subscriptor
     *
     * @var <type>
     */
    public $fullname;

    /**
     * Email of subscriptor
     *
     * @var <type>
     */
    public $email;

    /**
     *
     * @return <type>
     */
    public function rules() {
        $aRules = array(
            array('email', 'required', 'message' => 'This field is required'),
        );
        return $aRules;
    }
}
?>