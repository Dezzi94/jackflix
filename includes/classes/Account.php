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
        
        public function register($fn, $ln, $un, $em, $en2, $pw, $pw2){
            $this->validateFirstName($fn);
            $this->validateFirstName($ln);
            $this->validateUsername($un);
        }


        //Checks length of first name is more than 25 chars long.
        private function validateFirstName($fn) {
            if(strlen($fn) < 2 || strlen($fn) > 25) {
                array_push($this->errorArray, Constants::$firstNameCharacters);
            }

        }

        //Checks length of last name is more than 25 chars long.
        private function validateLastName($ln) {
            if(strlen($ln) < 2 || strlen($ln) > 25) {
                array_push($this->errorArray, Constants::$lastNameCharacters);
                return;
            }
        }
        
        private function validateUserName($un) {
            if(strlen($un) < 2 || strlen($un) > 25) {
                array_push($this->errorArray, Constants::$usernameCharacters);
            }

            //SQL query to check if username already exists in wordpress database.
            $query = $this->con->prepare("SELECT * FROM users WHERE username=:un");
            $query->bindValue(":un", $un);

            $query->execute();

            if($query->rowCount() != 0) {
                array_push($this->errorArray, Constants::$usernameTaken);
            }
        }    

        public function getError($error) {
            if(in_array($error, $this->errorArray)) {
                return $error;
            }
        }
    }
    
?>