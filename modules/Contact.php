<?php 

class Contact {
    public $firstName;
    public $lastName;
    public $email;
    public $address;
    public $telephone;
    public $gender;
    public $birthdate;

    public $formError = array(
        "fname"=>"",
        "lname"=>"", 
        "email"=>"",
        "telephone"=>"",
        "address"=>"",
        "birthdate"=>""
    );

    function __construct() {  
        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["saveButton"])) {
            function checkInput($input) {
                $input = trim($input);
                $input = stripslashes($input);
                $input = htmlspecialchars($input);
                return $input;
            }

            //Error checking for each input field.
            $_fname = checkInput($_POST["fname"]);
            $_fname = filter_var($_fname, FILTER_SANITIZE_STRING);
            if (empty($_fname)) {
                $formError["fname"] = "First Name is required!";
            } else if (!preg_match("/^[a-zA-Z-' ]*$/",$_fname)) {
                $formError["fname"] = "Only letters are allowed!";
            } else {
                $this->firstName = $_fname;
                $formError["fname"] = "";
            }

            $_lname = checkInput($_POST["lname"]);
            $_lname = filter_var($_lname, FILTER_SANITIZE_STRING);
            if (empty($_lname)) {
                $formError["lname"] = "Last Name is required!";
            } else if (!preg_match("/^[a-zA-Z-' ]*$/",$_lname)) {
                $formError["lname"] = "Only letters are allowed!";
            } else {
                $this->lastName = $_lname;
                $formError["lname"] = "";
            }

            $_email = checkInput($_POST["email"]);
            $_email = filter_var($_email, FILTER_SANITIZE_EMAIL);
            if (empty($_email)) {
                $formError["email"] = "Email is required";
            } else if (!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
                $formError["email"] = "Invalid email format";
            } else {
                $this->email = $_email;
                $formError["email"] = "";
            }

            $_telephone = checkInput($_POST["telephone"]);
            if (empty($_telephone)) {
                $formError["telephone"] = "Telephone is required";
            } else if (is_nan($_telephone)) {
                $formError["telephone"] = "Invalid telephone format";
            } else {
                $this->telephone = $_telephone;
                $formError["telephone"] = "";
            }

            $_address = checkInput($_POST["address"]);
            $_address = filter_var($_address, FILTER_SANITIZE_STRING);
            if (empty($_address)) {
                $formError["address"] = "Address is required!";
            } else {
                $this->address = $_address;
                $formError["address"] = "";
            }

            $_gender = checkInput($_POST["gender"]);
            if (empty($_gender)) {
                $formError["gender"] = "Gender is required";
            } else {
                $this->gender = $_gender;
                $formError["gender"] = "";
            }

            $_birthdate = checkInput($_POST["birthdate"]);
            if (empty($_birthdate)) {
                $formError["birthdate"] = "Date of Birth is required";
            } else {
                $this->birthdate = $_birthdate;
                $formError["birthdate"] = "";
            }

            //if there's no error in $formError, save the values to a .json file.
            
            $contactInformation = array(
                "firstName" => $this->firstName,
                "lastName" => $this->lastName,
                "gender" => $this->gender,
                "address" => $this->address,
                "email" => $this->email,
                "telephone" => $this->telephone,
                "birthdate" => $this->birthdate
            );

            $contactFile = "contacts/" . uniqid($contactInformation["firstName"]) . ".json";
            file_put_contents($contactFile, json_encode($contactInformation));
            $_SESSION["alert-type"] = "success";
            $_SESSION["alert-msg"] = "Contact saved successfully!";

            // use scandir() to get an array of files in directory.
        } else {
            return false;
        }
    }



}


?>