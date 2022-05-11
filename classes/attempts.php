<?php

class Attempt {
    public $student_id;
    public $given_name;
    public $family_name;
    public $q1;
    public $q2;
    public $q3;
    public $q4;
    public $q5;
    public $q6;
    public $q7;
    public $q8;
    public $q9;
    public $q10;
    public $q11;
    public $q12;
    public $q13;

    public function __construct($values) {
        $this->student_id  = $this->sanitize($values[0]);
        $this->given_name  = $this->sanitize($values[1]);
        $this->family_name = $this->sanitize($values[2]);
        $this->q1          = $this->sanitize($values[3]);
        $this->q2          = $this->sanitize($values[4]);
        $this->q3          = $this->sanitize($values[5]);
        $this->q4          = $this->sanitize($values[6]);
        $this->q5          = $this->sanitize($values[7]);
        $this->q6          = $this->sanitize($values[8]);
        $this->q7          = $this->sanitize($values[9]);
        $this->q8          = $this->sanitize($values[10]);
        $this->q9          = $this->sanitize($values[11]);
        $this->q10         = $this->sanitize($values[12]);
        $this->q11         = $this->sanitize($values[13]);
        $this->q12         = $this->sanitize($values[14]);
        $this->q13         = $this->sanitize($values[15]);
    }

    public function validate() {
        $error = "";
        if(empty($this->student_id)) {
            $error = "Please enter your student ID.";
        } else if(!preg_match("/^\d{7}$|^\d{10}$/", $this->student_id)) {
            $error = "Your student ID needs to be 7 or 10 digits long.";
        } else if(empty($this->given_name)) {
            $error = "Please enter your given name.";
        } else if(!preg_match("/^[^\s\d-][a-zA-z\s-]*$/", $this->given_name)) {
            $error = "Your given name must contain letters, and can contain hyphens and spaces.";
        } else if(empty($this->family_name)) {
            $error = "Please enter your family name.";
        } else if(!preg_match("/^[^\s\d-][a-zA-z\s-]*$/", $this->family_name)) {
            $error = "Your family name must contain letters, and can contain hyphens and spaces.";
        } else if(empty($this->q1)) {
            $error = "Please answer question 1.";
        } else if(empty($this->q2)) {
            $error = "Please answer question 2.";
        } else if(empty($this->q3)) {
            $error = "Please answer question 3.";
        } else if(empty($this->q4)) {
            $error = "Please answer question 4.";
        } else if(empty($this->q5)) {
            $error = "Please answer question 5.";
        } else if(empty($this->q6)) {
            $error = "Please answer question 6.";
        } else if(empty($this->q7)) {
            $error = "Please answer question 7.";
        } else if(empty($this->q8)) {
            $error = "Please answer question 8.";
        } else if(empty($this->q9)) {
            $error = "Please answer question 9.";
        } else if(empty($this->q10)) {
            $error = "Please answer question 10.";
        } else if(empty($this->q11)) {
            $error = "Please answer question 11.";
        } else if(empty($this->q12)) {
            $error = "Please answer question 12.";
        } else if(empty($this->q13)) {
            $error = "Please answer question 13.";
        }
        return $error;
    }

    public function sanitize($value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }
}

?>