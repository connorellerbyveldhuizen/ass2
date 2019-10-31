<?php

//Build assosciative array with key value

//Add errors to error builder

//For checking not null values
function notEmpty($value, $field)
{
    if ($value == null) {
        $format = '%s must not be empty';
        throw new Exception(sprintf($format, $field));
    }
}

function hasNumber($value, $field)
{
    if (is_numeric($value)) {
        return true;
    } else {
        $format = '%s must contain a number';
        throw new Exception(sprintf($format, $field));
    }
}

function hasChar($value, $field)
{
    if (preg_match('/[A-Za-z]/i', $value)) {
        return TRUE;
    } else {
        $format = '%s must contain a character';
        throw new Exception(sprintf($format, $field));
    }
}

function exactDigits($value, $exact, $field)
{
    hasNumber($value, $field);
    if (strlen($value) != $exact) {
        $format = '%s must be exactly %d digits';
        throw new Exception(sprintf($format, $field, $exact));
    }
}

function minChars($value, $min, $field)
{
    if (strlen($value) > $min) {
        return TRUE;
    } else {
        $format = '%s must not be less then %d';
        throw new Exception(sprintf($format, $field, $min));
    }
}

function maxChars($value, $max, $field)
{
    if (strlen($value) < $max) {
        return TRUE;
    } else {
        $format = '%s must not be greater then %d';
        throw new Exception(sprintf($format, $field, $max));
    }
}

function charRange($value, $min, $max, $field)
{
    try {
        if (minChars($value, $min, $field) && maxChars($value, $max, $field)) {
            return TRUE;
        }
    } catch (Exception $e) {
        $format = '%s must be between %d and %d';
        throw new Exception(sprintf($format, $field, $min, $max));
    }
}
