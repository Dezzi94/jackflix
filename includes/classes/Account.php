<?php
    class Account
    {
        private $con;
        //Sets empty array for error message.
        private $errorArray = array();

        public function __construct($con)
        {
            $this->con = $con;
        }
        
        //Checks length of first name is more than 25 chars long.
        public function validateFirstName($fn) {
            if(strlen($fn) < 2 || strlen($fn) > 25) {
                array_push($this->errorArray, "First name wrong lenth");
            }

        }

        public function getError($error) {
            if(in_array($error, $this->errorArray)) {
                return $error;
            }
        }
    }
    
?>