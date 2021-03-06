<?php

class Denkmal_Site extends CM_Site_Abstract {

    public function __construct() {
        parent::__construct();
        $this->_setModule('Denkmal');
    }

    /**
     * @return CM_Menu[]
     */
    public function getMenus() {
        return array(
            'dates' => new Denkmal_Menu_Weekdays(),
        );
    }

    /**
     * @return Denkmal_Suspension
     */
    public function getSuspension() {
        return new Denkmal_Suspension($this);
    }

    /**
     * @return int
     */
    public static function getDayOffset() {
        return (int) CM_Config::get()->dayOffset;
    }

    /**
     * @return DateTime
     */
    public static function getCurrentDate() {
        $date = new DateTime();
        $date->sub(new DateInterval('PT' . self::getDayOffset() . 'H'));
        $date->setTime(0, 0, 0);
        return $date;
    }
}
