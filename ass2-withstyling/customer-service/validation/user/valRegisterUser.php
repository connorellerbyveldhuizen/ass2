<?php

include "../../validation/baseValidator.php";

//validate email
function validEmail($value)
{
    notEmpty($value, "Email");
    if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
        return TRUE;
    } else {
        throw new Exception("Invalid Email format");
    }
}

//validate postcode
function validPostCode($value)
{
    notEmpty($value, "Postcode");
    exactDigits($value, 4, "Postcode");
}

function validCCNo($value)
{
    notEmpty($value, "Credit Card");
    exactDigits($value, 10, "Credit card Number");
}

function validPassword($value) {
    //Start with character
    $passArray = str_split($value);

    try {
        hasChar($passArray[0], "password");
    } catch (Exception $e) {
        throw new Exception("Password must start with letter");
    }

    $passHasNumber = FALSE;
    foreach($passArray as $char) {
        if(is_numeric($char)) {
            $passHasNumber = TRUE;
        }
    }
    if($passHasNumber == FALSE) {
        throw new Exception("Password must contain atleast 1 number");
    }

    charRange($value, 6, 10, "Password");
}

//Validate cc expiry date
function validExpiryDate($value)
{
    notEmpty($value, "Expiry Date");
    $date_arr = explode('-', $value);
    if (checkdate($date_arr[0], $date_arr[1], $date_arr[2])) {
        $exp_date = date("t-m-y", strtotime($value));
        date_default_timezone_set('Australia/Sydney');
        //For some reason my date time on wamp server is incorrect so use UTC
        $nowDate = date("t-m-y");
        if ($exp_date > $nowDate) {
            return true;
        } else {
            throw new Exception("Credit card expiration date must be valid");
        }
    } else {
        throw new Exception("Invalid Exp Date format");
    }
}
