<?php
/**
 * Controller for the members
 */

require_once 'Mailchimp.php';

class KMailchimp extends CApplicationComponent {

    /**
     * Representa la categoría en la que irán los mensajes de logs.
     */
    const CATEGORY = 'application.extensions.kMailchimp.KMailchimp';

    /**
     * @var String Mailchimp API key
     */
    public $apiKey;

    public $mc;

    /**
     * Component initializer
     */
    public function init() {
        parent::init();
        try {
            Yii::log('Setting Mailchimp API Client with this APIKEY ' . $this->apiKey, 'trace', KMailchimp::CATEGORY);
            $this->mc = new Mailchimp($this->apiKey);
        } catch (Mailchimp_Error $e) {
            Yii::log('Something was wrong setting Mailchimp API Client', 'error', KMailchimp::CATEGORY);
        }
    }
}
?>