<?php

class Attempt {
    public $studentID;
    public $givenName;
    public $familyName;
    public $history1;
    public $history2;
    public $history3;
    public $smartCity1;
    public $smartCity2;
    public $smartCity3;
    public $smartVehicle1;
    public $smartVehicle2;
    public $smartVehicle3;
    public $smartVehicle4;
    public $smartVehicle5;
    public $iotVul1;
    public $iotVul2;

    public function __construct($values) {
        $this->studentID     = $values[0];
        $this->givenName     = $values[1];
        $this->familyName    = $values[2];
        $this->history1      = $values[3];
        $this->history2      = $values[4];
        $this->history3      = $values[5];
        $this->smartCity1    = $values[6];
        $this->smartCity2    = $values[7];
        $this->smartCity3    = $values[8];
        $this->smartVehicle1 = $values[9];
        $this->smartVehicle2 = $values[10];
        $this->smartVehicle3 = $values[11];
        $this->smartVehicle4 = $values[12];
        $this->smartVehicle5 = $values[13];
        $this->iotVul1       = $values[14];
        $this->iotVul2       = $values[15];
    }
}

?>