<?php
/*
 * getlicense.io
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
 * $Id: functions.php 68 2014-03-09 21:35:14Z recena $
 */

/**
 *
 * @param String $name
 * @param mixed $default
 * @return <type>
 */
function yiiparam($name, $default = null) {
    if (isset(Yii::app()->params[$name])) {
        return Yii::app()->params[$name];
    } else {
        return $default;
    }
}
?>
